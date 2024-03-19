<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'CARRASCO GONZAGA MARCOS KLENDER',
            'email' => 'marcoscarrasco@cne.gob.ec',
            'username' => '2300679244',
            'phone' => '0980199488',
            'location' => 'CPE SANTO DOMINGO',
            'role' => 1,
            'password' => Hash::make('2300679244'),
        ]);
    }
}
