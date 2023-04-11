@extends('layouts.app')
@section('title', 'File Manager')
@section('content')

    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <form action="" method="GET" style="width: 200px">
                        <div class="input-group">
                            <select name="type" class="form-control form-control-sm">
                                @foreach ($types as $value => $lable)
                                    <option value="{{ $value }}" {{ $typeSelected == $value ? 'selected' : null }}>
                                        {{ $lable }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-info btn-xs" type="submit">
                                    Terapkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <iframe src="{{ route('unisharp.lfm.show') }}?type={{ $typeSelected }}"
                style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
        </div>
    </div>

@endsection
