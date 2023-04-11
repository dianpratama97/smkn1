<div class="container-fluid text-light footer pt-3 mt-3 wow fadeIn" data-wow-delay="0.1s" style="background-color: rgba(0,0,204, 0.5)">
    <div class="container py-3">
        <div class="row g-3">
            <div class="col-md-6 ml-auto mr-auto">
                <h4 class="text-white mb-3">Kontak Sekolah</h4>
                @if (setting() != null)
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ setting()->alamat }}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ setting()->no_telp }}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ setting()->email }}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social"
                            href="https://www.youtube.com/channel/UCgcscEhjDqYJS9t-HYXBYbg"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                @else
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span class="text-danger">Belum di
                            Input</span></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><span class="text-danger">Belum di
                            Input</span></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><span class="text-danger">Belum di Input</span>
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social"
                            href="https://www.youtube.com/channel/UCgcscEhjDqYJS9t-HYXBYbg"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                @if (setting() != null)
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        Dibuat Oleh : Dian Pratama, S.Pd &copy; <a href="/">{{ setting()->text_pembuka }}<a>, {{ date('d M Y') }}
                    </div>
                @else
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        Dibuat Oleh : Dian Pratama, S.Pd &copy; <a href="/"><span class="text-danger">Belum di Input</span><a>, {{ date('d M Y') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
