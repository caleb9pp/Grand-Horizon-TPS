<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'categoria',
    ];

    public function habitaciones(): HasMany
    {
        return $this->hasMany(Habitaciones::class, 'id_categoria', 'id_categoria');
    }
}
