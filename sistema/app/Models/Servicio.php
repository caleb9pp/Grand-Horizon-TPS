<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $primaryKey = 'id_servicio';

    protected $fillable = [
        'nom_servicio',
        'descripcion',
    ];
}
