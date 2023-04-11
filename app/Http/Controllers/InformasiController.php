<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:informasi_show', ['only' => ['index']]);
        $this->middleware('permission:informasi_detail', ['only' => ['show']]);
        $this->middleware('permission:informasi_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:informasi_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:informasi_delete', ['only' => ['delete']]);
    }

    public function index()
    {
        return view('setting.informasi.index', [
            'data' => Informasi::get()
        ]);
    }

    public function create()
    {
        return view('setting.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'status' => 'required',
        ]);

        Informasi::create([
            'judul'     => $request->judul,
            'isi'      => $request->isi,
            'status'      => $request->status,
        ]);
        Alert::success('Berhasil.', 'Data Ditambahkan.');

        return redirect()->route('informasi.index');
    }

    public function show(Informasi $informasi)
    {
    }

    public function edit(Informasi $informasi)
    {
        return view('setting.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $informasi->update([
            'judul'     => $request->judul,
            'isi'      => $request->isi,
            'status'      => $request->status,
        ]);
        Alert::success('Berhasil.', 'Data Di Update.');
        return redirect()->route('informasi.index');
    }

    public function destroy(Informasi $informasi)
    {
        try {
            $informasi->delete();
            Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

            return redirect()->route('informasi.index');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        }

        return redirect()->route('informasi.index');
    }
}
