<!DOCTYPE html>
<html lang="en">

@include('blog.panel.css')

<body class="bg-smk">
    @include('blog.panel.head')

    <div class="container mt-5">
        <div class="text-center">
            <h3 class="mb-5">ALUMNI SMK NEGERI 1 SINGKEP</h3>
        </div>
        @if ($alumni != null)
            <div class="row">
                <table class="table table-bordered" id="data-alumni">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>NAMA ALUMNI</th>
                            <th>TEMPAT/TANGGAL LAHIR</th>
                            <th>JURUSAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->tempat_lahir }} / {{ $item->tgl_lahir }}</td>
                                <td>{{ $item->jurusan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
