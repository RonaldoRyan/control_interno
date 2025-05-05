<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jonh Doe',
            'email' => 'jonhdoe@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('jonhdoe25'),
            'remember_token' => Str::random(10),

        ])->assignRole('webAdmi');

        User::create([
            'name' => 'Carolina Perez',
            'email' => 'caroperez@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('caroperez25'),
            'remember_token' => Str::random(10),

        ])->assignRole('profesor');
    }
}
