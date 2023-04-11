@extends('layouts.app')
@section('title', 'Data Kelulusan Kelas 12')
@section('content')

    <div class="modal fade" id="importKelulusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IMPORT EXCEL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('kelulusan.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Upload Data Excel Kelulusan</label>
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
                <form action="{{ route('kelulusan.hapusAll') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @can('kelulusan_create')
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                    data-target="#importKelulusan">
                                    <i class="fas fa-file-excel"></i> IMPORT EXCEL
                                </button>
                            @endcan

                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Hapus Semua
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">


                        <table id="data-kelulusan" class="table table-hover">

                            <thead class="text-center">
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>NO</th>
                                    <th>NISN</th>
                                    <th>NAMA SISWA</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th>
                                            <input name='id[]' type="checkbox" id="checkItem"
                                                value="{{ $item->id }}">
                                        </th>
                                        <th class="text-center">{{ $loop->iteration }}</th>

                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-warning">Belum di Isi</span>
                                            @elseif ($item->status == 1)
                                                <span class="badge badge-info">Lulus</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Lulus</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            @can('kelulusan_update')
                                                <!-- edit -->
                                                <a href="{{ route('kelulusan.edit', ['kelulusan' => $item->id]) }}"
                                                    class="btn btn-xs btn-warning" role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('mapel_delete')
                                                <!-- delete -->
                                                {{-- <form class="d-inline"
                                                    action="{{ route('kelulusan.destroy', ['kelulusan' => $item->id]) }}"
                                                    role="alert" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form> --}}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </form>
            </div>
        </div>
    </div>



    @push('js')
        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    @endpush

    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#data-kelulusan').DataTable({});
            });
        </script>

        <script language="javascript">
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
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
