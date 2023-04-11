@extends('layouts.app')
@section('title', 'Detail Tugas')
@section('content')
    <div class="alert alert-info">
        <h4>Tugas : <span class="badge badge-info">{{ $tugas->mapel->name }}</span></h4>
        <h4>Di Kerjakan Oleh : <span class="badge badge-info">{{ $tugas->user->name }}</span></h4>
        <h4>Guru Mapel : <span class="badge badge-info">{{ $tugas->guru->user->name }}</span></h4>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tugas.cek_tugas', ['cek_id' => $tugas->tugas_id]) }}"
                class="btn btn-warning btn-sm float-right" role="button">
                <i class="fas fa-backward"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">

                    @if ($tugas->link != null)
                        <a href="{{ $tugas->link }}" target="_blank" class="btn btn-sm btn-info">BUKA LINK TUGAS</a>
                    @else
                        <span>TIDAK ADA LINK YANG UNGGAH OLEH {{ $tugas->user->name }}</span>
                    @endif

                    <br>
                    {{ $tugas->tugas }}
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center text-danger">
                    @if ($tugas->file_tugas_siswa != null)
                        <iframe src="{{ asset('storage/' . $tugas->file_tugas_siswa) }}" frameborder="0" width="100%"
                            height="500px"></iframe>
                    @else
                        <span>TIDAK ADA FILE YANG DI UPLOAD OLEH
                            {{ $tugas->user->name }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
