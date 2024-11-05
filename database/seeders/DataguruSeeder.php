<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DataguruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        DB::table('datagurus')->insert([
            [
                'nip' => '196405121990011001',
                'nama' => 'Wawan Surawan',
                'pendidikan' => 'S1',
                'jabatan' => 'Kepala Sekolah',
            ],
        ]);
    }
}
