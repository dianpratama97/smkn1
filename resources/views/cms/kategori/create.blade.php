@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST"> @csrf
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_category_title" class="font-weight-bold">Judul</label>
                            <input id="input_category_title" value="{{ old('title') }}" name="title" type="text"
                                class="form-control form-control-sm @error('title') is-invalid @enderror" />
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_category_slug" class="font-weight-bold">Slug</label>
                            <input id="input_category_slug" value="{{ old('slug') }}" name="slug" type="text"
                                class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                placeholder="Otomatis Akan Dibuatkan" readonly />
                            @error('slug')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>



                        <!-- parent_category -->
                        <div class="form-group">
                            <label for="select_category_parent" class="font-weight-bold">Parent</label>
                            <select id="select_category_parent" name="parent_category" data-placeholder=""
                                class="custom-select w-100 form-control-sm">
                                @if (old('parent_category'))
                                    <option value="{{ old('parent_category')->id }}" selected>
                                        {{ old('parent_category')->title }}
                                    </option>
                                @endif
                            </select>
                        </div>
                        <!-- description -->
                        <div class="form-group">
                            <label for="input_category_description" class="font-weight-bold">Description</label>
                            <textarea id="input_category_description" name="desc"
                                class="form-control form-control-sm @error('desc') is-invalid @enderror" rows="3">{{ old('desc') }}</textarea>
                            @error('desc')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="text-center">
                            <a class="btn btn-xs btn-warning px-3" href="{{ route('kategori.index') }}">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                                </span>
                            </a>
                            <button type="submit" class="btn btn-xs btn-success px-3">
                                <span class="btn-label">
                                    <i class="fas fa-check"></i> <b>Simpan</b>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush
@push('js-internal')
    <script>
        $(function() {
            // membuat slug
            function generateSlug(value) {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            //select2
            $('#select_category_parent').select2({
                theme: 'bootstrap4',

                allowClear: true,
                ajax: {
                    url: "{{ route('kategori.select') }}",
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

            // event: input title
            $('#input_category_title').change(function() {
                let title = $(this).val();
                let parent_category = $("#select_category_parent").val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });
            // event: select parent kategori
            $('#select_category_parent').change(function() {
                let title = $('#input_category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });
        })
    </script>
@endpush
