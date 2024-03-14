<?php

namespace App\Imports;

use App\Models\MJRV;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MJRVImport implements ToModel, WithHeadingRow
{
    public function __construct()
    {
        MJRV::truncate();
    }

    public function model(array $row)
    {
        return new MJRV([
            'provincia' => $row['provincia'],
            'canton' => $row['canton'],
            'parroquia' => $row['parroquia'],
            'zona' => $row['zona'],
            'recinto' => $row['recinto'],
            'institucion' => $row['institucion'],
            'junta' => $row['junta'],
            'sexo' => $row['sexo'],
            'cedula' => $row['cedula'],
            'nombre' => $row['nombre'],
            'correo' => $row['correo'],
            'celular' => $row['celular'],
        ]);
    }
}
