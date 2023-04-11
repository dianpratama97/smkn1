<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tugas_show', ['only' => ['index']]);
        $this->middleware('permission:tugas_detail', ['only' => ['show']]);
        $this->middleware('permission:tugas_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tugas_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tugas_delete', ['only' => ['delete']]);
    }
    public function index()
    {
        $tugas = Tugas::get();

        return view('akademik.e_learning.tugas.guru.index', compact('tugas'));
    }

    public function indexGuru()
    {
        $tugas = Tugas::where('user_id', auth()->user()->id)->get();
        return view('akademik.e_learning.tugas.guru.index', compact('tugas'));
    }

    public function cek($cek_id)
    {
        $tugas = Tugas::findOrFail($cek_id);
        $tugasSiswa = TugasSiswa::where('tugas_id', $tugas->id)->get();

        return view('akademik.e_learning.tugas.guru.cek_dataKelas_tugas', compact('tugasSiswa', 'tugas'));
    }

    public function cekTugas($id_tugas)
    {
        $tugas = TugasSiswa::findOrFail($id_tugas);
        return view('akademik.e_learning.tugas.guru.detail_pengerjaan_tugas', compact('tugas'));
    }

    public function create()
    {
        $guru = Guru::get();
        $jurusan = Jurusan::get();
        $mapel = Mapel::get();
        $kelas = Kelas::get();
        return view('akademik.e_learning.tugas.guru.create', compact('kelas', 'jurusan', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'hari' => 'required',
            'catatan' => 'required',
            'judul' => 'required',
            'batas_waktu' => 'required',
            'tingkat_kelas' => 'required',
            'jurusan' => 'required',
            'file_tugas_guru' => 'mimes:pdf|max:1024',
        ]);


        if ($request->file('file_tugas_guru')) {
            $file = $request->file('file_tugas_guru')->store('file-tugas/guru');
        } else {
            $file = '';
        }

        Tugas::create([
            'guru_id'     => $request->guru_id,
            'user_id'     => $request->guru_id,
            'mapel_id'      => $request->mapel_id,
            'kelas_id'      => $request->kelas_id,
            'hari'      => $request->hari,
            'catatan'      => $request->catatan,
            'status'      => $request->status,
            'tingkat_kelas'      => $request->tingkat_kelas,
            'judul'      => $request->judul,
            'batas_waktu'      => $request->batas_waktu,
            'jurusan'      => $request->jurusan,
            'file_tugas_guru'      => $file,
        ]);


        Alert::success('Berhasil.', 'Data Ditambahkan.');

        return redirect()->route('tugas.index');
    }

    public function show(Tugas $tugas)
    {
    }

    public function edit(Tugas $tugas)
    {
        return view('akademik.e_learning.tugas.guru.edit', [
            'guru' => Guru::get(),
            'jurusan' => Jurusan::get(),
            'mapel' => Mapel::get(),
            'kelas' => Kelas::get(),
            'tugas' => $tugas
        ]);
    }

    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'hari' => 'required',
            'catatan' => 'required',
            'judul' => 'required',
            'batas_waktu' => 'required',
            'tingkat_kelas' => 'required',
            'jurusan' => 'required',
            'file_tugas_guru' => 'mimes:pdf|max:1024',
        ]);

        if ($request->file('file_tugas_guru')) {
            $file = $request->file('file_tugas_guru')->store('file-tugas/guru');
        } else {
            $file = '';
        }
        $tugas->update([
            'guru_id'     => $request->guru_id,
            'user_id'     => $request->guru_id,
            'mapel_id'      => $request->mapel_id,
            'kelas_id'      => $request->kelas_id,
            'hari'      => $request->hari,
            'status'      => $request->status,
            'batas_waktu'      => $request->batas_waktu,
            'catatan'      => $request->catatan,
            'tingkat_kelas'      => $request->tingkat_kelas,
            'judul'      => $request->judul,
            'jurusan'      => $request->jurusan,
            'file_tugas_guru'      => $file,
        ]);
        Alert::success('Berhasil.', 'Data Di edit.');

        return redirect()->route('tugas.index');
    }

    public function destroy(Tugas $tugas)
    {

        if ($tugas->file_tugas_guru) {
            Storage::delete($tugas->file_tugas_guru);
        }
        Tugas::destroy($tugas->id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('tugas.index');
    }
}
