<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DatasiswaSeeder;
use Database\Seeders\DataguruSeeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DatasiswaSeeder::class);
        $this->call(DataguruSeeder::class);
        // User::factory(10)->create();

        User::factory(5)->create();
    }
}
