@extends('layouts.app')
@section('title', 'Detail Guru')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                @if ($user->foto != null)
                    <img src="{{ asset('storage/' . $user->foto) }}" class="card-img-top">
                @else
                    <img src="{{ asset('storage/foto-user/user.png') }}" class="card-img-top">
                @endif
                <form action="{{ route('guru.store') }}" method="post"> @csrf
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <hr>
                        @foreach ($guru as $gr)
                            <div class="alert alert-primary" role="alert">
                                TMT : {{ date('d-m-Y', strtotime($gr->tmt)) }}
                                STATUS KEPEGAWAIAN : {{ $gr->pegawaian->name }}
                            </div>
                        @endforeach
                        <hr>
                        <input type="date" name="tmt"
                            class="form-control form-control-sm @error('tmt') is-invalid @enderror" placeholder="TMT">
                        @error('tmt')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <select name="status_pegawai_id"
                            class="form-control form-control-sm mt-2 @error('status_pegawai_id') is-invalid @enderror">
                            @foreach ($pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('status_pegawai_id')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                        <button type="submit" class="btn btn-sm btn-primary btn-block mt-2">Update</button>

                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('guru.index') }}" class="btn btn-sm btn-warning">KEMBALI</a>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td width='15%'>Nama Guru</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Email</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Jurusan</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->jurusan }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Jenis Kelamin</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->gender == 'L' ? 'Lak-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>NIP/NI</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->no_induk }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Tempat / Tanggal Lahir</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->tempat_lahir }} /
                                {{ date('d-m-Y', strtotime($user->tanggal_lahir)) }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Agama</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->agama }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Nomor HP</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->nomor_hp }}</td>
                        </tr>
                        <tr>
                            <td width='15%'>Alamat</td>
                            <td width='5%'>:</td>
                            <td width='80%'>{{ $user->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
