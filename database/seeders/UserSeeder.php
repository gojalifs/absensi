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
            "password" => Hash::make("password"),
            "role" => "ADMIN"
        ]);

        User::create([
            "name" => "Fajar",
            "full_name" => "Fajar Sidik Prasetio",
            "email" => "fajar@gmail.com",
            "password" => Hash::make("password"),
            "role" => "USER"
        ]);
    }
}
