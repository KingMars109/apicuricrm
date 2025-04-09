<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuscripcionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_suscripcion' => $this->id_suscripcion,
            'nombre_plan' => $this->nombre_plan,
            'costo_mensual' => $this->costo_mensual,
            'costo_bienvenida' => $this->costo_bienvenida,
            'beneficios' => $this->beneficios,
            'promocion' => $this->promocion,
            'pagos' => PagoResource::collection($this->whenLoaded('pagos')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
