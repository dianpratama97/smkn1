<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_show', ['only' => ['index']]);
        $this->middleware('permission:role_detail', ['only' => ['show']]);
        $this->middleware('permission:role_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role_update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role_delete', ['only' => ['delete']]);
    }
    public function index()
    {

        return view('user_management.role.index', [
            'roles' => Role::all()
        ]);
    }

    public function select(Request $request)
    {
        $roles = Role::select('id', 'name')->limit(10);
        if ($request->has('q')) {
            $roles->where('name', 'LIKE', "%{$request->q}%");
        }
        return response()->json($roles->get());
    }

    public function create()
    {
        return view('user_management.role.create', [
            'authorities'  => config('permission.authorities'),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:25|unique:roles,name',
            'permissions' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permissions);

            Alert::success('Berhasil.', 'Data Ditambahkan.');
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function show(Role $role)
    {
        return view('user_management.role.detail', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    public function edit(Role $role)
    {
        return view('user_management.role.edit', [
            'role' => $role,
            'authorities'  => config('permission.authorities'),
            'permissionChecked'  => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:25|unique:roles,name,' . $role->id,
            'permissions' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);

            $role->save();

            Alert::success('Berhasil.', 'Data Di Edit.');
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {

            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());

            $role->delete();

            Alert::success('Berhasil.', 'Data Di Hapus.');
        } catch (\Throwable $th) {
            Alert::error('Gagal!', 'Gagal.' . $th->getMessage());
        } finally {
            DB::commit();
        }
        return redirect()->route('roles.index');
    }
}
