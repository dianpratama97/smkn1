@extends('layouts.app')
@section('title', 'Pilih Kelas 10 Desain Komunikasi Visual')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <a href="{{ route('siswa.kelas10') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali
                    </a>
                    <span class="badge badge-info pull-right">Jumlah Siswa : {{ $jumlah }} Orang</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-users" class="table table-bordered table-hover" width="100%">
                            <thead class="text-center">
                                <tr>
                                    <th width="7%">NO</th>
                                    <th width="93%">NAME</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugin/datatables/bootstrap.css') }}">
@endpush
@push('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
@endpush

@push('js-internal')
    <script>
        $(document).ready(function() {
            $('#data-users').DataTable({});
        });
    </script>
@endpush
