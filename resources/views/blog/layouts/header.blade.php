{{-- <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
            <img src="https://www.kemdikbud.go.id/main/files/large/33ddc3bc2640689" width="15%">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="mdi mdi-menu navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                    <div class="navbar-collapse-logo">
                        <img src="https://www.kemdikbud.go.id/main/files/large/33ddc3bc2640689" width="15%">
                    </div>
                    <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features-section">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features-section">Alumni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#feedback-section">Kontak</a>
                </li>
                <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#login-model">LOGIN</button>
                </li>
            </ul>
        </div>


    </div>
</nav>



<!-- Modal for Contact - us Button -->
<div class="modal fade" id="login-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">{{ __('Login') }}</h4>
            </div>
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
                    <button type="button" class="btn btn-xs btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-xs btn-success">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
