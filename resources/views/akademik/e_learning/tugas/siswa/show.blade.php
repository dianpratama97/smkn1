@extends('layouts.app')
@section('title', 'Datail Tugas')
@section('content')

    <div class="card">
        <div class="card-header">
            <span class="badge badge-info">{{ $tugasSiswa->mapel->name }} - {{ $tugasSiswa->mapel->kode }}</span>
            <a href="{{ route('tugasSiswa.index') }}" class="btn btn-warning btn-sm float-right" role="button">
                <i class="fas fa-backward"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $tugasSiswa->judul }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{!! $tugasSiswa->catatan !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($tugas->tugas_id == $tugasSiswa->id)
        <div class="card">
            <div class="card-body">
                <h1 class="text-center ">TUGAS SUDAH DIKERJAKAN</h1>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header text-center">
                <h4>Silakan Di Kerjakan</h4>
            </div>
            <form action="{{ route('tugasSiswa.store') }}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="tugas_id" value="{{ $tugasSiswa->id }}">
                        <input type="hidden" name="guru_id" value="{{ $tugasSiswa->user_id }}">
                        <input type="hidden" name="mapel_id" value="{{ $tugasSiswa->mapel_id }}">
                        <input type="hidden" name="siswa_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="kelas_id" value="{{ $tugasSiswa->kelas_id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">File Tugas</label>
                                <input type="file" name="file_tugas_siswa" id="file"
                                    class="form-control form-control-sm @error('file_tugas_siswa') is-invalid @enderror">
                                <span class="text-success">Silakan Upload File Pdf Tugas Jika Ada.</span>
                                @error('file_tugas_siswa')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control form-control-sm @error('link') is-invalid @enderror">
                                <span class="text-success">Silakan di Isi Jika Ada.</span>
                                @error('link')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tugas" class="font-weight-bold">
                                    Jawab/Keterangan
                                </label>
                                <textarea rows="10">{{ old('tugas') }}</textarea>
                                <span class="text-success">Silakan di Isi Jika Ada.</span>
                                @error('tugas')
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
    @endif




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
