@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-header"
                    style="background-image: url('{{ asset('assets/') }}/img/blogpost.png'); background-attachment: fixed;">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            @if (auth()->user()->foto != null)
                                <img src="{{ asset('storage/foto-user/' . auth()->user()->foto) }}" alt="user"
                                    class="avatar-img rounded-circle">
                            @else
                                <img src="{{ asset('storage/foto-user/user.png') }}" alt="user"
                                    class="avatar-img rounded-circle">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body" style="background-color: rgb(209, 255, 184)">

                    {{-- <audio controls="true" autoplay="true">
                        <source src="{{ asset('assets/musik/musik.mp3') }}" type="audio/mp3">
                        Browser anda tidak mendukung tag audio
                    </audio> --}}
                    <div class="user-profile text-center">
                        <div class="name">{{ auth()->user()->name }}</div>
                        <div class="job">{{ auth()->user()->level }}</div>
                        <div class="job">{{ auth()->user()->jurusan }}</div>

                        @if (auth()->user()->level != 'SuperAdmin' && auth()->user()->level != 'Guru')
                            <div class="desc">
                                @if (auth()->user()->status == 0)
                                    <span class="badge badge-warning">Lengkapi Data Pendaftaran</span>
                                @elseif(auth()->user()->status == 1)
                                    <span class="badge badge-primary">Data Sedang di Verifikasi. Silakan Menunggu...</span>
                                @elseif(auth()->user()->status == 2)
                                    <span class="badge badge-success">Selamat Anda Lulus. Silakan Daftar Ulang</span>
                                @elseif(auth()->user()->status == 3)
                                    <span class="badge badge-success">Siswa SMK Negeri 1 Singkep</span>
                                @elseif(auth()->user()->status == 98)
                                    <span class="badge badge-warning">Maaf. Silakan Perbaiki Berkas Anda.</span>
                                @elseif(auth()->user()->status == 99)
                                    <span class="badge badge-warning">Maaf. Anda Belum Bisa Lulus.</span>
                                @endif
                            </div>
                        @endif
                        @if (auth()->user()->status == 2)
                            <div class="view-profile">
                                <a href="/ppdb/daftarUlang/{{ auth()->user()->id }}"
                                    class="btn btn-secondary btn-sm btn-block">Daftar Ulang</a>
                            </div>
                        @endif
                    </div>

                    <div>
                        @if (setting()->ppdb == 1)
                            <a href="kelulusan/hasil/{{ auth()->user()->username }}"
                                class="btn btn-xs btn-block btn-danger">Cek
                                Kelulusan</a>
                        @else
                            <span class="badge badge-primary text-center mb-1 d-flex justify-content-center">Mohon Tunggu
                                Tanggal Kelulusan</span>
                        @endif


                        <a href="/kartu-pelajar/{{ auth()->user()->id }}" target="_blank"
                            class="btn btn-xs btn-block button"
                            style="background-color: rgb(13, 248, 13); color: rgb(255, 255, 255);"><b>CETAK KARTU
                                PELAJAR</b></a>

                        <a href="/myProfile/{{ auth()->user()->id }}" class="btn btn-xs btn-block btn-primary">PROFILE</a>

                        <a href="/myProfile/ganti-password/{{ auth()->user()->id }}"
                            class="btn btn-xs btn-block btn-secondary">Ganti Password</a>

                    </div>
                </div>
            </div>
            @if (auth()->user()->status == 98)
                <div class="alert alert-info">
                    <h5><b class="text-danger">*</b> Catatan:</h5><br>
                    Dokumen yang di upload tidak sesuai. Silakan perbaiki
                </div>
            @endif

        </div>



        <div class="col-md-8">

            <div class="alert alert-success" role="alert">

                <h1 class="text-center"><b>Selamat Datang </b></h1>
                <h5 class="text-center">Sistem Informasi Akademik Sekolah</h5>
                <h5 class="text-center">SMK Negeri 1 Singkep</h5>

            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->isi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection