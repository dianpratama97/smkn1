<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::orderBy('id', 'desc')->paginate(20);
        return view('cms.gallery.index', compact('data'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'dir' => 'required|max:10240',
        ]);

        foreach ($request->dir as $file) {

            $filename = time() . '_' . $file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->storeAs('foto-gallery/', $filename);
            $fileModel = new Gallery;
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->dir = 'foto-gallery/' . $filename;
            $fileModel->save();
        }

        Alert::success('Berhasil.', 'Data Di Tambah.');
        return redirect()->back()->withInput($request->all());
    }

    public function show(Gallery $gallery)
    {
    }

    public function edit(Gallery $gallery)
    {
    }

    public function update(Request $request, Gallery $gallery)
    {
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->dir) {
            Storage::delete($gallery->dir);
        }
        Gallery::destroy($gallery->id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('gallery.index');
    }

    public function foto()
    {
        $data = Gallery::orderBy('id', 'desc')->paginate(10);
        return view('blog.foto.fotoSekolah', compact('data'));
    }
}
