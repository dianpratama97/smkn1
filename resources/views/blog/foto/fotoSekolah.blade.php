<!DOCTYPE html>
<html lang="en">

@include('blog.panel.css')

<body class="bg-smk">
    @include('blog.panel.head')

    <div class="container mt-5">
        <div class="text-center">
            <h3 class="mb-5">GALLERY SMKN 1 SINGKEP</h3>
        </div>


        <div class="card">

            <div class="card-body">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-3">
                            <div class="card mt-3">
                                <img src="{{ asset('storage/' . $item->dir) }}" class="card-img-top"
                                    alt="SMKN 1 SINGKEP" height="140px">
                            </div>
                        </div>
                    @endforeach
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
