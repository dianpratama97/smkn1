@extends('layouts.app')
@section('title', 'Data SKL')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Upload Foto Gallery
                </div>
                <div class="card-body">
                    <form action="{{ route('skl.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('dir') is-invalid @enderror" id="image"
                                name="dir[]" multiple>
                            @error('dir')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                            <label class="custom-file-label" for="image">Upload ALL PDF</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Upload</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <form method="post" action="{{ url('multipleusersdelete') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input class="btn btn-danger btn-sm mb-3" type="submit" name="submit" value="Delete All Users" />
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>NO</th>
                            <th>FILE</th>
                            <th class="text-center"> <input type="checkbox" id="checkAll"> Pilih Semua</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $value->dir }}</td>
                                <td class="text-center"><input name='id[]' type="checkbox" id="checkItem"
                                        value="{{ $data[$key]->id }}">
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script language="javascript">
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
