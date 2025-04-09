<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_cliente' => $this->id_cliente,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'tipo_cliente' => $this->tipo_cliente,
            'pagos' => PagoResource::collection($this->whenLoaded('pagos')),
            'contactos' => ContactoResource::collection($this->whenLoaded('contactos')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
