@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-8">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_post_title" class="font-weight-bold">
                                        Judul
                                    </label>
                                    <input id="input_post_title" value="{{ old('title', $post->title) }}" name="title"
                                        type="text" class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Judul" />
                                    @error('title')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_post_slug" class="font-weight-bold">
                                        Slug
                                    </label>
                                    <input id="input_post_slug" value="{{ old('slug', $post->slug) }}" name="slug"
                                        type="text" class="form-control @error('slug') is-invalid @enderror"
                                        placeholder="Slug Otomatis Dibutkan" readonly />
                                    @error('slug')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="oldFoto" value="{{ $post->thumbnail }}">
                                            @if ($post->thumbnail)
                                                <img src="{{ asset('storage/' . $post->thumbnail) }}" width="50%"
                                                    class="img-preview">
                                            @else
                                                <img class="img-preview" width="90%">
                                            @endif
                                        </div>
                                        <div class="col-md-8">

                                            <div class="custom-file mb-3">
                                                <input type="file"
                                                    class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                                    id="image" name="thumbnail" onchange="previewImage()">
                                                @error('thumbnail')
                                                    <strong class='text-danger'>{{ $message }}</strong>
                                                @enderror
                                                <label class="custom-file-label" for="image">Upload Gambar</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- description -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        Keterangan
                                    </label>
                                    <textarea id="input_post_description" name="description" placeholder="Keterangan"
                                        class="form-control  @error('description') is-invalid @enderror" rows="3">{{ old('description', $post->description) }}</textarea>
                                    @error('description')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <!-- content -->
                                <div class="form-group">
                                    <label for="input_post_content" class="font-weight-bold">
                                        Isi Berita
                                    </label>
                                    <textarea id="input_post_content" name="content" class="form-control @error('content') is-invalid @enderror"
                                        rows="20">{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- catgeory -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        Kategori
                                    </label>
                                    <div class="form-control overflow-auto @error('category') is-invalid @enderror"
                                        style="height: 800px">
                                        <!-- List category -->
                                        @include('cms.posts._category', [
                                            'kategori' => $kategori,
                                            'kategoriChecked' => old(
                                                'category',
                                                $post->kategori->pluck('id')->toArray()
                                            ),
                                        ])
                                        <!-- List category -->
                                    </div>
                                    @error('category')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- tag -->
                                <div class="form-group">
                                    <label for="select_post_tag" class="font-weight-bold">
                                        Tag
                                    </label>
                                    <select id="select_post_tag" name="tag[]" data-placeholder="Pilih Tag"
                                        class="custom-select @error('tag') is-invalid @enderror" multiple>
                                        @if (old('tag', $post->tags))
                                            @foreach (old('tag', $post->tags) as $tag)
                                                <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                                            @endforeach

                                        @endif
                                    </select>
                                    @error('tag')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>


                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_post_status" class="font-weight-bold">
                                        Status
                                    </label>
                                    <select id="select_post_status" name="status" class="custom-select">
                                        @foreach ($status as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('status', $post->status) == $key ? 'selected' : null }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-xs btn-warning px-3" href="{{ route('posts.index') }}">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                                </span>
                            </a>
                            <button type="submit" class="btn btn-xs btn-success px-3">
                                <span class="btn-label">
                                    <i class="fas fa-check"></i> <b>Edit</b>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('js')
    {{-- panggil js thumbnail --}}
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('/vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('/vendor/tinymce5/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush
@push('js-internal')
    <script>
        $(document).ready(function() {
            //Event : Input Slug
            $("#input_post_title").change(function(event) {
                $("#input_post_slug").val(
                    event.target.value
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, "-")
                    .replace(/-+/g, "-")
                    .replace(/^-|-$/g, "")
                );
            });

            //event : Input Thumbnail
            $('#button_post_thumbnail').filemanager('image');

            // text editor
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar1: "fullscreen preview",
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

                // integrasi file manager (gambar)
                file_picker_callback: function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }

            });


            //Select2 :tag post
            //select2 tag
            $('#select_post_tag').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('tags.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'd-inline';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
