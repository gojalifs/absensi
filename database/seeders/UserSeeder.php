<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "full_name" => "Admin Fullname",
            "email" => "admin@gmail.com",
            "alamat" => "Cikarang",
            "no_hp" => "08232437",            
            "password" => Hash::make("password"),
            "role" => "ADMIN"
        ]);

        User::create([
            "name" => "Fajar",
            "full_name" => "Fajar Sidik Prasetio",
            "email" => "fajar@gmail.com",
            "alamat" => "Cikarang",
            "no_hp" => "08232437",
            "password" => Hash::make("password"),
            "role" => "USER"
        ]);
    }
}
