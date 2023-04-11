<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5"><u>WAKIL KEPALA SEKOLAH</u></h1>
        </div>
        <div class="row g-4">
            @foreach (wakilKepsek() as $item)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('storage/' . $item->foto) }}">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="{{ $item->fb }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="{{ $item->wa }}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $item->name }}</h5>
                            <small class="text-success"><b>{{ $item->bidang }}</b></small>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<hr>