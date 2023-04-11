<div class="container-xxl py-5 category">
    <div class="container">
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">


                @if (dataJurusan() != null)
                    @foreach (dataJurusan() as $item)
                        <div class="owl-carousel-item position-relative">
                            <div class="owl-carousel-item position-relative">
                                <img class="img-fluid " src="{{ asset('storage/' . $item->foto) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                @else
                    <img class="img-fluid " src="{{ asset('home/') }}/img/1.png" alt="">
                @endif

            </div>
        </div>

    </div>
</div>
<hr>