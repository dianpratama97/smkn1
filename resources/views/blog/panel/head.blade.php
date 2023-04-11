<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark shadow sticky-top p-0" style="background-color: rgb(34, 125, 178)">
    <a href="https://smkn1singkep.sch.id" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        @if (setting() != null)
            <h4 class="m-0" style="color: rgb(255, 255, 255)"><i
                    class="fas fa-school me-3"></i>{{ setting()->text_pembuka }}</h4>
        @else
            <h4 class="m-0" style="color: rgb(255, 255, 255)"><i class="fas fa-school me-3"></i> BELUM DI ISI</h4>
        @endif
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ set_active('blog.index') }}">Beranda</a>

            <a href="{{ route('berita.list') }}" class="nav-item nav-link {{ set_active('berita.list') }}">Berita</a>

            <a href="{{ route('video.list') }}" class="nav-item nav-link {{ set_active('video.list') }}">Video</a>

            <a href="{{ route('alumni.list') }}" class="nav-item nav-link {{ set_active('alumni.list') }}">Alumni</a>

            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-item nav-link">Kontak</a>

            <a href="/login-sekolah" class="nav-item nav-link">Login</a>

            {{-- <a href="/menu" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOGIN/REGISTER<i
                class="fa fa-arrow-right ms-3"></i></a> --}}
        </div>
    </div>
</nav>
<!-- Navbar End -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SMK NEGERI 1 SINGKEP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if (setting() != null)
                    <h6 class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ setting()->alamat }}</h6>
                    <h6 class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ setting()->no_telp }}</h6>
                    <h6 class="mb-2"><i class="fa fa-envelope me-3"></i>{{ setting()->email }}</h6>
                @else
                    <h6 class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span class="text-danger">Belum di
                            Input</span></h6>
                    <h6 class="mb-2"><i class="fa fa-phone-alt me-3"></i><span class="text-danger">Belum di
                            Input</span></h6>
                    <h6 class="mb-2"><i class="fa fa-envelope me-3"></i><span class="text-danger">Belum di
                            Input</span>
                    </h6>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
