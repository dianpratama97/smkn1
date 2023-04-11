@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
    <style type="text/css">

    </style>


    <div class="col-md-10 ml-auto mr-auto">
        <div class="card">
            <form action="{{ route('kelas.store') }}" method="post">@csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="jurusan_id" class="col-sm-2 labels">jurusan</label>
                                <div class="col-sm-10">
                                    <select name="jurusan_id" id="jurusan_id"
                                        class="form-control form-control-sm @error('jurusan_id') is-invalid @enderror"
                                        id="kode">
                                        <option value="">--PILIH--</option>
                                        @foreach ($jurusan as $item)
                                            <option value="{{ $item->id }}">({{ $item->kode }}) -
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('jurusan_id')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 labels">kelas</label>
                                <div class="col-sm-10">
                                    <input type="number" name="name" value="{{ old('name') }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name">

                                    @error('name')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="guru_id" class="col-sm-2 labels">wali kelas</label>
                                <div class="col-sm-10">
                                    <select name="guru_id" id="guru_id"
                                        class="form-control form-control-sm @error('guru_id') is-invalid @enderror"
                                        id="kode">
                                        <option value="">--PILIH--</option>
                                        @foreach ($guru as $item)
                                            <option value="{{ $item->id }}"> {{ $item->user->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('guru_id')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode" class="col-sm-2 labels">kode</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode" value="{{ old('kode') }}"
                                        class="form-control form-control-sm @error('kode') is-invalid @enderror"
                                        id="kode">

                                    @error('kode')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            
                        </div>

                    </div>
                </div>


                <div class="card-footer text-center">
                    <a class="btn btn-xs btn-warning px-3" href="{{ route('kelas.index') }}">
                        <span class="btn-label">
                            <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                        </span>
                    </a>
                    <button type="submit" class="btn btn-xs btn-success px-3">
                        <span class="btn-label">
                            <i class="fas fa-check"></i> <b>Simpan</b>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
