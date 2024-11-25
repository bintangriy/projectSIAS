<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsinilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nilais')->insert([
            [
                'nis' => '2103702',
                'ppkn' => 88,
                'b_indo' => 82,
                'agama' => 90,
                'mtk' => 84,
                'ipa' => 84,
                'ips' => 84,
                'b_inggris' => 86,
                'rata_rata' => 85.1,
            ],

            [
                'nis' => '2103706',
                'ppkn' => 88,
                'b_indo' => 82,
                'agama' => 90,
                'mtk' => 84,
                'ipa' => 84,
                'ips' => 84,
                'b_inggris' => 86,
                'rata_rata' => 85.1,
            ],


            // Tambahkan data lainnya
        ]);
    }
}
