@extends('layouts.app')
@section('title', 'Edit Setting Wakil Kepala Sekolah')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('waKepsek_create')
                <a href="{{ route('waKepsek.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            @endcan
        </div>

        <form action="{{ route('waKepsek.update', ['waKepsek' => $waKepsek->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="oldFoto" value="{{ $waKepsek->foto }}">
                        @if ($waKepsek->foto)
                            <img src="{{ asset('storage/' . $waKepsek->foto) }}" width="50%" class="img-preview">
                        @else
                            <img class="img-preview" width="90%">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $waKepsek->name) }}">
                                @error('name')
                                    <strong class='text-danger'>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('bidang') is-invalid @enderror"
                                    id="bidang" name="bidang" value="{{ old('bidang', $waKepsek->bidang) }}">
                                @error('bidang')
                                    <strong class='text-danger'>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fb" class="col-sm-2 col-form-label">FB</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb"
                                    name="fb" value="{{ old('fb', $waKepsek->fb) }}">
                                @error('fb')
                                    <strong class='text-danger'>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wa" class="col-sm-2 col-form-label">WA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('wa') is-invalid @enderror" id="wa"
                                    name="wa" value="{{ old('wa', $waKepsek->wa) }}">
                                @error('wa')
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
