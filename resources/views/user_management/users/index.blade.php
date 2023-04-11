@extends('layouts.app')
@section('title', 'DATA USER')
@section('content')
    <div class="modal fade" id="importUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IMPORT EXCEL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
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


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @can('user_create')
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm text-white">
                                <i class="fas fa-plus"></i> Buat
                            </a>
                            <a href="{{ asset('/berkas/format_upload_user.xlsx') }}" class="btn btn-info btn-sm text-white">
                                <i class="fas fa-download"></i> DOWNLOAD FORMAT IMPORT USER
                            </a>
                        @endcan
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#importUsers">
                            <i class="fas fa-file-excel"></i> IMPORT EXCEL
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-users" class="table table-bordered table-hover" width="100%">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">NO</th>
                                    <th width="25%">NAME</th>
                                    <th width="15%">EMAIL</th>
                                    <th width="15%">Aktif Role</th>
                                    <th width="25%">EDIT LEVEL</th>
                                    <th width="15%">AKSI</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->status_role == 1)
                                                <span class="badge badge-info">aktif</span>
                                            @else
                                                <span class="badge badge-danger">tidak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status_role == 1)
                                            @else
                                                <form action="{{ route('users.update', ['user' => $item->id]) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input value="{{ $item->name }}" name="name" type="hidden" />
                                                    <input value="{{ $item->email }}" name="email" type="hidden" />
                                                    <input value="1" name="status_role" type="hidden" />
                                                    <input value="1" name="kode" type="hidden" />
                                                    <select name="role" class="custom-select custom-select-sm col-md-5">

                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <span class="btn-label">
                                                            <i class="fas fa-check"></i> <b>Simpan</b>
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @can('user_update')
                                                <!-- edit -->
                                                <a href="{{ route('users.edit', ['user' => $item->id]) }}"
                                                    class="btn btn-link btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('user_delete')
                                                <!-- delete -->
                                                <form class="d-inline"
                                                    action="{{ route('users.destroy', ['user' => $item->id]) }}" role="alert"
                                                    method="POST">
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
        </div>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugin/datatables/bootstrap.css') }}">
    @endpush
    @push('js')
        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    @endpush

    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#data-users').DataTable({});
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
