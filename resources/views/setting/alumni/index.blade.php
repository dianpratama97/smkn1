@extends('layouts.app')
@section('title', 'Alumni')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('alumni_create')
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importUsers">
                    <i class="fas fa-file-excel"></i> IMPORT EXCEL
                </button>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="data-alumni">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>NISN</th>
                            <th>NAMA SISWA</th>
                            <th>GENDER</th>
                            <th>TEMPAT,TANGGAL LAHIR</th>
                            <th>JURUSAN</th>
                            <th>TH. LULUS</th>
                            <th>STATUS KULIAH</th>
                            <th>KULIAH</th>
                            <th>STATUS KERJA</th>
                            <th>KERJA</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                                <td>{{ $item->jurusan }}</td>
                                <td>{{ $item->th_lulus }}</td>
                                <td>{{ $item->status_kuliah == 1 ? 'KULIAH' : '-' }}</td>
                                <td>{{ $item->tempat_kuliah }}</td>
                                <td>{{ $item->status_kerja == 1 ? 'BEKERJA' : '-' }}</td>
                                <td>{{ $item->tempat_kerja }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    @can('alumni_update')
                                        <!-- edit -->
                                        <a href="{{ route('alumni.edit', ['alumnus' => $item->id]) }}"
                                            class="btn btn-link btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('alumni_delete')
                                        <!-- delete -->
                                        <form class="d-inline" action="{{ route('alumni.destroy', ['alumnus' => $item->id]) }}"
                                            role="alert" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IMPORT EXCEL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('alumni.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Upload Data Excel Users</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                $('#data-alumni').DataTable({});
            });
        </script>

        <script>
            $(document).ready(function() {
                //event : Delete
                $("form[role='alert']").submit(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "Anda Yakin ?",
                        text: "Data Yang di Hapus Tidak Dapat Dikembalikan.",
                        icon: 'warning',
                        allowOutsideClick: false,
                        showCancelButton: true,
                        confirmButtonColor: '#0cf01b',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal",
                        reverseButtons: true,
                        confirmButtonText: "Hapus",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // todo: process of deleting categories
                            e.target.submit();
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
