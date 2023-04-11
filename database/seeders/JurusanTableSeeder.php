<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode' => 'MM',
                'name' => 'Multimedia',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'kode' => 'TKJ',
                'name' => 'Teknik Komputer Jaringan',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], [
                'kode' => 'PKM',
                'name' => 'Perbankan dan Keuangan Mikro',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'TBSM',
                'name' => 'Teknik Bisnis dan Sepeda Motor',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'DKV',
                'name' => 'Desain Komunikasi Visual',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'LP',
                'name' => 'Layanan Perbankan',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'TSM',
                'name' => 'Teknik Sepeda Motor',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'UMUM',
                'name' => 'UMUM',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode' => 'MAPEL',
                'name' => 'Guru Mapel',
                'bidang_keahlian' => '-',
                'bidang_umum' => '-',
                'bidang_khusus' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        DB::table('jurusan')->insert(
            $data
        );
    }
}
