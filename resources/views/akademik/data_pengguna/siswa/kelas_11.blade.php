@extends('layouts.app')
@section('title', 'Data Siswa Kelas 11')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('siswa.index') }}" class="btn btn-warning btn-sm">
                        <i class="
                fas fa-angle-double-left"></i> Kembali
                    </a>
                </div>
                <form action="{{ route('siswa.store') }}" method="post"> @csrf
                    <div class="card-body">
                        <table id="data-siswa" class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">Pilih</th>
                                    <th width="15%">Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @if ($item->status_kelas == 0)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="dataSiswa[]" value="{{ $item->id }}">
                                                <input type="hidden" name="tingkat" value="11">
                                            </td>
                                            <td> {{ $item->name }} </td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <a style="text-decoration:none" href="{{ route('siswa11.mm') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <h3>MM</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-6">
                    <a style="text-decoration:none" href="{{ route('siswa11.pkm') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <h3>PKM</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-6">
                    <a style="text-decoration:none" href="{{ route('siswa11.tkj') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <h3>TKJ</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <a style="text-decoration:none" href="{{ route('siswa11.tbsm') }}">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-success bubble-shadow-small">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <h3>TBSM</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-md-4">

            <div class="card">
                <div class="card-header">

                    <div class="text-center">
                        <h5>DATA SISWA</h5>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="15%">Nama Siswa</th>
                                <th width="10%">Kelas</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $dataS)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dataS->user->name }}</td>
                                    <td>{{ $dataS->tingkat }}</td>
                                    <td>
                                        <a href="/siswa/hapus/{{ $dataS->id }}"
                                            class="btn btn-danger btn-sm delete-confirm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugin/datatables/bootstrap.css') }}">
@endpush
@push('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
@endpush

@push('js-internal')
    <script>
        $(document).ready(function() {
            $('#data-siswa').DataTable({});
        });
    </script>

    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Anda Yakin ?",
                text: "Data Yang di Hapus Tidak Dapat Dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0cf01b',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#d33',
                cancelButtonText: "Batal"
            }).then(result => {
                //jika klik ya maka arahkan ke proses.php
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            })
            return false;
        });
    </script>
@endpush
