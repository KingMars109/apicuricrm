<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre', 'correo', 'telefono', 'tipo_cliente'];

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'id_cliente');
    }

    public function contactos(): HasMany
    {
        return $this->hasMany(Contacto::class, 'id_cliente');
    }
}
