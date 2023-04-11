@extends('layouts.app')
@section('title', 'DATA VIDEO')
@section('content')
    <div class="modal fade" id="importvideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPLOAD VIDEO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dir">Link</label>
                            <input id="dir" value="{{ old('dir') }}" name="dir" type="text"
                                class="form-control form-control-sm @error('dir') is-invalid @enderror" />
                            @error('dir')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Judul Video</label>
                            <input id="name" value="{{ old('name') }}" name="name" type="text"
                                class="form-control form-control-sm @error('name') is-invalid @enderror" />
                            @error('name')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @can('video_create')
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#importvideos">
                                <i class="fas fa-video"></i> UPLOAD VIDEO
                            </button>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-videos" class="table table-bordered" width="120%">
                            <thead class="text-center">
                                <tr>
                                    <th width="7%">NO</th>
                                    <th width="20%">VIDEO</th>
                                    <th width="20%">JUDUL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <iframe width="180" height="90" src="{{ $item->dir }}" frameborder="0"
                                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </td>
                                        <td>{{ $item->name }}</td>

                                        <td class="text-center">
                                    
                                            @can('video_delete')
                                                <!-- delete -->
                                                <form class="d-inline"
                                                    action="{{ route('video.destroy', ['video' => $item->id]) }}"
                                                    role="alert" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/js/plugin/datatables/bootstrap.css') }}">
    @endpush
    @push('js')
        <!-- Datatables -->
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    @endpush

    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#data-videos').DataTable({});
            });
        </script>

        <script>
            $(document).ready(function() {
                //event : Delete
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

@endsection
