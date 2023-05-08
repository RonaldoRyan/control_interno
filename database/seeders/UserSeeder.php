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
            'name' => 'Ronaldo Ryan Serrano',
            'email' => 'ronaldoryanrrs@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Ryan9718'),
            'remember_token' => Str::random(10),

        ])->assignRole('webAdmi');

        User::create([
            'name' => 'Paola Barrantes Ortega',
            'email' => 'pbo2498@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('mandy'),
            'remember_token' => Str::random(10),

        ])->assignRole('profesor');
    }
}
