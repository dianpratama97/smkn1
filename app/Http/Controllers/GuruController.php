<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\User;
use App\Models\Agama;
use App\Models\Kepegawaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:guru_show', ['only' => ['index']]);
        $this->middleware('permission:guru_detail', ['only' => ['show']]);
        $this->middleware('permission:guru_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:guru_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:guru_delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $data = User::where(['level' => 'Guru'])->get();
        $pegawai = Kepegawaian::get();
        $guru = Guru::get();
        return view('akademik.data_pengguna.guru.index', compact('data', 'pegawai', 'guru'));
    }

    public function store(Request $request)
    {

        if (!empty($request->data)) {
            $will_insert = [];
            foreach ($request->input('data') as $key => $value) {
                array_push($will_insert, ['user_id' => $value]);
            }

            DB::table('guru')->insert($will_insert);
        } else {
            $cekBok = '';
        }


        Alert::success('Berhasil.', 'Data Ditambahkan.');

        return redirect()->route('guru.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $pegawai = Kepegawaian::get();
        $guru = Guru::where('user_id', $user->id)->get();
        return view('akademik.data_pengguna.guru.detail', compact('user', 'pegawai', 'guru'));
    }

    public function edit(Guru $guru)
    {
        //
    }

    public function destroy(Guru $guru)
    {
        //
    }
}
