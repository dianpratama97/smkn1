@extends('layouts.app')
@section('title', 'Daftar Tugas Siswa')
@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('tugas.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                <i class="fas fa-backward"></i> Kembali
            </a>
        </div>
        <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data"> @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="guru_id">Guru</label>
                            <select class="form-control @error('guru_id') is-invalid @enderror" id="guru_id"
                                name="guru_id">
                                <option value="">--pilih--</option>
                                @foreach ($guru as $gr)
                                    <option value="{{ $gr->id }}" {{ old('guru_id') == $gr->id ? 'selected' : '' }}>
                                        {{ $gr->user->name }}</option>
                                @endforeach
                            </select>
                            @error('id')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mapel">Mapel</label>
                            <select class="form-control @error('mapel_id') is-invalid @enderror" id="mapel"
                                name="mapel_id">
                                <option value="">--pilih--</option>
                                @foreach ($mapel as $mp)
                                    <option value="{{ $mp->id }}" {{ old('mapel_id') == $mp->id ? 'selected' : '' }}>
                                        {{ $mp->kode }} - {{ $mp->name }}</option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas"
                                name="kelas_id">
                                <option value="">--pilih--</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}"
                                        {{ old('kelas_id') == $kls->id ? 'selected' : '' }}>{{ $kls->kode }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tingkat_kelas">Tingkat Kelas</label>
                            <select class="form-control @error('tingkat_kelas') is-invalid @enderror" id="kelas"
                                name="tingkat_kelas">
                                <option value="">--pilih--</option>
                                <option value="10" {{ old('tingkat_kelas') == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('tingkat_kelas') == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('tingkat_kelas') == '12' ? 'selected' : '' }}>12</option>

                            </select>
                            @error('tingkat_kelas')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control @error('hari') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                                <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa
                                </option>
                                <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                            @error('hari')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan"
                                class="form-control @error('jurusan') is-invalid @enderror">
                                <option value="">--pilih--</option>
                                @foreach ($jurusan as $jr)
                                    <option value="{{ $jr->kode }}"
                                        {{ old('jurusan') == $jr->kode ? 'selected' : '' }}>{{ $jr->kode }}</option>
                                @endforeach
                            </select>
                            @error('jurusan')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="file">File Tugas</label>
                            <input type="file" name="file_tugas_guru" id="file"
                                class="form-control form-control-sm @error('file_tugas_guru') is-invalid @enderror">
                            @error('file_tugas_guru')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <span class="text-warning">Silakan Upload File Pdf Tugas Jika Ada.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="file">STATUS AKTIF</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="1">AKTIF</option>
                                <option value="3">TIDAK AKTIF</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="batas_waktu">Batas Waktu</label>
                            <input type="date" name="batas_waktu" id="batas_waktu"
                                class="form-control form-control-sm @error('batas_waktu') is-invalid @enderror">
                            @error('batas_waktu')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="judul">Judul Tugas</label>
                            <textarea name="judul" id="judul" class="form-control form-control-sm @error('judul') is-invalid @enderror"
                                cols="5" rows="5">{{ old('judul') }}</textarea>
                            @error('judul')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="catatan" class="font-weight-bold">
                                Catatan/Tugas Guru
                            </label>
                            <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" rows="40">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-block btn-sm btn-success">simpan</button>
            </div>
        </form>
    </div>
@endsection


@push('js')
    {{-- panggil js thumbnail --}}
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('/vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('/vendor/tinymce5/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush
@push('js-internal')
    <script>
        $(document).ready(function() {

            // text editor
            $("#catatan").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar1: "fullscreen preview",
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

            });
        });
    </script>
@endpush
