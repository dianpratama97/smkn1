@extends('layouts.app')
@section('title', 'Profile Saya')
@section('content')
    <div class="card">
        <div class="card-header">
            GANTI PASSWORD
        </div>
        <form action="{{ route('myProfile.updatePassword', ['user_id' => auth()->user()->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body col-md-6 ml-auto mr-auto">
                <div class="row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                            id="password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password_confirmation">Ulangi Password</label>
                        <input type="password" class="form-control form-control-sm" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="card-footer">

                <button type="submit" class="btn btn-xs btn-primary">Ganti Password</button>
            </div>
        </form>
    </div>
@endsection
