<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');

        User::create([
            'name' => 'cliente',
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('cliente'),
            'remember_token' => Str::random(10),
        ])->assignRole('cliente');

        User::create([
            'name' => 'locatario',
            'email' => 'locatario1@gmail.com',
            'password' => bcrypt('locatario'),
            'remember_token' => Str::random(10),
        ])->assignRole('locatario');
    }
}
