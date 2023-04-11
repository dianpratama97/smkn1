<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5" >
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;" >
                <div class="position-relative h-100">
               
                    @if (setting() != null)
                        <img class="w-100 h-100 foto-kepsek" src="{{ asset('storage/' . setting()->foto_kepsek) }}"
                             >
                    @else
                        <img class="img-fluid" src="{{ asset('home/') }}/img/1.png" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                {{-- <h4 class="mb-4">Selamat Datang di SMK Negeri 1 Singkep</h4> --}}
                <h4>
                    <marquee width="100%" class="mb-4">Selamat Datang di SMK Negeri 1 Singkep {{ date('d M Y') }}
                    </marquee>
                </h4>
                @if (setting() != null)
                    <p class="mb-4"><b>Kepala Sekolah: </b> {{ setting()->nama_kepsek }}</p>
                    <p class="mb-4">{!! setting()->kata_sambutan !!}</p>
                @else
                    <p class="mb-4"><b>Kepala Sekolah: </b> <span class="text-danger">Belum di Input</span></p>
                    <p class="mb-4"><span class="text-danger">Belum di Input</span></p>
                @endif

            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="text-center">VISI</h2>
                {!! setting()->visi !!}
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="text-center">MISI</h2>
                {!! setting()->misi !!}
            </div>
        </div>
    </div>
</div>
<hr>
