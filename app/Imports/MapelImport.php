<?php

namespace App\Imports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapelImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Mapel([
            'kode'     => $row['kode'],
            'name'    => $row['name'],
        ]);
    }
}
