<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO users (id, nama_lengkap, username, email, password, status_pengguna, role) VALUES
        (1, 'Admin', 'admin', 'admin@gmail.com', '". bcrypt("admin") ."', 'Aktif', 'Admin'),
        (2, 'User Test', 'usertest', 'usertest@gmail.com', '". bcrypt("pengguna") . "', 'Aktif', 'User'),
        (3, 'Zidan Ibrahim', 'zidan', 'zidan@gmail.com', '". bcrypt("pengguna") ."', 'Aktif', 'User');
        ");
    }
}
