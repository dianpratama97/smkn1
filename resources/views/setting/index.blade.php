@extends('layouts.app')
@section('title', 'Setting Website')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <form action="{{ route('setting.store', ['id' => $setting]) }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="input_post_thumbnail" class="font-weight-bold">
                                        Thumbnail
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                                                class="btn btn-primary" type="button">
                                                Cari
                                            </button>
                                        </div>
                                        <input id="input_post_thumbnail" name="thumbnail"
                                            value="{{ old('thumbnail', asset($setting->thumbnail)) }}" type="text"
                                            class="form-control @error('thumbnail') is-invalid @enderror"
                                            placeholder="Thumbnail" readonly />
                                    </div>
                                    @error('thumbnail')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="input_post_foto_kepsek" class="font-weight-bold">
                                        Foto
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_post_kepsek" data-input="input_post_foto_kepsek"
                                                class="btn btn-primary" type="button">
                                                Cari
                                            </button>
                                        </div>
                                        <input id="input_post_foto_kepsek" name="foto_kepsek"
                                            value="{{ old('foto_kepsek', asset($setting->foto_kepsek)) }}" type="text"
                                            class="form-control @error('foto_kepsek') is-invalid @enderror"
                                            placeholder="foto_kepsek" readonly />
                                    </div>
                                    @error('foto_kepsek')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kata_sambutan" class="font-weight-bold">
                                        Kata Sambutan
                                    </label>
                                    <textarea name="kata_sambutan" id="kata_sambutan" cols="30" class="form-control" rows="10">
                                        {{ old('kata_sambutan', $setting->kata_sambutan) }}
                                    </textarea>
                                    @error('kata_sambutan')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="font-weight-bold">
                                        Alamat
                                    </label>
                                    <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="10">
                                        {{ old('alamat', $setting->alamat) }}
                                    </textarea>
                                    @error('alamat')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text_pembuka" class="font-weight-bold">
                                        Text Pembuka
                                    </label>
                                    <input id="text_pembuka" value="{{ old('text_pembuka', $setting->text_pembuka) }}"
                                        name="text_pembuka" type="text"
                                        class="form-control @error('text_pembuka') is-invalid @enderror"
                                        placeholder="Judul" />
                                    @error('text_pembuka')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">
                                        Email
                                    </label>
                                    <input id="email" value="{{ old('email', $setting->email) }}" name="email"
                                        type="text" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Judul" />
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_telp" class="font-weight-bold">
                                        Nomor Hp
                                    </label>
                                    <input id="no_telp" value="{{ old('no_telp', $setting->no_telp) }}" name="no_telp"
                                        type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                        placeholder="Judul" />
                                    @error('no_telp')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
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

            //event : Input Thumbnail
            $('#button_post_thumbnail').filemanager('image');
            $('#button_post_kepsek').filemanager('image');

        });
    </script>
@endpush
