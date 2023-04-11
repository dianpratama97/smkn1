<?php

namespace App\Http\Controllers;

use App\Models\JurusanBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanBlogController extends Controller
{
    public function index()
    {
        $data = JurusanBlog::get();
        return view('setting.jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('setting.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|file|max:2048',
        ]);

        if ($request->file('foto')) {
            $data = $request->file('foto')->store('foto-setting');
        }

        try {
            JurusanBlog::create([
                'name'     => $request->name,
                'foto'      => $data,
            ]);
            Alert::success('Berhasil.', 'Data Di Tambah.');
            return redirect()->route('jurusanBlog.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(JurusanBlog $jurusanBlog)
    {
    }

    public function edit(JurusanBlog $jurusanBlog)
    {
        return view('setting.jurusan.edit', compact('jurusanBlog'));
    }

    public function update(Request $request, JurusanBlog $jurusanBlog)
    {
        $request->validate([
            'foto' => 'image|file|max:2048',
        ]);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $data = $request->file('foto')->store('foto-setting');
        } else {
            $data = $request->oldFoto;
        }

        try {
            $jurusanBlog->update([
                'name'     => $request->name,
                'foto'      => $data,
            ]);
            Alert::success('Berhasil.', 'Data Di Update.');
            return redirect()->route('jurusanBlog.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(JurusanBlog $jurusanBlog)
    {
        if ($jurusanBlog->foto) {
            Storage::delete($jurusanBlog->foto);
        }
        JurusanBlog::destroy($jurusanBlog->id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('jurusanBlog.index');
    }
}
