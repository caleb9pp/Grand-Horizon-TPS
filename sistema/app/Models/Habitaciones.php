<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'id_categoria',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'id_hotel', 'id_hotel');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoHabi::class, 'id_estado', 'id_estado');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'habitacion_servicio', 'id_habitacion', 'id_servicio')
            ->withTimestamps();
    }
}
