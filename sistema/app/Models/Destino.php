<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destino extends Model
{
    protected $primaryKey = 'id_destino';

    protected $fillable = [
        'nom_des',
        'desc_des',
        'ubicacion',
        'imagen_des',
    ];

    public function atracciones(): HasMany
    {
        return $this->hasMany(Atraccion::class, 'id_destino', 'id_destino');
    }
}
