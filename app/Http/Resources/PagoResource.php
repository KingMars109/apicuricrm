<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_pago' => $this->id_pago,
            'cliente' => new ClienteResource($this->whenLoaded('cliente')),
            'suscripcion' => new SuscripcionResource($this->whenLoaded('suscripcion')),
            'fecha_pago' => $this->fecha_pago,
            'monto' => $this->monto,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
