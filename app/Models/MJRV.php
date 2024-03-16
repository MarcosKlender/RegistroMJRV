<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MJRV extends Model
{
    use HasFactory;

    protected $fillable = [
        'asistencia',
        'provincia',
        'canton',
        'parroquia',
        'zona',
        'recinto',
        'institucion',
        'junta',
        'sexo',
        'cedula',
        'nombre',
        'correo',
        'celular',
        'coordinador_cedula',
        'coordinador_nombre',
        'coordinador_celular',
    ];
}