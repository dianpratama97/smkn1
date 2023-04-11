<?php

namespace App\Imports;

use App\Models\Kelulusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelulusanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kelulusan([
            'nisn'     => $row['nisn'],
            'name'    => $row['name'],
            'kelas'     => $row['kelas'],
            'status'    => $row['status'],
        ]);
    }
}
