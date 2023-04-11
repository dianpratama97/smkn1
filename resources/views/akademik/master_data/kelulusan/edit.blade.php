@extends('layouts.app')
@section('title', 'Edit Data')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a class="btn btn-xs btn-warning px-3" href="{{ route('kelulusan.index') }}">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                            </span>
                        </a>
                    </h4>
                </div>
                <form action="{{ route('kelulusan.update', ['kelulusan' => $kelulusan]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="kode" class="col-sm-3 col-form-label" readonly>Nama Siswa</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"
                                            value="{{ old('kode', $kelulusan->name) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 labels">Status kelulusan</label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror"
                                            id="kode">
                                            <option value="">--PILIH--</option>
                                            <option value="0" {{ $kelulusan->status == 0 ? 'selected' : '' }}>
                                                Belum di Input</option>
                                            <option value="1" {{ $kelulusan->status == 1 ? 'selected' : '' }}>
                                                Lulus</option>
                                            <option value="2" {{ $kelulusan->status == 2 ? 'selected' : '' }}>
                                                Tidak Lulus</option>

                                        </select>

                                        @error('kelulusan_id')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
