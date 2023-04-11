@extends('layouts.auth')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-info">
                <span class="badge badge-info">{{ session('success') }}</span>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Silakan Buat Akun</h3>
            </div>
            <form method="POST" action="{{ route('register') }}"> @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama Siswa</label>
                                <input id="name" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                <input id="role" name="role" value="5" type="hidden">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nomor Induk Siswa Nasional (NISN)</label>
                                <input id="username" name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Password</label>
                                <div class="position-relative">
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="show-password">
                                        <i class="flaticon-interface"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Ulangi Password</label>
                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control" name="password_confirmation"
                                        required autocomplete="new-password">
                                    <div class="show-password">
                                        <i class="flaticon-interface"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block fw-bold">BUAT</button> <br>
                    <div class="login-account text-center">
                        <span class="msg">Sudah Punya Akun ?</span>
                        <a href="{{ route('blog.index') }}" class="link">Silakan Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
