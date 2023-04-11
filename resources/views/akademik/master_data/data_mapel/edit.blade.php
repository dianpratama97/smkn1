@extends('layouts.app')
@section('title', 'Edit Mapel Baru')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a class="btn btn-xs btn-warning px-3" href="{{ route('mapel.index') }}">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                            </span>
                        </a>
                    </h4>
                </div>
                <form action="{{ route('mapel.update', ['mapel' => $mapel]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="kode" class="col-sm-2 col-form-label">Kode Mapel</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                            id="kode" name="kode" value="{{ old('kode', $mapel->kode) }}">
                                        @error('kode')
                                            <strong class='text-danger'>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama Mapel</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $mapel->name) }}">
                                        @error('name')
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
