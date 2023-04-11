<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities =  config('permission.authorities');

        $listPermissions = [];
        $superAdminPermissions = [];
        $adminPermissions = [];
        $editorPermissions = [];
        $guruPermissions = [];
        $siswaPermissions = [];

        foreach ($authorities as $lable => $permissions) {
            foreach ($permissions as $permission) {

                $listPermissions[] = [
                    'name' => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                // superAdmin
                $superAdminPermissions[] = $permission;

                // admin
                if (in_array($lable, [
                    'manage_posts',
                    'manage_kategori',
                    'manage_tags',
                ])) {
                    $adminPermissions[] = $permission;
                }

                // editorPermissions
                if (in_array($lable, [
                    'manage_posts',
                ])) {
                    $editorPermissions[] = $permission;
                }

                // guruPermissions
                if (in_array($lable, [
                    'manage_nilaiUts',
                    'manage_nilaiUas',
                ])) {
                    $guruPermissions[] = $permission;
                }

                // siswaPermissions
                if (in_array($lable, [
                    'manage_nilaiUts',
                    'manage_nilaiUas',
                ])) {
                    $siswaPermissions[] = $permission;
                }
            }
        }

        //insert
        Permission::insert($listPermissions);

        //insert roles
        $superAdmin = Role::create([
            'name' => "SuperAdmin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $admin = Role::create([
            'name' => "Admin",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $editor = Role::create([
            'name' => "Editor",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $guru = Role::create([
            'name' => "Guru",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $siswa = Role::create([
            'name' => "Siswa",
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //Role ->Permissions
        $superAdmin->givePermissionTo($superAdminPermissions);
        $admin->givePermissionTo($adminPermissions);
        $editor->givePermissionTo($editorPermissions);
        $guru->givePermissionTo($guruPermissions);
        $siswa->givePermissionTo($siswaPermissions);

        $userSuperAdmin = User::find(1)->assignRole('SuperAdmin');
    }
}
