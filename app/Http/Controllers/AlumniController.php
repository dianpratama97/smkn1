<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Imports\AlumniImport;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    public function index()
    {
        return view('setting.alumni.index', [
            'alumni' => Alumni::get()
        ]);
    }

    public function import(Request $request)
    {
        $data = new Alumni();
        $data = $request->file('file')->store('dataImportExcel');
        Excel::import(new AlumniImport, $data);
        Alert::success('Berhasil.', 'File Berhasil di Upload.');
        return redirect()->route('alumni.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Alumni $alumni)
    {
    }

    public function edit(Alumni $alumni)
    {
    }

    public function update(Request $request, Alumni $alumni)
    {
    }

    public function destroy(Alumni $alumni)
    {

        $alumni->delete();
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

        return redirect()->route('alumni.index');
    }


}
