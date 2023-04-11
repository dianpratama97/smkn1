@extends('layouts.app')
@section('title', 'Data Tugas')
@section('content')
    <div class="alert alert-info">
        <h4>Pilih Siswa Kelas : <span class="badge badge-primary">{{ $tugas->kelas->kode }}</span></h4>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tugas.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                <i class="fas fa-backward"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="7px">No</th>
                        <th>Mapel</th>
                        <th>Siswa</th>
                        <th>Status Pengecekan</th>
                        <th>Cek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugasSiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mapel->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('tugas.cek', ['id_tugas' => $item->id]) }}"
                                    class="btn btn-xs btn-success">
                                    <i class="fas fa-eye"></i> Cek tugas
                                </a>
                                <form class="d-inline"
                                    action="{{ route('tugasSiswa.destroy', ['tugasSiswa' => $item->id]) }}" role="alert"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
