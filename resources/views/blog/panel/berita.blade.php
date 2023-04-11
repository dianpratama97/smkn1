<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h1 class="mb-5"><u>BERITA SEKOLAH</u></h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            @foreach (post() as $item)
                @if ($item->status == 'publish')
                    <div class="testimonial-item text-center">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top">
                        <h4 class="mb-3 mt-3">{{ $item->title }}</h4>
                        <a href="{{ route('berita.detail', ['slug' => $item->slug]) }}">
                            <div class="testimonial-text bg-light text-center p-4">
                                <p class="mb-0">Baca Berita</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<hr>
