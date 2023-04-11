@extends('layouts.app')
@section('title', 'Daftar Tugas Guru')
@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('tugas.create') }}" class="btn btn-success btn-sm float-right" role="button">
                <i class="fas fa-plus"></i> Buat Tugas
            </a>
        </div>
        <div class="card-body">
            <table id="kepsek" class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th>NO</th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>Cek Tugas</th>
                        <th>STATUS AKTIF</th>
                        <th>Batas Waktu</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tugas as $item)
                        <tr>
                            <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $item->guru->user->name }}</td>
                            <td>{{ $item->mapel->kode }}</td>
                            <td>{{ $item->kelas->kode }}</td>
                            <td class="text-center">
                                <a href="{{ route('tugas.cek_tugas', ['cek_id' => $item->id]) }}"
                                    class="btn btn-xs btn-success">
                                    <i class="fas fa-eye"></i> Cek tugas
                                </a>
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">TUGAS AKTIF</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-danger">TUGAS SELESAI</span>
                                @else
                                    <span class="badge badge-warning">TUGAS BELUM AKTIF</span>
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($item->batas_waktu)) }}</td>
                            <td class="text-center">

                                <!-- edit -->
                                <a href="{{ route('tugas.edit', ['tugas' => $item->id]) }}" class="btn btn-xs btn-warning"
                                    role="button">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- delete -->
                                <form class="d-inline" action="{{ route('tugas.destroy', ['tugas' => $item->id]) }}"
                                    role="alert" method="POST">
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


@endsection
@push('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
@endpush

@push('js-internal')
    <script>
        $(document).ready(function() {
            $('#kepsek').DataTable({});
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
