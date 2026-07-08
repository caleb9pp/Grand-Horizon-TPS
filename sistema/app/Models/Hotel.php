<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
