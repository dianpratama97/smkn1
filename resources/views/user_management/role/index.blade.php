@extends('layouts.app')
@section('title', 'Role')
@section('content')

    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-md-6 d-inline">
                                <form action="" method="GET">
                                    <div class="input-group">
                                        <input name="keyword" type="search" class="form-control form-control-sm"
                                            placeholder="Cari">
                                        <div class="input-group-append">
                                            <button class="btn btn-info btn-xs" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                @can('role_create')
                                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-xs float-right"
                                        role="button">
                                        <i class="fas fa-plus-square"></i> Buat
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list role -->
                        <div class="col-md-10 ml-auto mr-auto">
                            <table class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Role</th>
                                        <th width="30%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-center">
                                                @can('role_detail')
                                                    {{-- Detail --}}
                                                    <a href="{{ route('roles.show', ['role' => $role]) }}"
                                                        class="btn btn-xs btn-info" role="button">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                @endcan
                                                @can('role_update')
                                                    {{-- Edit --}}
                                                    <a href="{{ route('roles.edit', ['role' => $role]) }}"
                                                        class="btn btn-xs btn-warning" role="button">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role_delete')
                                                    <!-- delete -->
                                                    <form class="d-inline"
                                                        action="{{ route('roles.destroy', ['role' => $role]) }}" role="alert"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-xs btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <p>Data belum ada.</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- list role -->
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js-internal')
    <script>
        $(document).ready(function() {
            //event : Delete tag
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
