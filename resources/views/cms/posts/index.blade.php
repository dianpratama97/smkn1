@extends('layouts.app')
@section('title', 'Data Post')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline form-row">
                                <div class="col">
                                    <div class="input-group ">
                                        <label class="font-weight-bold mr-2">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            @foreach ($status as $value => $lable)
                                                <option value="{{ $value }}"
                                                    {{ $statusSelected == $value ? 'selected' : null }}>
                                                    {{ $lable }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-info btn-xs" type="submit">Terapkan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                            class="form-control form-control-sm" placeholder="Cari...">
                                        <div class="input-group-append">
                                            <button class="btn btn-info btn-xs" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('post_create')
                                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm float-right"
                                    role="button"><i class="fas fa-plus"></i> Buat
                                </a>
                            @endcan

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-md-4">
                                <div class="card">

                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ $post->title }}</b></h5>
                                        <p class="card-text">{{ $post->description }}</p>

                                        <div class="float-right">
                                            @can('post_detail')
                                                <!-- detail -->
                                                <a href="{{ route('posts.show', ['post' => $post]) }}"
                                                    class="btn btn-xs btn-info" role="button">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('post_update')
                                                <!-- edit -->
                                                <a href="{{ route('posts.edit', ['post' => $post]) }}"
                                                    class="btn btn-xs btn-warning" role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('post_delete')
                                                <!-- delete -->
                                                <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post]) }}"
                                                    role="alert" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <p class="text-center">
                                <strong>
                                    @if (request()->get('keyword'))
                                        Data {{ request()->get('keyword') }} Tidak Ditemukan...
                                    @else
                                        Data Belum Ada.
                                    @endif
                                </strong>
                            </p>
                    </div>
                    @endforelse
                </div>

                @if ($posts->hasPages())
                    <div class="card-footer">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@push('js-internal')
    <script>
        $(document).ready(function() {
            //event : Delete tag
            $("form[role='alert']").submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Anda Yakin ?",
                    text: "Data Yang di Hapus Tidak Dapat Dikembalikan.",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#0cf01b',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                    confirmButtonText: "Hapus",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        e.target.submit();
                    }
                });
            })
        });
    </script>
@endpush
