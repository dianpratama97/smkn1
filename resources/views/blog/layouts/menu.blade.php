@extends('blog.layouts.template_home')
@section('content')
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('assets/img/smk.png') }}"
                alt="smk">
        </div>
        <div class="text-center mt-4 name">
            LOGIN
        </div>

        <form method="POST" action="{{ route('login') }}" class="p-3 mt-3"> @csrf
            <div class="form-field d-flex align-items-center">
                <input id="username" type="text" class=" @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username/NISN">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field d-flex align-items-center">
                <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <div class="d-flex justify-content-center">
                <a href="/" style="text-decoration:none;">
                    <div
                        style="background: rgb(109, 197, 255); color: rgb(255, 255, 255); border-radius: 10px; margin: 3px;">
                        <h4 class="card-title text-center mt-2 huruf" style="padding: 5px">My School</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
