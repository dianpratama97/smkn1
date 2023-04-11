@extends('layouts.app')
@section('title', 'Edit Setting Jurusan')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('jurusanBlog_create')
                <a href="{{ route('jurusanBlog.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            @endcan
        </div>

        <form action="{{ route('jurusanBlog.update', ['jurusanBlog' => $jurusanBlog->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="oldFoto" value="{{ $jurusanBlog->foto }}">
                        @if ($jurusanBlog->foto)
                            <img src="{{ asset('storage/' . $jurusanBlog->foto) }}" width="50%" class="img-preview">
                        @else
                            <img class="img-preview" width="90%">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $jurusanBlog->name) }}">
                                @error('name')
                                    <strong class='text-danger'>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                id="image" name="foto" onchange="previewImage()">
                            @error('foto')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                            <label class="custom-file-label" for="image">Upload Gambar</label>
                        </div>

                        <div class="alert alert-primary" role="alert">
                            <li> DKV : 800 x 300 px.</li>
                            <li> TBSM : 600 x 600 px.</li>
                            <li> LP : 600 x 400 px.</li>
                            <li> TKJ : 600 x 400 px.</li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
        </form>
    </div>

    @push('js-internal')
        <script>
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
@endsection
