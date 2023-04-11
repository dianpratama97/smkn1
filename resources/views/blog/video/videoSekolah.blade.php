<!DOCTYPE html>
<html lang="en">

@include('blog.panel.css')

<body>
    @include('blog.panel.head')

    <div class="container mt-5">
        <div class="text-center">
            <h3 class="mb-5">VIDEO SMKN 1 SINGKEP</h3>
        </div>


        <div class="card">

            <div class="card-body">
                <div class="row">
                    @if ($jumlah == 0)
                        <h4 class="text-center">DATA BELUM ADA.</h4>
                    @else
                        @foreach ($data as $item)
                            <div class="col-sm-3">
                                <div class="card mt-3">
                                    <iframe width="100%" height="150" src="{{ $item->dir }}" frameborder="0"
                                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="card-footer d-flex justify-content-center">
                {{ $data->links() }}
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
