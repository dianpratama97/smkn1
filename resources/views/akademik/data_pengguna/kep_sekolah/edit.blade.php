@extends('layouts.app')
@section('title', 'Edit Data Kepala Sekolah')
@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-xs btn-warning px-3" href="{{ route('kepsek.index') }}">
                <span class="btn-label">
                    <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                </span>
            </a>
        </div>
        <form action="{{ route('kepsek.update', ['kepsek' => $kepsek]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Lengkap <span class="text-danger">(beserta gelar)</span></label>
                        <input type="text" name="name" value="{{ old('name', $kepsek->name) }}"
                            class="form-control form-control-sm @error('name') is-invalid @enderror" id="name">

                        @error('name')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</span></label>
                        <select class="form-control form-control-sm @error('gender') is-invalid @enderror" name="gender">
                            <option value="">--pilih--</option>
                            <option value="L" {{ $kepsek->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $kepsek->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>

                        @error('gender')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mulai_menjabat">Mulai Menjabat</span></label>
                        <input type="date" name="mulai_menjabat"
                            value="{{ old('mulai_menjabat', $kepsek->mulai_menjabat) }}"
                            class="form-control form-control-sm @error('mulai_menjabat') is-invalid @enderror"
                            id="mulai_menjabat">

                        @error('mulai_menjabat')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="selesai_menjabat">Selesai Menjabat</span></label>
                        <input type="date" name="selesai_menjabat"
                            value="{{ old('selesai_menjabat', $kepsek->selesai_menjabat) }}"
                            class="form-control form-control-sm @error('selesai_menjabat') is-invalid @enderror"
                            id="selesai_menjabat">

                        @error('selesai_menjabat')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telp/Hp</span></label>
                        <input type="number" name="no_telp" value="{{ old('no_telp', $kepsek->no_telp) }}"
                            class="form-control form-control-sm @error('no_telp') is-invalid @enderror" id="no_telp">

                        @error('no_telp')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pangkat">Pangkat</span></label>
                        <input type="text" name="pangkat" value="{{ old('pangkat', $kepsek->pangkat) }}"
                            class="form-control form-control-sm @error('pangkat') is-invalid @enderror" id="pangkat">

                        @error('pangkat')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</span></label>
                        <textarea class="form-control form-control-sm @error('no_telp') is-invalid @enderror" name="alamat" cols="10">{{ old('alamat', $kepsek->alamat) }}</textarea>

                        @error('alamat')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>
    </div>

@endsection
