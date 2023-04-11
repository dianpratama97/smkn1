@extends('layouts.app')
@section('title', 'Data Mapel SMK Negeri 1 Singkep')
@section('content')
    <div class="modal fade" id="importMapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IMPORT EXCEL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('mapel.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Upload Data Excel Mapel</label>
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


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">

                        @can('mapel_create')
                            <a href="{{ asset('/berkas/format_upload_mapel.xlsx') }}" class="btn btn-info btn-sm text-white">
                                <i class="fas fa-download"></i> DOWNLOAD FORMAT IMPORT MAPEL
                            </a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#importMapel">
                                <i class="fas fa-file-excel"></i> IMPORT EXCEL
                            </button>
                            <a href="{{ route('mapel.create') }}" class="btn btn-success btn-sm float-right" role="button">
                                <i class="fas fa-plus"></i> Buat
                            </a>
                        @endcan

                    </h4>
                </div>
                <div class="card-body">
                    <table id="kepsek" class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>Kode</th>
                                <th>Nama Mapel</th>
                                <th>AKSI</th>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        @can('mapel_update')
                                            <!-- edit -->
                                            <a href="{{ route('mapel.edit', ['mapel' => $item->id]) }}"
                                                class="btn btn-xs btn-warning" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('mapel_delete')
                                            <!-- delete -->
                                            <form class="d-inline" action="{{ route('mapel.destroy', ['mapel' => $item->id]) }}"
                                                role="alert" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
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
    </div>

    @push('js')
        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    @endpush

    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#data-mapel').DataTable({});
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
