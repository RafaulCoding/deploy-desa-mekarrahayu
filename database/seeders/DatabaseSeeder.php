<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // PANGGIL USER SEEDER YANG SUDAH KITA PERBAIKI
        $this->call([
            UserSeeder::class,
        ]);
    }
}