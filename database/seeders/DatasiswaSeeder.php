<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        DB::table('datasiswas')->insert([
            [
                'nis' => '2107031',
                'nama' => 'Bintang Rizqika',
                'alamat' => 'Klaten',
                'jenis_kelamin' => 'Laki-Laki',
            ],
        ]);
    }
}
