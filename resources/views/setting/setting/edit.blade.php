@extends('layouts.app')
@section('title', 'Edit Pengaturan')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('setting_create')
                <a href="{{ route('setting.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            @endcan
        </div>

        <form action="{{ route('setting.update', ['setting' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row m-2">
              
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            FOTO KEPALA SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="old_kepsek" value="{{ $setting->foto_kepsek }}">
                                    @if ($setting->foto_kepsek)
                                        <img src="{{ asset('storage/' . $setting->foto_kepsek) }}" width="90%"
                                            class="img-preview_3">
                                    @else
                                        <img class="img-preview_3" width="90%">
                                    @endif
                                </div>
                                <div class="col-md-8">

                                    <div class="custom-file mb-3">
                                        <input type="file"
                                            class="custom-file-input @error('foto_kepsek') is-invalid @enderror"
                                            id="foto_kepsek" name="foto_kepsek" onchange="previewKepsek()">
                                        @error('foto_kepsek')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                        <label class="custom-file-label" for="foto_kepsek">Foto Kepala Sekolah</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            CAP SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="oldcap" value="{{ $setting->cap }}">
                                    @if ($setting->cap)
                                        <img src="{{ asset('storage/' . $setting->cap) }}" width="90%"
                                            class="img-preview_cap">
                                    @else
                                        <img class="img-preview_cap" width="90%">
                                    @endif
                                </div>
                                <div class="col-md-8">

                                    <div class="custom-file mb-cap">
                                        <input type="file" class="custom-file-input @error('cap') is-invalid @enderror"
                                            id="cap" name="cap" onchange="previewcap()">
                                        @error('cap')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                        <label class="custom-file-label" for="cap">CAP Sekolah</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TTD SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="oldttd" value="{{ $setting->ttd }}">
                                    @if ($setting->ttd)
                                        <img src="{{ asset('storage/' . $setting->ttd) }}" width="90%"
                                            class="img-preview_ttd">
                                    @else
                                        <img class="img-preview_ttd" width="90%">
                                    @endif
                                </div>
                                <div class="col-md-8">

                                    <div class="custom-file mb-cap">
                                        <input type="file" class="custom-file-input @error('ttd') is-invalid @enderror"
                                            id="ttd" name="ttd" onchange="previewttd()">
                                        @error('ttd')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                        <label class="custom-file-label" for="ttd">TTD Kepala Sekolah</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            NAMA SEKOLAH DAN LINK
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="text_pembuka"
                                        value="{{ old('text_pembuka', $setting->text_pembuka) }}"
                                        class="form-control form-control-sm @error('text_pembuka') is-invalid @enderror">

                                    @error('text_pembuka')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                                <div class="col-md-12 mt-1">
                                    <label for="link_1">Link E-Rapor</label>
                                    <input type="text" name="link_1" value="{{ old('link_1', $setting->link_1) }}"
                                        class="form-control form-control-sm @error('link_1') is-invalid @enderror">

                                    @error('link_1')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="col-md-12 mt-1">
                                    <label for="link_2">Link E-School</label>
                                    <input type="text" name="link_2" value="{{ old('link_2', $setting->link_2) }}"
                                        class="form-control form-control-sm @error('link_2') is-invalid @enderror">

                                    @error('link_2')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="col-md-12 mt-1">
                                    <label for="link_3">Link E-Library</label>
                                    <input type="text" name="link_3" value="{{ old('link_3', $setting->link_3) }}"
                                        class="form-control form-control-sm @error('link_3') is-invalid @enderror">

                                    @error('link_3')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="col-md-12 mt-1">
                                    <label for="link_4">Link E-SPP</label>
                                    <input type="text" name="link_4" value="{{ old('link_4', $setting->link_4) }}"
                                        class="form-control form-control-sm @error('link_4') is-invalid @enderror">

                                    @error('link_4')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            KEPALA SEKOLAH DAN NIP
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('nama_kepsek') is-invalid @enderror" type="text"
                                        name="nama_kepsek" value="{{ old('nama_kepsek', $setting->nama_kepsek) }}">

                                    @error('nama_kepsek')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>
                                <div class="col-md-12 mt-2">
                                    <input class="form-control @error('nip') is-invalid @enderror" type="text"
                                        name="nip" value="{{ old('nip', $setting->nip) }}" placeholder="nip">

                                    @error('nip')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            EMAIL SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                        name="email" value="{{ old('email', $setting->email) }}">

                                    @error('email')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            NOMOR TELEPON/HP SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('no_telp') is-invalid @enderror" type="text"
                                        name="no_telp" value="{{ old('no_telp', $setting->no_telp) }}">

                                    @error('no_telp')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            ALAMAT SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('alamat') is-invalid @enderror" type="text"
                                        name="alamat" value="{{ old('alamat', $setting->alamat) }}">

                                    @error('text_pembuka')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            FACEBOOK SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('fb') is-invalid @enderror" type="text"
                                        name="fb" value="{{ old('fb', $setting->fb) }}">

                                    @error('fb')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            YOUTUBE SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control @error('yt') is-invalid @enderror" type="text"
                                        name="yt" value="{{ old('yt', $setting->yt) }}">

                                    @error('yt')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            AKTIFKAN KELULUSAN
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <div class="form-check">
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="status_kelulusan" value="1"
                                                {{ $setting->status_kelulusan == 1 ? 'checked' : '' }}>
                                            <span class="form-radio-sign">AKTIF</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="status_kelulusan" value="0"
                                                {{ $setting->status_kelulusan == 1 ? '' : 'checked' }}>
                                            <span class="form-radio-sign">TIDAK AKTIF</span>
                                        </label>
                                    </div>

                                    @error('status_kelulusan')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
           

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            KATA SAMBUTAN KEPALA SEKOLAH
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <textarea id="input_post_content" name="kata_sambutan"
                                        class="form-control @error('kata_sambutan') is-invalid @enderror" rows="20">{{ old('kata_sambutan', $setting->kata_sambutan) }}</textarea>
                                    @error('kata_sambutan')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            VISI
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <textarea id="input_visi" name="visi" class="form-control @error('visi') is-invalid @enderror" rows="20">{{ old('visi', $setting->visi) }}</textarea>
                                    @error('visi')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            MISI
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <textarea id="input_misi" name="misi" class="form-control @error('misi') is-invalid @enderror" rows="20">{{ old('misi', $setting->misi) }}</textarea>
                                    @error('misi')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>
    </div>

    @push('js')
        {{-- panggil js thumbnail --}}
        <script src="{{ asset('/vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
        <script src="{{ asset('/vendor/tinymce5/tinymce.min.js') }}"></script>
    @endpush
    @push('js-internal')
        <script>
            $(document).ready(function() {

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

                //visi
                $("#input_visi").tinymce({
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

                //misi
                $("#input_misi").tinymce({
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

            });

            function previewttd() {
                const ttd = document.querySelector('#ttd');
                const imgPreview = document.querySelector('.img-preview_ttd');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(ttd.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function previewcap() {
                const cap = document.querySelector('#cap');
                const imgPreview = document.querySelector('.img-preview_cap');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(cap.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

           

            function previewKepsek() {
                const foto_kepsek = document.querySelector('#foto_kepsek');
                const imgPreview = document.querySelector('.img-preview_3');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(foto_kepsek.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    @endpush
@endsection

{{-- <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nama Jurusan</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror"
            id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <strong class='text-danger'>{{ $message }}</strong>
        @enderror
    </div>
</div> --}}
