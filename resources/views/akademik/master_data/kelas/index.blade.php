@extends('layouts.app')
@section('title', 'Data Kelas')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @can('kelas_create')
                            <a href="{{ route('kelas.create') }}" class="btn btn-success btn-sm float-right" role="button">
                                <i class="fas fa-plus"></i> Buat
                            </a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">
                    <table id="data-kelas" class="table table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>NO</th>
                                <th>KELAS</th>
                                <th>JURUSAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th class="text-center">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->jurusan->kode }}</td>
                                    <td class="text-center">
                                        @can('kelas_update')
                                            <!-- edit -->
                                            <a href="{{ route('kelas.edit', ['kelas' => $item->id]) }}"
                                                class="btn btn-xs btn-warning" role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('kelas_delete')
                                            <!-- delete -->
                                            <form class="d-inline" action="{{ route('kelas.destroy', ['kelas' => $item->id]) }}"
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
                $('#data-kelas').DataTable({});
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
