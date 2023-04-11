@extends('layouts.app')
@section('title', 'Data Tags')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('tags.index') }}" method="GET" class="d-inline">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control" placeholder="Cari..." value="{{ request()->get('keyword') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            @can('tag_create')
                                <a href="{{ route('tags.create') }}" class="btn btn-success btn-sm float-right"
                                    role="button"><i class="fas fa-plus"></i> Buat
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
               
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list tag -->
                        @if (count($tags))
                            @foreach ($tags as $tag)
                                <!-- tag list -->
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                    <label class="mt-auto mb-auto">
                                        <!-- todo: show tag title -->
                                        {{ $tag->title }}
                                    </label>
                                    <div>
                                        @can('tag_update')
                                            <!-- edit -->
                                            <a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn btn-xs btn-warning"
                                                role="button">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('tag_delete')
                                            <!-- delete -->
                                            <form class="d-inline" action="{{ route('tags.destroy', ['tag' => $tag]) }}"
                                                role="alert" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </li>
                                <!-- end  tag list -->
                            @endforeach
                        @else
                            <p>
                                <strong>
                                    @if (request()->get('keyword'))
                                        Tags {{ request()->get('keyword') }} Tidak Ditemukan...
                                    @else
                                        Data Belum Ada.
                                    @endif
                                </strong>
                            </p>
                        @endif
                    </ul>
                </div>
                @if ($tags->hasPages())
                    <div class="card-footer">
                        {{ $tags->links('vendor.pagination.bootstrap-4') }}
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
