<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return ClienteResource::collection(Cliente::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:100',
            'telefono' => 'required|string|max:20',
            'tipo_cliente' => 'required|string|max:50'
        ]);

        $cliente = Cliente::create($validated);
        return new ClienteResource($cliente);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        
        if (!$cliente) {
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado'
            ], 404);
        }

        return new ClienteResource($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:100',
            'correo' => 'email|max:100',
            'telefono' => 'string|max:20',
            'tipo_cliente' => 'string|max:50'
        ]);

        $cliente->update($validated);
        return new ClienteResource($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->noContent();
    }
}
