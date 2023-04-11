@extends('layouts.auth')

@section('content')
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Silakan Masuk</h3>
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}"> @csrf
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b></label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <div class="position-relative">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
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
                <div class="form-group form-action-d-flex mb-3">
                    <button type="submit" class="btn btn-primary col-md-6 ml-auto mr-auto fw-bold">Masuk</button>
                </div>
            </form>
            <div class="login-account">
                <span class="msg">Belum Punya Akun ?</span>
                <a href="{{ route('register') }}" class="link">Buat Akun Baru</a>
            </div>
        </div>
    </div>
@endsection
