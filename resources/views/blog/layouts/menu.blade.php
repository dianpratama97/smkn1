@extends('blog.layouts.template_home')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50%">
            <div class="card-body">
                <div class="mb-5">
                    <form method="POST" action="{{ route('login') }}"> @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">NISN</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-xs btn-block muda">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/" style="text-decoration:none;">
            <div style="background: rgb(109, 197, 255); color: rgb(255, 255, 255); border-radius: 10px; margin: 5px;">
                <h4 class="card-title text-center mt-3 huruf" style="padding: 10px">My School</h4>
            </div>
        </a>
    </div>
@endsection
