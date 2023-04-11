<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::get();
        return view('cms.video.index', compact('data'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'dir' => 'required',
            'name' => 'required',
        ]);

        try {
            Video::create([
                'dir'     => $request->dir,
                'name'      => $request->name,
            ]);
            Alert::success('Berhasil.', 'Data Ditambahkan.');

            return redirect()->route('video.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());

            return redirect()->back()->withInput($request->all());
        }
    }

    public function show(Video $video)
    {
    }

    public function edit(Video $video)
    {
    }

    public function update(Request $request, Video $video)
    {
    }

    public function destroy(Video $video)
    {
        try {
            $video->delete();
            Alert::success('Berhasil.', 'Data Berhasil Dihapus.');

            return redirect()->route('ruangan.index');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        }

        return redirect()->route('video.index');
    }

    public function list()
    {
        $jumlah = Video::get()->count();
        $data = Video::orderBy('id', 'desc')->paginate(10);
        return view('blog.video.videoSekolah', compact('data','jumlah'));
    }
}
