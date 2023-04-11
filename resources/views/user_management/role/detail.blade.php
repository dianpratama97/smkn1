@extends('layouts.app')
@section('title', 'Detail Role')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="input_role_name" class="font-weight-bold">
                            Role
                        </label>
                        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text"
                            class="form-control" readonly />
                    </div>
                    <!-- permission -->
                    <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                            permission
                        </label>
                        <div class="form-control overflow-auto h-100">
                            <div class="row ml-2 ">
                                <!-- list manage name:start -->
                                @forelse ($authorities as $manageName => $permissions)
                                    <ul class="list-group mx-1">
                                        <li class="list-group-item bg-info text-white">
                                            {{ trans("permissions.{$manageName}") }}
                                        </li>
                                        <!-- list permission:start -->
                                        <div class="card">
                                            <div class="card-body">
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                onclick="return false;"
                                                                {{ in_array($permission, $rolePermissions) ? 'checked' : null }}>
                                                            <span class="form-check-sign">
                                                                {{ trans("permissions.{$permission}") }}
                                                            </span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- list permission:end -->

                                    </ul>
                                @empty
                                    <p><b>Data Belum Ada.</b></p>
                                @endforelse

                                <!-- list manage name:end  -->
                            </div>
                        </div>
                    </div>
                    <!-- button  -->
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-xs btn-warning px-3" href="{{ route('roles.index') }}">
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
