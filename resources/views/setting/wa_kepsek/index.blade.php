@extends('layouts.app')
@section('title', 'Setting Kepala Sekolah')
@section('content')
    <div class="card">
        <div class="card-header">
            @can('waKepsek_create')
                <a href="{{ route('waKepsek.create') }}" class="btn btn-success btn-sm float-right" role="button">
                    <i class="fas fa-plus"></i> Buat
                </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th width='5%'>NO</th>
                        <th width='40%'>NAMA</th>
                        <th>BIDANG</th>
                        <th>FB</th>
                        <th>WA</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->bidang }}</td>
                            <td>{{ $item->fb }}</td>
                            <td>{{ $item->wa }}</td>
                            <td><img src="{{ asset('storage/' . $item->foto) }}" width="30%"></td>
                            <td class="text-center">
                                @can('waKepsek_update')
                                    <!-- edit -->
                                    <a href="{{ route('waKepsek.edit', ['waKepsek' => $item->id]) }}"
                                        class="btn btn-xs btn-warning" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('waKepsek_delete')
                                    <!-- delete -->
                                    <form class="d-inline" action="{{ route('waKepsek.destroy', ['waKepsek' => $item->id]) }}"
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

    @push('js-internal')
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
