<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Gedung;
use App\Models\Jurusan;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kelas_show', ['only' => ['index']]);
        $this->middleware('permission:kelas_detail', ['only' => ['show']]);
        $this->middleware('permission:kelas_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kelas_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kelas_delete', ['only' => ['delete']]);
    }
    public function index()
    {
        return view('akademik.master_data.kelas.index', [
            'data' => Kelas::get()
        ]);
    }

    public function create()
    {
        return view('akademik.master_data.kelas.create', [
            'jurusan' => Jurusan::get(),
            'guru' => Guru::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required',
            'guru_id' => 'required',
            'kode' => 'required',
            'name' => 'required',
        ]);

        try {
            Kelas::create([
                'jurusan_id'     => $request->jurusan_id,
                'guru_id'      => $request->guru_id,
                'kode'      => $request->kode,
                'name'      => $request->name,
            ]);
            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('kelas.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(Kelas $kelas)
    {
    }

    public function edit(Kelas $kelas)
    {
        return view('akademik.master_data.kelas.update', [
            'kelas' => $kelas,
            'jurusan' => Jurusan::get(),
            'guru' => Guru::get(),
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
         
            'jurusan_id' => 'required',
            'guru_id' => 'required',
            'kode' => 'required',
            'name' => 'required',
        ]);

        try {
            $kelas->update([
                'jurusan_id'     => $request->jurusan_id,
                'guru_id'      => $request->guru_id,
                'kode'      => $request->kode,
                'name'      => $request->name,
            ]);
            Alert::success('Berhasil.', 'Data Di edit.');

            return redirect()->route('kelas.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(Kelas $kelas)
    {
        try {
            $kelas->delete();
            Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

            return redirect()->route('kelas.index');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        }

        return redirect()->route('kelas.index');
    }
}
