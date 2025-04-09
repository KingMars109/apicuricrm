<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pago';
    protected $fillable = [
        'id_cliente',
        'id_suscripcion',
        'fecha_pago',
        'monto'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function suscripcion(): BelongsTo
    {
        return $this->belongsTo(Suscripcion::class, 'id_suscripcion');
    }
}
