<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atraccion extends Model
{
    protected $primaryKey = 'id_atraccion';
     protected $table = 'atracciones';

    protected $fillable = [
        'id_destino',
        'nom_atr',
        'desc_atr',
    ];

    public function destino(): BelongsTo
    {
        return $this->belongsTo(Destino::class, 'id_destino', 'id_destino');
    }
}
