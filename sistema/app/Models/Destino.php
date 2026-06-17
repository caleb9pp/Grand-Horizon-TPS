<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $primaryKey = 'id_destino';

    protected $fillable = [
        'nom_des',
        'desc_des',
        'ubicacion',
        'imagen_des',
    ];
}
