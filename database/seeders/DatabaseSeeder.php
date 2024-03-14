<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'CARRASCO GONZAGA MARCOS KLENDER',
            'email' => 'marcosklender@gmail.com',
            'username' => '2300679244',
            'role' => 1,
            'password' => Hash::make('2300679244'),
        ]);
    }
}
