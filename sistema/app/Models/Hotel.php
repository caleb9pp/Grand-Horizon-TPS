<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    protected $primaryKey = 'id_hotel';

    protected $fillable = [
        'nom_hotel',
        'dir_hotel',
        'contacto',
        'politica',
        'imagen_hotel',
        'id_destino',
    ];

    public function destino(): BelongsTo
    {
        return $this->belongsTo(Destino::class, 'id_destino', 'id_destino');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'hotel_servicio', 'id_hotel', 'id_servicio')
            ->withTimestamps();
    }

    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitaciones::class, 'id_hotel', 'id_hotel');
    }
}
