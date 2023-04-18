@extends('layouts.app')
@section('title', 'Edit User')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- name -->
                                <div class="form-group">
                                    <label for="input_user_name" class="font-weight-bold">
                                        Name
                                    </label>
                                    <input id="input_user_name" value="{{ old('name', $user->name) }}" name="name"
                                        type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror" />
                                    <!-- error message -->
                                    @error('name')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- email -->
                                <div class="form-group">
                                    <label for="input_user_email" class="font-weight-bold">
                                        Email
                                    </label>
                                    <input id="input_user_email" value="{{ old('email', $user->email) }}" name="email"
                                        type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        autocomplete="email" readonly />
                                    <!-- error message -->
                                    @error('email')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- password -->
                                <div class="form-group">
                                    <label for="input_user_password" class="font-weight-bold">
                                        Password
                                    </label>
                                    <input id="input_user_password" name="password" type="password"
                                        class="form-control form-control-sm @error('password') is-invalid @enderror"
                                        autocomplete="new-password" />
                                    <!-- error message -->
                                    @error('password')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- password_confirmation -->
                                <div class="form-group">
                                    <label for="input_user_password_confirmation" class="font-weight-bold">
                                        Password confirmation
                                    </label>
                                    <input id="input_user_password_confirmation" name="password_confirmation"
                                        type="password"
                                        class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                                        autocomplete="new-password" />
                                    <!-- error message -->
                                    @error('password_confirmation')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <!-- role -->
                                <div class="form-group">
                                    <label for="select_user_role" class="font-weight-bold">
                                        Role
                                    </label>
                                    <select id="select_user_role" name="role" data-placeholder=""
                                        class="custom-select w-100">
                                        @if (old('role', $roleSelected))
                                            <option value="{{ old('role', $roleSelected)->id }}" selected>
                                                {{ old('role', $roleSelected)->name }}
                                            </option>
                                        @endif
                                    </select>
                                    @error('role')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                    <!-- error message -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- level -->
                                <div class="form-group">
                                    <label for="level" class="font-weight-bold">
                                        Level
                                    </label>
                                    <select id="level" name="level" class="custom-select">
                                        <option value="">--PILIH--</option>
                                        <option value="SuperAdmin" {{ $user->level == 'SuperAdmin' ? 'selected' : '' }}>
                                            SUPER ADMIN</option>
                                        <option value="Siswa" {{ $user->level == 'Siswa' ? 'selected' : '' }}>SISWA
                                        </option>
                                        <option value="Guru" {{ $user->level == 'Guru' ? 'selected' : '' }}>GURU
                                        </option>
                                        <option value="Edidor" {{ $user->level == 'Editor' ? 'selected' : '' }}>
                                            UMUM/EDITOR</option>
                                    </select>
                                    <!-- error message -->
                                    @error('level')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- level -->
                                <div class="form-group">
                                    <label for="level" class="font-weight-bold">
                                        Reset Data <span class="text-danger">*Hapus NISN Siswa</span>
                                    </label>
                                    <input id="no_induk" name="no_induk" type="number"
                                        class="form-control form-control-sm"
                                        value="{{ old('no_induk', $user->no_induk) }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- level -->
                                <div class="form-group">
                                    <img src="{{ asset('storage/foto-user/' . $item->foto) }}" width="100px">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-xs btn-warning px-3" href="{{ route('users.index') }}">
                                <span class="btn-label">
                                    <i class="fas fa-arrow-alt-circle-left"></i> <b>kembali</b>
                                </span>
                            </a>
                            <button type="submit" class="btn btn-xs btn-success px-3">
                                <span class="btn-label">
                                    <i class="fas fa-check"></i> <b>Edit</b>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush
@push('js-internal')
    <script>
        $(function() {

            //select2
            $('#select_user_role').select2({
                theme: 'bootstrap4',

                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

        })
    </script>
@endpush
