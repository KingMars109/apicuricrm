<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contacto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_contacto';
    protected $fillable = [
        'id_cliente',
        'tipo_contacto',
        'detalle'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
