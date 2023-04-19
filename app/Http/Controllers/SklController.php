<?php

namespace App\Http\Controllers;

use App\Models\Skl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SklController extends Controller
{
    public function index()
    {

        return view('akademik.master_data.skl.index', [
            'data' => Skl::all()
        ]);
    }

    public function store(Request $request)
    {

        foreach ($request->dir as $file) {

            $filename = $file->getClientOriginalName();
            $file->storeAs('file-skl/', $filename);
            $fileModel = new Skl;
            $fileModel->dir = 'file-skl/' . $filename;
            $fileModel->save();
        }

        Alert::success('Berhasil.', 'Data Di Tambah.');
        return redirect()->back()->withInput($request->all());
    }

    public function deleteAll(Request $request)
    {

        $data = Skl::findOrFail($request->id);
        foreach ($data as $documentSkl) {
            Storage::delete($documentSkl->dir);
            Skl::destroy($request->id);
        }
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->back()->withInput($request->all());
    }
}
