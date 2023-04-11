<?php

namespace App\Http\Controllers;

use App\Models\Kelulusan;
use Illuminate\Http\Request;
use App\Imports\KelulusanImport;
use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class KelulusanController extends Controller
{
    public function index()
    {
        $data = Kelulusan::get();
        return view('akademik.master_data.kelulusan.index', compact('data'));
    }

    public function import(Request $request)
    {
        $data = new Kelulusan();
        $data = $request->file('file')->store('dataImportExcel');
        Excel::import(new KelulusanImport, $data);
        Alert::success('Berhasil.', 'File Berhasil di Upload.');
        return redirect()->route('kelulusan.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Kelulusan $kelulusan)
    {
    }

    public function edit(Kelulusan $kelulusan)
    {
        $kelas = Kelas::get();
        return view('akademik.master_data.kelulusan.edit', compact('kelulusan', 'kelas'));
    }
    public function hapusAll(Request $request)
    {
        $id = $request->id;
        foreach ($id as $data) {
            Kelulusan::where('id', $data)->delete();
        }
        Alert::success('Berhasil.', 'Berhasil di Hapus.');
        return redirect()->route('kelulusan.index');
    }
    public function update(Request $request, Kelulusan $kelulusan)
    {
        $request->validate([
            'status' => 'required',
        ]);

        try {
            $kelulusan->update([
                'status'     => $request->status,
            ]);
            Alert::success('Berhasil.', 'Data Di edit.');

            return redirect()->route('kelulusan.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(Kelulusan $kelulusan)
    {
        Kelulusan::destroy($kelulusan->id);
        Alert::success('Berhasil.', 'Berhasil di Hapus.');
        return redirect()->route('kelulusan.index');
    }

    public function status_lulus($nisn)
    {
        $data = Kelulusan::where('nisn', $nisn)->first();

        return view('akademik.master_data.kelulusan.hasil', compact('data'));
    }

    
}
