@extends('layouts.app')
@section('title', 'Profile Saya')
@section('content')
    <div class="card">
        <div class="card-header">
            BIODATA SAYA
        </div>
        <form action="{{ route('myProfile.update', ['user_id' => auth()->user()->id]) }}" method="POST"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nama Siswa</label>
                            <input type="text" class="form-control " id="name" readonly
                                value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="no_induk">Nomor Induk Siswa Nasional (NISN)</label>
                            <input type="text" class="form-control " id="no_induk" readonly
                                value="{{ auth()->user()->username }}" name="no_induk">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control " id="email" readonly
                                value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control " id="username" readonly
                                value="{{ auth()->user()->username }}">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control " id="jurusan" readonly
                                value="{{ auth()->user()->jurusan }}">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control " id="kelas" readonly
                                value="{{ auth()->user()->kelas }}">
                        </div>
                        <div class="form-group">
                            <label for="hp">Nomor Hp</label>
                            <input type="text" class="form-control " id="hp"
                                value="{{ old('hp', auth()->user()->hp) }}" name="hp" required>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-4">
                                    @if (auth()->user()->foto != null)
                                        @if (auth()->user()->foto)
                                            <img src="{{ asset('storage/foto-user/' . auth()->user()->foto) }}"
                                                width="70%" class="img-preview">
                                        @else
                                            <img class="img-preview" width="90%">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/foto-user/user.png') }}" alt="user" width="90%"
                                            class="img-preview">

                                    @endif

                                </div>
                                <div class="col-md-8">
                                    <label for="foto">Foto <b>(Latar Merah)</b> *Maksimal 2MB</label>
                                    <input type="hidden" name="oldFoto" value="{{  auth()->user()->foto }}">
                                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                        id="image" name="foto" onchange="previewImage()">
                                    <span class="text-danger">Jika Ukuran Foto Terlalu Besar Silakan dikecilkan.</span>
                                    @error('foto')
                                        <strong class='text-danger'>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelas">Jenis Kelamin</label>
                            <select name="gender" class="form-control " id="kelas" required>
                                <option value="l" {{ auth()->user()->gender == 'l' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="p" {{ auth()->user()->gender == 'p' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control " id="tempat_lahir"
                                value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}" name="tempat_lahir"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control " id="tanggal_lahir"
                                value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}" name="tanggal_lahir"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control " id="agama" required>
                                @foreach ($agama as $item)
                                    <option {{ old($item->id, auth()->user()->agama) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="number" class="form-control " id="rt"
                                        value="{{ old('rt', auth()->user()->rt) }}" name="rt" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="number" class="form-control " id="rw"
                                        value="{{ old('rw', auth()->user()->rw) }}" name="rw" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control " id="alamat"
                                value="{{ old('alamat', auth()->user()->alamat) }}" name="alamat" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" class="form-control " id="provinsi" required>
                                <option value="">--PILIH--</option>
                                @foreach ($provinsi as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <select name="kabupaten" class="form-control " id="kabupaten">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" class="form-control " id="kecamatan">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <select name="desa" class="form-control " id="desa">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control " id="nama_ayah"
                                value="{{ old('nama_ayah', auth()->user()->nama_ayah) }}" name="nama_ayah" required>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan_ayah">Pendidikan Ayah</label>
                            <select name="pendidikan_ayah" class="form-control " id="pendidikan_ayah" required>
                                <option value="sd">SD</option>
                                <option value="smp">SMP/SLTP</option>
                                <option value="sma">SMA/SLTA</option>
                                <option value="s1">S-1</option>
                                <option value="s2">S-2</option>
                                <option value="s3">S-3</option>
                                <option value="lainya">Lainya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="penghasilan_ayah">Penghasilan Ayah</label>
                            <input type="text" class="form-control " id="penghasilan_ayah"
                                value="{{ old('penghasilan_ayah', auth()->user()->penghasilan_ayah) }}"
                                name="penghasilan_ayah" required>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control " id="pekerjaan_ayah"
                                value="{{ old('pekerjaan_ayah', auth()->user()->pekerjaan_ayah) }}" name="pekerjaan_ayah"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control " id="nama_ibu"
                                value="{{ old('nama_ibu', auth()->user()->nama_ibu) }}" name="nama_ibu" required>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan_ibu">Pendidikan Ibu</label>
                            <select name="pendidikan_ibu" class="form-control " id="pendidikan_ibu" required>
                                <option value="sd">SD</option>
                                <option value="smp">SMP/SLTP</option>
                                <option value="sma">SMA/SLTA</option>
                                <option value="s1">S-1</option>
                                <option value="s2">S-2</option>
                                <option value="s3">S-3</option>
                                <option value="lainya">Lainya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="penghasilan_ibu">Penghasilan Ibu</label>
                            <input type="text" class="form-control " id="penghasilan_ibu"
                                value="{{ old('penghasilan_ibu', auth()->user()->penghasilan_ibu) }}"
                                name="penghasilan_ibu" required>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control " id="pekerjaan_ibu"
                                value="{{ old('pekerjaan_ibu', auth()->user()->pekerjaan_ibu) }}" name="pekerjaan_ibu"
                                required>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                @if (auth()->user()->no_induk != null)
                    <button type="submit" disabled="disabled" class="btn btn-xs btn-success">DATA TIDAK BISA Di
                        UBAH</button>
                @else
                    <button type="submit" class="btn btn-xs btn-primary">SIMPAN</button>
                @endif
            </div>
        </form>
    </div>


@endsection
@push('js-internal')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'd-inline';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

            $(function() {
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('getKabupaten') }}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kabupaten').html(msg);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    });
                })

                $('#kabupaten').on('change', function() {
                    let id_kabupaten = $('#kabupaten').val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('getKecamatan') }}",
                        data: {
                            id_kabupaten: id_kabupaten
                        },
                        cache: false,
                        success: function(msg) {
                            $('#kecamatan').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    });
                })

                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('getDesa') }}",
                        data: {
                            id_kecamatan: id_kecamatan
                        },
                        cache: false,

                        success: function(msg) {
                            $('#desa').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        }
                    });
                })
            })
        });
    </script>
@endpush
