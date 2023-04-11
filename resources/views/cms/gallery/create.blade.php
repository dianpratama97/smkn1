@extends('layouts.app')
@section('title', 'Upload Foto')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('gallery_create')
                <a href="{{ route('gallery.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            @endcan
        </div>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-preview1" width="30%">
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('dir') is-invalid @enderror"
                                        id="image1" name="dir[]" onchange="previewGambar1()">
                                    @error('dir')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <label class="custom-file-label" for="image1">Upload Gambar 1</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-preview2" width="30%">
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('dir') is-invalid @enderror"
                                        id="image2" name="dir[]" onchange="previewGambar2()">
                                    @error('dir')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <label class="custom-file-label" for="image2">Upload Gambar 2</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-preview3" width="30%">
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('dir') is-invalid @enderror"
                                        id="image3" name="dir[]" onchange="previewGambar3()">
                                    @error('dir')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <label class="custom-file-label" for="image3">Upload Gambar 3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-preview4" width="30%">
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('dir') is-invalid @enderror"
                                        id="image4" name="dir[]" onchange="previewGambar4()">
                                    @error('dir')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <label class="custom-file-label" for="image4">Upload Gambar 4</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-preview5" width="30%">
                            </div>
                            <div class="col-md-8">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('dir') is-invalid @enderror"
                                        id="image5" name="dir[]" onchange="previewGambar5()">
                                    @error('dir')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <label class="custom-file-label" for="image5">Upload Gambar 5</label>
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
    @push('js-internal')
        <script>
            function previewGambar1() {
                const image = document.querySelector('#image1');
                const imgPreview = document.querySelector('.img-preview1');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function previewGambar2() {
                const image = document.querySelector('#image2');
                const imgPreview = document.querySelector('.img-preview2');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function previewGambar3() {
                const image = document.querySelector('#image3');
                const imgPreview = document.querySelector('.img-preview3');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function previewGambar4() {
                const image = document.querySelector('#image4');
                const imgPreview = document.querySelector('.img-preview4');

                imgPreview.style.display = 'd-inline';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            function previewGambar5() {
                const image = document.querySelector('#image5');
                const imgPreview = document.querySelector('.img-preview5');

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
