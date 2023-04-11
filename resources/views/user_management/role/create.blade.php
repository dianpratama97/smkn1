@extends('layouts.app')
@section('title', 'Buat Role')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input_role_name" class="font-weight-bold">
                                Role
                            </label>
                            <input id="input_role_name" value="{{ old('name') }}" name="name" type="text"
                                class="form-control form-control-sm @error('name') is-invalid @enderror" />
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <label for="input_role_permission" class="font-weight-bold">
                                permission
                            </label>
                            <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror"
                                id="input_role_permission">
                                <div class="row">
                                    <!-- list manage name:start -->
                                    @foreach ($authorities as $manageName => $permissions)
                                        <ul class="list-group mx-1">
                                            <li class="list-group-item bg-info text-white">
                                                {{ trans("permissions.{$manageName}") }}
                                            </li>
                                            <!-- list permission:start -->
                                            <div class="card ">
                                                <div class="card-body ">
                                                    @foreach ($permissions as $permission)
                                                        @if (old('permissions'))
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input id="{{ $permission }}" name="permissions[]"
                                                                        class="form-check-input" type="checkbox"
                                                                        value="{{ $permission }}"
                                                                        {{ in_array($permission, old('permissions')) ? 'checked' : null }}>
                                                                    <span class="form-check-sign "
                                                                        for="{{ $permission }}">
                                                                        <b>{{ trans("permissions.{$permission}") }}</b>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @else
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input id="{{ $permission }}" name="permissions[]"
                                                                        class="form-check-input" type="checkbox"
                                                                        value="{{ $permission }}">
                                                                    <span class="form-check-sign "
                                                                        for="{{ $permission }}">
                                                                        <b>{{ trans("permissions.{$permission}") }}</b>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- list permission:end -->

                                        </ul>
                                    @endforeach
                                    <!-- list manage name:end  -->
                                </div>
                            </div>
                            @error('permissions')
                                <strong class='text-danger'>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="text-center">
                            <a class="btn btn-xs btn-warning px-3" href="{{ route('roles.index') }}">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                                </span>
                            </a>
                            <button type="submit" class="btn btn-xs btn-success px-3">
                                <span class="btn-label">
                                    <i class="fas fa-check"></i> <b>Simpan</b>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
