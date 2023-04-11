@extends('layouts.app')
@section('title', 'Buat User')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <!-- name -->
                                <div class="form-group">
                                    <label for="input_user_name" class="font-weight-bold">
                                        Name
                                    </label>
                                    <input id="input_user_name" value="{{ old('name') }}" name="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror" />
                                    <!-- error message -->
                                    @error('name')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- name -->
                                <div class="form-group">
                                    <label for="username" class="font-weight-bold">
                                        Username
                                    </label>
                                    <input id="username" value="{{ old('username') }}" name="username" type="text"
                                        class="form-control form-control-sm @error('username') is-invalid @enderror" />
                                    <!-- error message -->
                                    @error('username')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- email -->
                                <div class="form-group">
                                    <label for="input_user_email" class="font-weight-bold">
                                        Email
                                    </label>
                                    <input id="input_user_email" value="{{ old('email') }}" name="email" type="email"
                                        class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        autocomplete="email" />
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
                                        @if (old('role'))
                                            <option value="{{ old('role')->id }}" selected>
                                                {{ old('role')->name }}
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
                                <!-- email -->
                                <div class="form-group">
                                    <label for="level" class="font-weight-bold">
                                        Level
                                    </label>
                                    <select id="level" name="level" class="custom-select">
                                        <option value="">--PILIH--</option>
                                        <option value="SuperAdmin">SUPER ADMIN</option>
                                        <option value="Siswa">SISWA</option>
                                        <option value="Guru">GURU</option>
                                        <option value="Edidor">UMUM/EDITOR</option>
                                    </select>
                                    <!-- error message -->
                                    @error('level')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
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
                                    <i class="fas fa-check"></i> <b>Simpan</b>
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
