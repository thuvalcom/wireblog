<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'vhalone',
            'email' => 'caramendapatkanduit@gmail.com',
            'password' => Hash::make('g3n3r451b1ru'),
            // tambahkan field lainnya jika ada
        ]);

        // Anda bisa menambahkan lebih banyak user atau menggunakan loop jika diperlukan
    }
}
