<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // PENTING: UNTUK MENGHINDARI ERROR FOREIGN KEY

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // PENTING: Nonaktifkan cek foreign key sementara agar tidak error saat mengosongkan tabel
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        User::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        // WARGA
        User::create([
            'nik'   => '3214051234560001', // Sesuaikan kolom yang ada di database
            'agama' => 'Islam',             // Sesuaikan kolom yang ada di database
            'name'  => 'Warga Satu',
            'email' => 'warga@desa.com',
            'password' => Hash::make('password'), 
            'role'  => 'warga',
        ]);

        // STAFF
        User::create([
            'nik'   => '3214051234560002',
            'agama' => 'Islam',
            'name'  => 'Staff Desa',
            'email' => 'staff@desa.com',
            'password' => Hash::make('password'), 
            'role'  => 'staff',
        ]);

        // KADES
        User::create([
            'nik'   => '3214051234560003',
            'agama' => 'Islam',
            'name'  => 'Kepala Desa',
            'email' => 'kades@desa.com',
            'password' => Hash::make('password'), 
            'role'  => 'kades',
        ]);
    }
}