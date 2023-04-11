<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'text_pembuka' => '-',
                'foto_kepsek' => '-',
                'nama_kepsek' => '-',
                'nip' => '-',
                'kata_sambutan' => '-',
                'status_kelulusan' => 0,
                'no_telp' => '-',
                'email' => '-',
                'alamat' => '-',
                'fb' => '-',
                'yt' => '-',
                'cap' => '-',
                'ttd' => '-',
                'link_1' => '-',
                'link_2' => '-',
                'link_3' => '-',
                'link_4' => '-',
                'visi' => '-',
                'misi' => '-',
            ]
        ];
        DB::table('settings')->insert(
            $data
        );
    }
}
