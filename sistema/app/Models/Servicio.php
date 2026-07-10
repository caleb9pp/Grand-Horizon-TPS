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
}
