<?php

namespace App\Imports;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {

        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'username'    => $row['username'],
            'kelas'    => $row['kelas'],
            'jurusan'    => $row['jurusan'],
            'password' => Hash::make($row['password']),
            'status' =>  $row['status'],
            'level' =>  $row['level'],
            'status_role' =>  $row['status_role'],
        ]);
    }
}
