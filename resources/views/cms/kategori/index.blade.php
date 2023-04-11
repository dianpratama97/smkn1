@extends('layouts.app')
@section('title', 'Data Kategori')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('kategori.index') }}" method="GET" class="d-inline">
                        <div class="input-group">
                            <input name="keyword" type="search" class="form-control" placeholder="Cari..."
                                value="{{ request()->get('keyword') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    @can('kategori_create')
                        <a href="{{ route('kategori.create') }}" class="btn btn-success btn-sm float-right" role="button">
                            <i class="fas fa-plus"></i> Buat
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (count($kategori))
                @include('cms.kategori._kategori-list', [
                    'kategori' => $kategori,
                    'count' => 0,
                ])
            @else
                @if (request()->get('keyword'))
                    <span class="text-warning">Kategori {{ request()->get('keyword') }} Tidak Ditemukan...</span>
                @else
                    <span class="text-warning">Data Kategori Belum Ada.</span>
                @endif
            @endif


        </div>


        @if ($kategori->hasPages())
            <div class="card-footer">
                {{ $kategori->links('vendor.pagination.bootstrap-4') }}
            </div>
        @endif

    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            //Event: delete kategori
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



            });
        });
    </script>
@endpush
