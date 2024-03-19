<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    public function __construct()
    {
        User::insert([
            'name' => 'CARRASCO GONZAGA MARCOS KLENDER',
            'email' => 'marcosklender@gmail.com',
            'username' => '2300679244',
            'phone' => '0980199488',
            'location' => 'CPE SANTO DOMINGO',
            'role' => 1,
            'password' => Hash::make('2300679244'),
        ]);
    }

    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'phone' => $row['phone'],
            'location' => $row['location'],
            'password' => Hash::make($row['username']),
        ]);
    }
}
