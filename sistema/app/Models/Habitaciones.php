<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Habitaciones extends Model
{
    protected $table = 'habitaciones';

    protected $primaryKey = 'id_habitacion';

    protected $fillable = [
        'numero_habi',
        'capacidad',
        'tarifa_noche',
        'imagen',
        'id_estado',
        'id_hotel',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'id_hotel', 'id_hotel');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoHabi::class, 'id_estado', 'id_estado');
    }
}
