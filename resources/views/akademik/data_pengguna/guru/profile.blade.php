@extends('layouts.app')
@section('title', 'Data Saya')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a href="/home" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus"></i> Kembali
                        </a>
                    </h4>
                </div>

                <form action="/profile/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="nama" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{ old('email', $user->email) }}"" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan" id="jurusan"
                                        value="{{ old('jurusan', $user->jurusan) }}">
                                    @error('jurusan')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                        name="gender">
                                        <option value="">--PILIH--</option>
                                        <option value="L" {{ old('gender', $user->gender) == 'L' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="P" {{ old('gender', $user->gender) == 'P' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('gender')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_induk">NIP/NI</label>
                                    <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                                        name="no_induk" id="no_induk" value="{{ old('no_induk', $user->no_induk) }}">
                                    @error('no_induk')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" class="form-control"
                                            placeholder="Tanggal Lahir" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir" id="tempat_lahir"
                                            value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="agama">Agama</label>
                                        <select class="form-control @error('agama') is-invalid @enderror" id="agama"
                                            name="agama">
                                            <option value="">--PILIH--</option>
                                            @foreach ($agama as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ old('agama', $user->agama) == $item->name ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agama')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nomor_hp">Nomor Hp</label>
                                        <input type="number" class="form-control @error('nomor_hp') is-invalid @enderror"
                                            name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp', $user->nomor_hp) }}">
                                        @error('nomor_hp')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="20"
                                            rows="5">{{ old('alamat', $user->alamat) }}</textarea>
                                        @error('alamat')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <img class="img-preview" width="90%">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="custom-file ">
                                                    <input type="file"
                                                        class="custom-file-input @error('foto') is-invalid @enderror"
                                                        id="image" name="foto" onchange="previewImage()">
                                                    @error('foto')
                                                        <strong class='text-danger'>{{ $message }}</strong>
                                                    @enderror
                                                    <label class="custom-file-label" for="image">Upload Foto</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mt-1">
                                        <label for="input_user_password" class="font-weight-bold">
                                            Password
                                        </label>
                                        <input id="input_user_password" name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" />
                                        <!-- error message -->
                                        @error('password')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="input_user_password_confirmation" class="font-weight-bold">
                                            Ulangi Password
                                        </label>
                                        <input id="input_user_password_confirmation" name="password_confirmation"
                                            type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success">simpan</button>
                    </div>
                </form>

            </div>
        </div>
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
