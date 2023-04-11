@extends('layouts.app')
@section('title', 'Show Post')
@section('content')

    <!-- style -->
    <style>
        .post-tumbnail {
            width: 100%;
            height: 400px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>

    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (asset('storage/' . $post->thumbnail))
                        <!-- thumbnail:true -->
                        <div class="post-tumbnail"
                            style="background-image: url('{{ asset('storage/' . $post->thumbnail) }}');">
                        </div>
                    @else
                        <!-- thumbnail:false -->
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"
                                fill="#dee2e6" dy=".3em" font-size="24">
                                {{ $post->title }}
                            </text>
                        </svg>
                    @endif

                    <table class="table table-bordered mt-2">
                        <tbody>
                            <tr>
                                <td>
                                    <!-- title -->
                                    <h2 class="my-1">
                                        <b>Judul : {{ $post->title }}</b>
                                    </h2>
                                    <!-- description -->
                                    <p class="text-justify">
                                        Keterangan : {{ $post->description }}
                                    </p>
                                    <!-- categories -->
                                    @foreach ($categories as $categori)
                                        <span class="badge badge-success">{{ $categori->title }}</span>
                                    @endforeach
                                    <br>
                                    <!-- tags  -->
                                    @foreach ($tags as $tag)
                                        <span class="badge badge-info mt-2"># {{ $tag->title }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- content -->
                    <div class="py-1">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>{!! $post->content !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="d-flex justify-content-end">
                        <a class="btn btn-xs btn-warning px-3" href="{{ route('posts.index') }}">
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
