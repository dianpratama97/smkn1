<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use PDF;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_show', ['only' => ['index']]);
        $this->middleware('permission:user_detail', ['only' => ['show']]);
        $this->middleware('permission:user_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user_delete', ['only' => ['delete']]);
    }


    public function index(Request $request, User $user)
    {

        return view('user_management.users.index', [
            'data' => User::get(),
            'roles' => Role::get()
        ]);
    }

    public function import(Request $request)
    {
        $data = new User;
        $data = $request->file('file')->store('dataImportExcel');
        Excel::import(new UsersImport, $data);
        Alert::success('Berhasil.', 'File Berhasil di Upload.');
        return redirect()->route('users.index');
    }

    public function create()
    {
        return view('user_management.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'role' => 'required',
            'level' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }


        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'level' => $request->level,
            'status' => 99,
            'password' => Hash::make($request->password),
        ]);

        // dd($request);
        $user->assignRole($request->role);
        Alert::success('Berhasil.', 'User Berhasil di Buat.');
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        return view('user_management.users.edit', ['user' => $user, 'roleSelected' => $user->roles->first()]);
    }

    public function update(Request $request, User $user)
    {

        if ($request->kode == 1) {

            if ($request->role == 1) {
                $level = 'Super Admin';
            } elseif ($request->role == 2) {
                $level = 'Admin';
            } elseif ($request->role == 3) {
                $level = 'Editor';
            } elseif ($request->role == 4) {
                $level = 'Guru';
            } elseif ($request->role == 5) {
                $level = 'Siswa';
            } else {
                $level = 'Umum';
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'status_role' =>  $request->status_role,
                'level' =>  $level,
            ]);


            $user->syncRoles($request->role);
            Alert::success('Berhasil.', 'User Berhasil di Update.');
            return redirect()->route('users.index');
        } else {

            if ($request->role == 1) {
                $level = 'Super Admin';
            } elseif ($request->role == 2) {
                $level = 'Admin';
            } elseif ($request->role == 3) {
                $level = 'Editor';
            } elseif ($request->role == 4) {
                $level = 'Guru';
            } elseif ($request->role == 5) {
                $level = 'Siswa';
            } else {
                $level = 'Umum';
            }

            if ($request->password) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_induk' => $request->no_induk,
                    'level' =>  $level,
                    'password' => Hash::make($request->password)
                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_induk' => $request->no_induk,
                'level' =>  $level,
            ]);


            $user->syncRoles($request->role);
            Alert::success('Berhasil.', 'User Berhasil di Update.');
            return redirect()->route('users.index');
        }
    }

    public function destroy(User $user)
    {
        $user->removeRole($user->roles->first());
        $user->delete();
        Alert::success('Berhasil.', 'User Berhasil di Hapus.');
        return redirect()->route('users.index');
    }

    public function kartu($user_id)
    {
        $setting = Setting::first();
        $pdf = PDF::loadView('profile.kartuPelajar', compact('setting'))->setPaper('A4', 'potrait');
        return $pdf->stream('data.pdf');
    }
}
