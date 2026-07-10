<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'destino_servicio', 'id_destino', 'id_servicio')
            ->withTimestamps();
    }

    public function hoteles(): HasMany
    {
        return $this->hasMany(Hotel::class, 'id_destino', 'id_destino');
    }
}
