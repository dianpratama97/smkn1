@extends('layouts.app')
@section('title', 'Daftar Tugas Saya')
@section('content')

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th>Mapel</th>
                        <th>Status Pengerjaan</th>
                        <th>Status Tugas</th>
                        <th>Batas Pengumpulan</th>
                        <th>Staus Pengecekan Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $item)
                        @if ($item->status != 3)
                            <tr>
                                <td> {{ $item->mapel->name }}</td>
                                <td>
                                    @foreach ($tugas_siswa as $tg)
                                        @if (!empty($tg->tugas_id))
                                            @if ($tg->tugas_id == $item->id)
                                                <span class="badge badge-success">sudah di kerjakan</span>
                                            @else
                                            @endif
                                        @else
                                            @if ($tg->tugas_id == $item->id)
                                                <span class="badge badge-success">sudah di kerjakan</span>
                                            @else
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($item->status == 1)
                                        <a href="{{ route('tugasSiswa.detail', ['id' => $item->id]) }}"
                                            class="btn btn-xs btn-info">
                                            <i class="fas fa-edit"></i> Kerjakan Tugas
                                        </a>
                                    @else
                                        <span class="text-danger">Sudah Lewat Dari Tanggal Pengumpulan</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">TUGAS AKTIF</span>
                                    @else
                                        <span class="badge badge-danger">TUGAS DIMATIKAN</span>
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($item->batas_waktu)) }}</td>
                                <td>
                                    @foreach ($tugas_siswa as $tg)
                                        @if ($tg->status == 1)
                                            <span class="badge badge-success">Sudah di Nilai</span>
                                        @else
                                            <span class="badge badge-danger">Belum di Nilai</span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
