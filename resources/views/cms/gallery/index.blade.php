@extends('layouts.app')
@section('title', 'Data Gallery')
@section('content')


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Upload Foto Gallery
                </div>
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('dir') is-invalid @enderror" id="image"
                                name="dir[]" multiple>
                            @error('dir')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                            <label class="custom-file-label" for="image">Upload Gambar</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Upload</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-sm-3">
                                <div class="card body">
                                    <img src="{{ asset('storage/' . $item->dir) }}" class="card-img-top" height="110px">
                                    <div class="card-body">
                                        <div class="text-center">
                                            @can('gallery_delete')
                                                <!-- delete -->
                                                <form class="d-inline"
                                                    action="{{ route('gallery.destroy', ['gallery' => $item->id]) }}"
                                                    role="alert" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card-footer">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
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
