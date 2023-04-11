<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class AlumniImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Alumni([
            'nisn'     => $row['nisn'],
            'name'     => $row['name'],
            'gender'    => $row['gender'],
            'tempat_lahir'    => $row['tempat_lahir'],
            'tgl_lahir'    => $row['tgl_lahir'],
            'th_lulus'    => $row['th_lulus'],
            'jurusan'    => $row['jurusan'],
            'status_kuliah' =>  $row['status_kuliah'],
            'tempat_kuliah' =>  $row['tempat_kuliah'],
            'status_kerja' =>  $row['status_kerja'],
            'tempat_kerja' =>  $row['tempat_kerja'],
            'alamat'    => $row['alamat'],
        ]);
    }
}
