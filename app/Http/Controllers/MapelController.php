<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Kurikulum;
use App\Imports\MapelImport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mapel_show', ['only' => ['index']]);
        $this->middleware('permission:mapel_detail', ['only' => ['show']]);
        $this->middleware('permission:mapel_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mapel_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mapel_delete', ['only' => ['delete']]);
    }
    public function index()
    {
        $data = Mapel::get();
        return view('akademik.master_data.data_mapel.index', compact('data'));
    }

    public function import(Request $request)
    {
        $data = new Mapel();
        $data = $request->file('file')->store('dataImportExcel');
        Excel::import(new MapelImport, $data);
        Alert::success('Berhasil.', 'File Berhasil di Upload.');
        return redirect()->route('mapel.index');
    }

    public function create()
    {
        $guru = Guru::get();
        return view('akademik.master_data.data_mapel.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
        ]);
        try {
            Mapel::create([
                'kode'     => $request->kode,
                'name'      => $request->name,
            ]);
            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('mapel.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(Mapel $mapel)
    {
    }

    public function edit(Mapel $mapel)
    {
        $jurusan = Jurusan::get();
        $kurikulum = Kurikulum::get();
        $guru = Guru::get();
        return view('akademik.master_data.data_mapel.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'kode' => 'required',
            'name' => 'required',
        ]);

        try {
            $mapel->update([
                'kode'     => $request->kode,
                'name'      => $request->name,
            ]);
            Alert::success('Berhasil.', 'Data Di edit.');

            return redirect()->route('mapel.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

        return redirect()->route('mapel.index');
    }
}
