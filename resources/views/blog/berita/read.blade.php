<!DOCTYPE html>
<html lang="en">

@include('blog.panel.css')

<body class="bg-smk">
    @include('blog.panel.head')

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-sm btn-primary" href="{{ route('berita.list') }}">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="card-img-top mb-5"
                    alt="{{ $post->title }}" height="400px">
                <h4>JUDUL BERITA : {{ $post->title }}</h4>
                <h6>DI BUAT TANGGAL: {{ $post->updated_at->format('d, M Y H:i') }}</h6><br>
                <h6>{!! $post->content !!}</h6>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    @include('blog.panel.footer')
    <!-- Footer End -->

    <!-- Footer Start -->
    @include('blog.panel.js')
    <!-- Footer End -->
</body>

</html>
