<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $primaryKey = 'id_servicio';

    protected $fillable = [
        'nom_servicio',
        'descripcion',
    ];

    public function hoteles(): BelongsToMany
    {
        return $this->belongsToMany(Hotel::class, 'hotel_servicio', 'id_servicio', 'id_hotel')
            ->withTimestamps();
    }

    public function destinos(): BelongsToMany
    {
        return $this->belongsToMany(Destino::class, 'destino_servicio', 'id_servicio', 'id_destino')
            ->withTimestamps();
    }

    public function habitaciones(): BelongsToMany
    {
        return $this->belongsToMany(Habitaciones::class, 'habitacion_servicio', 'id_servicio', 'id_habitacion')
            ->withTimestamps();
    }
}
