<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoHabi extends Model
{
    protected $table = 'estado_habi';

    protected $primaryKey = 'id_estado';

    protected $fillable = [
        'tipo_estado',
    ];

    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitaciones::class, 'id_estado', 'id_estado');
    }
}
