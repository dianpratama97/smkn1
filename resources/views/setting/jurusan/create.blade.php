@extends('layouts.app')
@section('title', 'Create Setting Jurusan')
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

        <form action="{{ route('jurusanBlog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-preview" width="90%">
                    </div>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
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
                            <span>Ukuran 1922 x 700 Px</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
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
