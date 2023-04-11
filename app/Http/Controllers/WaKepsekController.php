<?php

namespace App\Http\Controllers;

use App\Models\WaKepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WaKepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:waKepsek_show', ['only' => ['index']]);
        $this->middleware('permission:waKepsek_detail', ['only' => ['show']]);
        $this->middleware('permission:waKepsek_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:waKepsek_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:waKepsek_delete', ['only' => ['delete']]);
    }
    public function index()
    {
        $data = WaKepsek::get();
        return view('setting.wa_kepsek.index', compact('data'));
    }

    public function create()
    {
        return view('setting.wa_kepsek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|file|max:5000',
        ]);

        if ($request->file('foto')) {
            $data = $request->file('foto')->store('foto-setting');
        }

        try {
            WaKepsek::create([
                'name'     => $request->name,
                'bidang'     => $request->bidang,
                'fb'     => $request->fb,
                'wa'     => $request->wa,
                'foto'      => $data,
            ]);
            Alert::success('Berhasil.', 'Data Di Tambah.');
            return redirect()->route('waKepsek.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(WaKepsek $waKepsek)
    {
    }

    public function edit(WaKepsek $waKepsek)
    {
        return view('setting.wa_kepsek.edit', compact('waKepsek'));
    }

    public function update(Request $request, WaKepsek $waKepsek)
    {
        $request->validate([
            'foto' => 'image|file|max:2048',
        ]);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $foto = $request->file('foto')->store('foto-setting');
        } else {
            $foto = $request->oldFoto;
        }


        $waKepsek->update([
            'name'     => $request->name,
            'bidang'     => $request->bidang,
            'fb'     => $request->fb,
            'wa'     => $request->wa,
            'foto'      => $foto,
        ]);
        Alert::success('Berhasil.', 'Data Di Update.');
        return redirect()->route('waKepsek.index');
    }

    public function destroy(WaKepsek $waKepsek)
    {
        if ($waKepsek->foto) {
            Storage::delete($waKepsek->foto);
        }
        waKepsek::destroy($waKepsek->id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('waKepsek.index');
    }
}
