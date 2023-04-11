@extends('layouts.app')
@section('title', 'Detail Kategori')
@section('content')

    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (file_exists(public_path($kategori->thumbnail)))
                        <!-- thumbnail:true -->
                        <div class="category-tumbnail" style="background-image: url('{{ asset($kategori->thumbnail) }}');">
                        </div>
                    @else
                        <!-- thumbnail:false -->
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                                font-size="24">
                                {{ $kategori->title }}
                            </text>
                        </svg>
                    @endif


                    <!-- title -->
                    <h2 class="my-1">
                        {{ $kategori->title }}
                    </h2>
                    <!-- description -->
                    <p class="text-justify">
                        {{ $kategori->desc }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-xs btn-warning px-3" href="{{ route('kategori.index') }}">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <!-- style -->
    <style>
        .category-tumbnail {
            width: 100%;
            height: 400px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
@endpush
