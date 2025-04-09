<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactoResource;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return ContactoResource::collection(Contacto::with('cliente')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'tipo_contacto' => 'required|string|max:50',
            'detalle' => 'required|string'
        ]);

        $contacto = Contacto::create($validated);
        return new ContactoResource($contacto->load('cliente'));
    }

    public function show($id)
    {
        $contacto = Contacto::with('cliente')->find($id);
        
        if (!$contacto) {
            return response()->json([
                'success' => false,
                'message' => 'Contacto no encontrado'
            ], 404);
        }

        return new ContactoResource($contacto);
    }

    public function update(Request $request, Contacto $contacto)
    {
        $validated = $request->validate([
            'id_cliente' => 'exists:clientes,id_cliente',
            'tipo_contacto' => 'string|max:50',
            'detalle' => 'string'
        ]);

        $contacto->update($validated);
        return new ContactoResource($contacto->load('cliente'));
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return response()->noContent();
    }
}
