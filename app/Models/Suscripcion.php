<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suscripcion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_suscripcion';
    protected $fillable = [
        'nombre_plan', 
        'costo_mensual',
        'costo_bienvenida',
        'beneficios',
        'promocion'
    ];

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'id_suscripcion');
    }
}
