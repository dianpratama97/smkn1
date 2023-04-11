<!DOCTYPE html>
<html lang="en">

@include('blog.panel.css')

<body class="bg-smk">
    @include('blog.panel.head')

    <div class="container mt-5">
        <div class="text-center">
            <h3 class="mb-5">BERITA KAMI</h3>
        </div>
        @if (posts() != null)
            <div class="row">
                @foreach (posts() as $item)
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top" alt="{{ $item->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <h6 class="card-text"
                                    style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    {{ $item->description }}</h6>
                                <a href="{{ route('berita.detail', ['slug' => $item->slug]) }}"
                                    class="btn btn-primary">Baca Berita</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="text-center mb-5"><b>BELUM ADA BERITA YANG DI POST</b></h2>
        @endif

    </div>

    <!-- Footer Start -->
    @include('blog.panel.footer')
    <!-- Footer End -->

    <!-- Footer Start -->
    @include('blog.panel.js')
    <!-- Footer End -->
</body>

</html>
