@extends('layouts.app')
@section('title', 'Tambah Tags')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('tags.store') }}" method="POST"> @csrf
                    <div class="card-body">
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_tag_title" class="font-weight-bold">
                                Judul
                            </label>
                            <input id="input_tag_title" value="{{ old('title') }}" name="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" placeholder="" />
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_tag_slug" class="font-weight-bold">
                                Slug
                            </label>
                            <input id="input_tag_slug" value="{{ old('slug') }}" name="slug" type="text"
                                class="form-control" placeholder="" readonly />
                            @error('slug')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="text-center">
                            <a class="btn btn-xs btn-warning px-3" href="{{ route('tags.index') }}">
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
    </div>


@endsection

@push('js-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }

            //event: slug
            $('#input_tag_title').change(function(e) {
                $('#input_tag_slug').val(generateSlug(e.target.value))
            })
        });
    </script>
@endpush
