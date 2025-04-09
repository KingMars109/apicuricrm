<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_contacto' => $this->id_contacto,
            'cliente' => new ClienteResource($this->whenLoaded('cliente')),
            'tipo_contacto' => $this->tipo_contacto,
            'detalle' => $this->detalle,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
