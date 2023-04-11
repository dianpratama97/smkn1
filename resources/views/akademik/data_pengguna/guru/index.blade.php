@extends('layouts.app')
@section('title', 'Data Guru')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('guru.store') }}" method="post"> @csrf
                    <div class="card-header">
                        <h4 class="card-title">

                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Pilih</th>
                                    <th>Name</th>
                                    <th>Sudah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="data[]" value="{{ $item->id }}">

                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @foreach ($guru as $gr)
                                                @if ($gr->user_id != $item->id)
                                                @else
                                                    <span class="badge badge-success">aktif</span>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-info">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
