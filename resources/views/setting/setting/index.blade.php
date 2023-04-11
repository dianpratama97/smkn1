@extends('layouts.app')
@section('title', 'Setting Sekolah')
@section('content')
    <div class="card">
        <div class="card-header">
            @if ($cek >= 1)
                @foreach ($data as $item)
                    <!-- edit -->
                    <a href="{{ route('setting.edit', ['setting' => $item->id]) }}" class="btn btn-xs btn-warning"
                        role="button">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- delete -->
                    <form class="d-inline" action="{{ route('setting.destroy', ['setting' => $item->id]) }}" role="alert"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                @endforeach
            @else
                @can('setting_create')
                    <a href="{{ route('setting.create') }}" class="btn btn-success btn-sm float-right" role="button">
                        <i class="fas fa-plus"></i> Buat
                    </a>
                @endcan
            @endif
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    @foreach ($data as $item)
                        <tr>
                            <th width="25%">NAMA KEPALA SEKOLAH</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->nama_kepsek }}</td>
                        </tr>
                        <tr>
                            <th width="25%">NIP</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->nip }}</td>
                        </tr>
                        <tr>
                            <th width="25%">MENU KELULUSAN KELAS 12</th>
                            <th width="3%" class="text-center">:</th>
                            <td><span class="badge badge-info">{{ $item->status_kelulusan == 1 ? 'AKTIF' : 'TIDAK AKTIF' }}</span></td>
                        </tr>
                
                        <tr>
                            <th width="25%">FOTO KEPALA SEKOLAH</th>
                            <th width="3%" class="text-center">:</th>
                            <td><img src="{{ asset('storage/' . $item->foto_kepsek) }}" width="30%"></td>
                        </tr>
                        <tr>
                            <th width="25%">TEKS PEMBUKA</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->text_pembuka }}</td>
                        </tr>
                        <tr>
                            <th width="25%">KATA SAMBUTAN</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{!! $item->kata_sambutan !!}</td>
                        </tr>
                        <tr>
                            <th width="25%">EMAIL</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <th width="25%">NOMOR TELP</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->no_telp }}</td>
                        </tr>
                        <tr>
                            <th width="25%">FB</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->fb }}</td>
                        </tr>
                        <tr>
                            <th width="25%">YOUTUBE</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->yt }}</td>
                        </tr>

                        <tr>
                            <th width="25%">ALAMAT</th>
                            <th width="3%" class="text-center">:</th>
                            <td>{{ $item->alamat }}</td>
                        </tr>

                        <tr>
                            <th width="25%">CAP</th>
                            <th width="3%" class="text-center">:</th>
                            <td><img src="{{ asset('storage/' . $item->cap) }}" width="10%"></td>
                        </tr>

                        <tr>
                            <th width="25%">TTD</th>
                            <th width="3%" class="text-center">:</th>
                            <td><img src="{{ asset('storage/' . $item->ttd) }}" width="10%"></td>
                        </tr>
                        <tr>
                            <th width="25%">Link E-Rapor</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {{ $item->link_1 }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Link E-Shool</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {{ $item->link_2 }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Link E-Library</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {{ $item->link_3 }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Link E-SPP</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {{ $item->link_4 }}</td>
                        </tr>
                        <tr>
                            <th width="25%">VISI</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {!! $item->visi !!}</td>
                        </tr>
                        <tr>
                            <th width="25%">MISI</th>
                            <th width="3%" class="text-center">:</th>
                            <td>
                                {!! $item->misi !!}</td>
                        </tr>
                    @endforeach
                </thead>
            </table>
        </div>
    </div>

    @push('js-internal')
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
