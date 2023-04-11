@extends('layouts.app')
@section('title', 'Edit Setting Informasi')
@section('content')

    <div class="card">
        <div class="card-header">
            @can('informasi_create')
                <a href="{{ route('informasi.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                    <span class="btn-label">
                        <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                    </span>
                </a>
            @endcan
        </div>

        <form action="{{ route('informasi.update', ['informasi' => $informasi->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="judul">JUDUL INFORMASI</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" value="{{ old('judul', $informasi->judul) }}">
                        @error('judul')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">

                        <div class="form-check">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="status" value="1"
                                    {{ old('status', $informasi->status) == 1 ? 'checked' : '' }}>
                                <span class="form-radio-sign">AKTIF INFORMASI</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio" name="status" value="0"
                                    {{ old('status', $informasi->status) == 0 ? 'checked' : '' }}>
                                <span class="form-radio-sign">TIDAK AKTIF</span>
                            </label>
                        </div>

                        @error('ppdb')
                            <strong class='text-danger'>{{ $message }}</strong>
                        @enderror

                    </div>

                    <div class="form-group col-md-12">
                        <label for="isi">ISI INFORMASI</label>
                        <textarea name="isi" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $informasi->isi) }}</textarea>
                        @error('isi')
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
