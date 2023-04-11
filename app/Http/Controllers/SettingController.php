<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:setting_show', ['only' => ['index']]);
        $this->middleware('permission:setting_detail', ['only' => ['show']]);
        $this->middleware('permission:setting_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:setting_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:setting_delete', ['only' => ['delete']]);
    }
    public function index()
    {
        return view('setting.setting.index', [
            'data' => Setting::get(),
            'cek' => Setting::get()->count()
        ]);
    }

    public function create()
    {
        return view('setting.setting.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'foto_kepsek' => 'image|file|max:5125',
            'nama_kepsek' => 'required',
            'text_pembuka' => 'required',
            'kata_sambutan' => 'required',
            'kata_sambutan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'yt' => 'required',
            'fb' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'link_1' => 'required',
            'link_2' => 'required',
            'link_3' => 'required',
            'link_4' => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
        ]);

        if ($request->file('slider_1')) {
            $slider_1 = $request->file('slider_1')->store('foto-setting');
        }
        if ($request->file('slider_2')) {
            $slider_2 = $request->file('slider_2')->store('foto-setting');
        }
        if ($request->file('foto_kepsek')) {
            $foto_kepsek = $request->file('foto_kepsek')->store('foto-setting');
        }
        if ($request->file('ttd')) {
            $ttd = $request->file('ttd')->store('foto-setting');
        }
        if ($request->file('cap')) {
            $cap = $request->file('cap')->store('foto-setting');
        }


        Setting::create([
            'nama_kepsek'     => $request->nama_kepsek,
            'status_kelulusan'     => $request->status_kelulusan,
            'text_pembuka'     => $request->text_pembuka,
            'kata_sambutan'     => $request->kata_sambutan,
            'alamat'     => $request->alamat,
            'no_telp'     => $request->no_telp,
            'yt'     => $request->yt,
            'fb'     => $request->fb,
            'email'     => $request->email,
            'foto_kepsek'      => $foto_kepsek,
            'ttd'      => $ttd,
            'cap'      => $cap,
            'nip'      => $request->nip,
            'link_1'      => $request->link_1,
            'link_2'      => $request->link_2,
            'link_3'      => $request->link_3,
            'link_4'      => $request->link_4,
            'visi'      => $request->visi,
            'misi'      => $request->misi,
        ]);
        Alert::success('Berhasil.', 'Data Di Tambah.');
        return redirect()->route('setting.index');
    }

    public function show(Setting $setting)
    {
    }

    public function edit(Setting $setting)
    {
        return view('setting.setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'foto_kepsek' => 'image|file|max:5125',
            'nama_kepsek' => 'required',
            'text_pembuka' => 'required',
            'kata_sambutan' => 'required',
            'kata_sambutan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'yt' => 'required',
            'fb' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'link_1' => 'required',
            'link_2' => 'required',
            'link_3' => 'required',
            'link_4' => 'required',
            'visi'      => 'required',
            'misi'      => 'required',
        ]);
       
       
        if ($request->file('foto_kepsek')) {
            if ($request->old_kepsek) {
                Storage::delete($request->old_kepsek);
            }
            $foto_kepsek = $request->file('foto_kepsek')->store('foto-setting');
        } else {
            $foto_kepsek = $request->old_kepsek;
        }
        if ($request->file('ttd')) {
            if ($request->oldttd) {
                Storage::delete($request->oldttd);
            }
            $ttd = $request->file('ttd')->store('foto-setting');
        } else {
            $ttd = $request->oldttd;
        }
        if ($request->file('cap')) {
            if ($request->oldcap) {
                Storage::delete($request->oldcap);
            }
            $cap = $request->file('cap')->store('foto-setting');
        } else {
            $cap = $request->oldcap;
        }

        $setting->update([
            'nama_kepsek'     => $request->nama_kepsek,
            'status_kelulusan'     => $request->status_kelulusan,
            'text_pembuka'     => $request->text_pembuka,
            'kata_sambutan'     => $request->kata_sambutan,
            'alamat'     => $request->alamat,
            'no_telp'     => $request->no_telp,
            'yt'     => $request->yt,
            'fb'     => $request->fb,
            'email'     => $request->email,
            'foto_kepsek'      => $foto_kepsek,
            'ttd'      => $ttd,
            'cap'      => $cap,
            'nip'      => $request->nip,
            'link_1'      => $request->link_1,
            'link_2'      => $request->link_2,
            'link_3'      => $request->link_3,
            'link_4'      => $request->link_4,
            'visi'      => $request->visi,
            'misi'      => $request->misi,
        ]);
        Alert::success('Berhasil.', 'Data Di Update.');
        return redirect()->route('setting.index');
    }

    public function destroy(Setting $setting)
    {
       
        if ($setting->foto_kepsek) {
            Storage::delete($setting->foto_kepsek);
        }
        Setting::destroy($setting->id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('setting.index');
    }
}
