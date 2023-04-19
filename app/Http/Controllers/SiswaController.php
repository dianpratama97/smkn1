<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:siswa_show', ['only' => ['index']]);
        $this->middleware('permission:siswa_detail', ['only' => ['show']]);
        $this->middleware('permission:siswa_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:siswa_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:siswa_delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $kelas10 = User::where('kelas', 10)->count();
        $kelas11 = User::where('kelas', 11)->count();
        $kelas12 = User::where('kelas', 12)->count();


        //10
        $jumlah_siswa_Bio_kelas10 = User::where('kelas', 10)->whereNotNull('no_induk')->count();
        $jumlah_siswa_notBio_kelas10 = $kelas10 - $jumlah_siswa_Bio_kelas10;

        $biodata_kelas10 =  ($jumlah_siswa_Bio_kelas10 / $kelas10) * 100;
        $biodata_belum_kelas10 =  ($jumlah_siswa_notBio_kelas10 / $kelas10) * 100;

        //11
        $jumlah_siswa_Bio_kelas11 = User::where('kelas', 11)->whereNotNull('no_induk')->count();
        $jumlah_siswa_notBio_kelas11 = $kelas11 - $jumlah_siswa_Bio_kelas11;

        $biodata_kelas11 =  ($jumlah_siswa_Bio_kelas11 / $kelas11) * 100;
        $biodata_belum_kelas11 =  ($jumlah_siswa_notBio_kelas11 / $kelas11) * 100;

        //12
        $jumlah_siswa_Bio_kelas12 = User::where('kelas', 12)->whereNotNull('no_induk')->count();
        $jumlah_siswa_notBio_kelas12 = $kelas12 - $jumlah_siswa_Bio_kelas12;

        $biodata_kelas12 =  ($jumlah_siswa_Bio_kelas12 / $kelas12) * 100;
        $biodata_belum_kelas12 =  ($jumlah_siswa_notBio_kelas12 / $kelas12) * 100;



        return view('akademik.data_pengguna.siswa.index', compact('kelas10', 'kelas11', 'kelas12', 'biodata_kelas10', 'biodata_kelas11', 'biodata_kelas12', 'biodata_belum_kelas10', 'biodata_belum_kelas11', 'biodata_belum_kelas12'));
    }

    public function store(Request $request)
    {
        if (!empty($request->dataSiswa)) {
            $will_insert = [];
            foreach ($request->input('dataSiswa') as $key => $value) {
                array_push($will_insert, ['user_id' => $value, 'tingkat' => $request->tingkat]);
                User::where('id', $value)->update(['status_kelas' => 1,]);
            }
            DB::table('siswa')->insert($will_insert);
        } else {
            $cekBok = '';
        }

        Alert::success('Berhasil.', 'Data Ditambahkan.');
        return redirect()->back();
    }

    public function show(Siswa $siswa)
    {
    }

    public function edit(Siswa $siswa)
    {
    }

    public function update(Request $request, Siswa $siswa)
    {
    }

    public function hapus($id)
    {
        $siswa = Siswa::findOrFail($id);
        User::where('id', $siswa->user_id)->update(['status_kelas' => 0,]);
        Siswa::where('id', $id)->delete();
        Alert::success('Berhasil.', 'Data di Hapus.');
        return redirect()->back();
    }

    public function kelas10()
    {
        $siswa = Siswa::where('tingkat', 10)->get();
        $data = User::where('kelas', 10)->get();
        return view('akademik.data_pengguna.siswa.kelas_10', compact('data', 'siswa'));
    }

    public function kelas11()
    {
        $siswa = Siswa::where('tingkat', 11)->get();
        $data = User::where('kelas', 11)->get();
        return view('akademik.data_pengguna.siswa.kelas_11', compact('data', 'siswa'));
    }

    public function kelas12()
    {
        $siswa = Siswa::where('tingkat', 12)->get();
        $data = User::where('kelas', 12)->get();
        return view('akademik.data_pengguna.siswa.kelas_12', compact('data', 'siswa'));
    }

    public function kelas10_dkv()
    {
        $user = User::where(['kelas' => 10, 'jurusan' => 'DKV'])->get();
        $jumlah = User::where(['kelas' => 10, 'jurusan' => 'DKV'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_10.dkv', compact('user', 'jumlah'));
    }
    public function kelas10_tkj()
    {
        $user = User::where(['kelas' => 10, 'jurusan' => 'TKJ'])->get();
        $jumlah = User::where(['kelas' => 10, 'jurusan' => 'TKJ'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_10.tkj', compact('user', 'jumlah'));
    }
    public function kelas10_lp()
    {
        $user = User::where(['kelas' => 10, 'jurusan' => 'LP'])->get();
        $jumlah = User::where(['kelas' => 10, 'jurusan' => 'LP'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_10.lp', compact('user', 'jumlah'));
    }
    public function kelas10_tsm()
    {
        $user = User::where(['kelas' => 10, 'jurusan' => 'TSM'])->get();
        $jumlah = User::where(['kelas' => 10, 'jurusan' => 'TSM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_10.tsm', compact('user', 'jumlah'));
    }
    //kelas 11
    public function kelas11_mm()
    {
        $user = User::where(['kelas' => 11, 'jurusan' => 'MM'])->get();
        $jumlah = User::where(['kelas' => 11, 'jurusan' => 'MM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_11.mm', compact('user', 'jumlah'));
    }
    public function kelas11_tkj()
    {
        $user = User::where(['kelas' => 11, 'jurusan' => 'TKJ'])->get();
        $jumlah = User::where(['kelas' => 11, 'jurusan' => 'TKJ'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_11.tkj', compact('user', 'jumlah'));
    }
    public function kelas11_pkm()
    {
        $user = User::where(['kelas' => 11, 'jurusan' => 'PKM'])->get();
        $jumlah = User::where(['kelas' => 11, 'jurusan' => 'PKM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_11.pkm', compact('user', 'jumlah'));
    }
    public function kelas11_tbsm()
    {
        $user = User::where(['kelas' => 11, 'jurusan' => 'TBSM'])->get();
        $jumlah = User::where(['kelas' => 11, 'jurusan' => 'TBSM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_11.tbsm', compact('user', 'jumlah'));
    }
    //kelas 12
    public function kelas12_mm()
    {
        $user = User::where(['kelas' => 12, 'jurusan' => 'MM'])->get();
        $jumlah = User::where(['kelas' => 12, 'jurusan' => 'MM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_12.mm', compact('user', 'jumlah'));
    }
    public function kelas12_tkj()
    {
        $user = User::where(['kelas' => 12, 'jurusan' => 'TKJ'])->get();
        $jumlah = User::where(['kelas' => 12, 'jurusan' => 'TKJ'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_12.tkj', compact('user', 'jumlah'));
    }
    public function kelas12_pkm()
    {
        $user = User::where(['kelas' => 12, 'jurusan' => 'PKM'])->get();
        $jumlah = User::where(['kelas' => 12, 'jurusan' => 'PKM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_12.pkm', compact('user', 'jumlah'));
    }
    public function kelas12_tbsm()
    {
        $user = User::where(['kelas' => 12, 'jurusan' => 'TBSM'])->get();
        $jumlah = User::where(['kelas' => 12, 'jurusan' => 'TBSM'])->count();
        return view('akademik.data_pengguna.siswa.jurusan.kelas_12.tbsm', compact('user', 'jumlah'));
    }
}
