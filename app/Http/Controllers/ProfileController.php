<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $agama = Agama::get();
        $provinsi = Province::all();
        return view('profile.index', compact('agama', 'provinsi'));
    }

    public function getKabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupaten = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option value=''>--Pilih Kabupaten--</option>";
        foreach ($kabupaten as $kab) {
            $option .= "<option value='$kab->id'>$kab->name</option>";
        }
        echo $option;
    }

    public function getKecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatan = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option value=''>--Pilih Kecamatan--</option>";
        foreach ($kecamatan as $kec) {
            $option .= "<option value='$kec->id'>$kec->name</option>";
        }
        echo $option;
    }

    public function getDesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $desa = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option value=''>--Pilih Desa--</option>";
        foreach ($desa as $des) {
            $option .= "<option value='$des->id'>$des->name</option>";
        }
        echo $option;
    }


    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);


        if ($request->hasfile('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $request->no_induk . '_' . date('Y') . '.' . $extension;
            $path = $request->file('foto')->storeAs('foto-user/', $filenameSimpan);
            $filenameSimpan;
        } else {
            $foto = $request->oldFoto;
        }

       
        // dd($filenameSimpan);
        $user->update([
            'hp'     => $request->hp,
            'foto'     => $filenameSimpan,
            'tempat_lahir'     => $request->tempat_lahir,
            'agama'     => $request->agama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'gender'     => $request->gender,
            'rt'      => $request->rt,
            'rw'      => $request->rw,
            'alamat'      => $request->alamat,
            'nama_ayah'      => $request->nama_ayah,
            'penghasilan_ayah'      => $request->penghasilan_ayah,
            'pendidikan_ayah'      => $request->pendidikan_ayah,
            'pekerjaan_ayah'      => $request->pekerjaan_ayah,
            'nama_ibu'      => $request->nama_ibu,
            'penghasilan_ibu'      => $request->penghasilan_ibu,
            'pendidikan_ibu'      => $request->pendidikan_ibu,
            'pekerjaan_ibu'      => $request->pekerjaan_ibu,
            'provinsi'      => $request->provinsi,
            'kabupaten'      => $request->kabupaten,
            'kecamatan'      => $request->kecamatan,
            'desa'      => $request->desa,
            'no_induk'      => $request->no_induk,
        ]);

        Alert::success('Berhasil.', 'Biodata di Updated');
        return redirect()->route('dashboard.index');
    }

    public function gantiPassword($user_id)
    {
        return view('profile.ganti_password');
    }

    public function updatePassword(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Berhasil.', 'Password di Ganti');
        return redirect()->route('dashboard.index');
    }
}
