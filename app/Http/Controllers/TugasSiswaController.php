<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TugasSiswaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:tugasSiswa_show', ['only' => ['index']]);
    //     $this->middleware('permission:tugasSiswa_detail', ['only' => ['show']]);
    //     $this->middleware('permission:tugasSiswa_create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:tugasSiswa_update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:tugasSiswa_delete', ['only' => ['delete']]);
    // }

    public function index()
    {
        $tugas = Tugas::withCount('tugas_siswa')->where([
            'tingkat_kelas' => auth()->user()->kelas,
            'jurusan' => auth()->user()->jurusan,
        ])->get();

        $tugas_siswa = TugasSiswa::where([
            'siswa_id' => auth()->user()->id,
        ])->get();

        return view('akademik.e_learning.tugas.siswa.index', compact('tugas', 'tugas_siswa'));
    }

    public function detail($id)
    {
        $tugasSiswa = Tugas::findOrFail($id);
        $tugas = TugasSiswa::where([
            'siswa_id' => auth()->user()->id,
            'tugas_id' => $tugasSiswa->id,
        ])->first();
        if (!empty($tugas->tugas_id)) {
            return view('akademik.e_learning.tugas.siswa.show', compact('tugasSiswa', 'tugas'));
        } else {
            return view('akademik.e_learning.tugas.siswa.detail', compact('tugasSiswa'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_tugas_siswa' => 'mimes:pdf|max:1024',
            'tugas' => 'required',
        ]);


        if ($request->file('file_tugas_siswa')) {
            $file = $request->file('file_tugas_siswa')->store('file-tugas/siswa');
        } else {
            $file = '';
        }

        TugasSiswa::create([
            'tugas_id'      => $request->tugas_id,
            'link'      => $request->link,
            'guru_id'      => $request->guru_id,
            // 'status'      => 1,
            'siswa_id'      => $request->siswa_id,
            'mapel_id'      => $request->mapel_id,
            'kelas_id'      => $request->kelas_id,
            'tugas'      => $request->tugas,
            'file_tugas_siswa'      => $file,
        ]);


        Alert::success('Berhasil.', 'Data Ditambahkan.');

        return redirect()->route('tugasSiswa.index');
    }

    public function show(TugasSiswa $tugasSiswa)
    {
    }

    public function edit(TugasSiswa $tugasSiswa)
    {
        //
    }

    public function update(Request $request, TugasSiswa $tugasSiswa)
    {
        //
    }

    public function destroy(TugasSiswa $tugasSiswa)
    {
        //
    }
}
