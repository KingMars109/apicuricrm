<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuscripcionResource;
use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function index()
    {
        return SuscripcionResource::collection(Suscripcion::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_plan' => 'required|string|max:50',
            'costo_mensual' => 'required|numeric',
            'costo_bienvenida' => 'required|numeric',
            'beneficios' => 'required|string',
            'promocion' => 'nullable|string|max:100'
        ]);

        $suscripcion = Suscripcion::create($validated);
        return new SuscripcionResource($suscripcion);
    }

    public function show($id)
    {
        $suscripcion = Suscripcion::find($id);
        
        if (!$suscripcion) {
            return response()->json([
                'success' => false,
                'message' => 'Suscripción no encontrada'
            ], 404);
        }

        return new SuscripcionResource($suscripcion);
    }

    public function update(Request $request, Suscripcion $suscripcion)
    {
        $validated = $request->validate([
            'nombre_plan' => 'string|max:50',
            'costo_mensual' => 'numeric',
            'costo_bienvenida' => 'numeric',
            'beneficios' => 'string',
            'promocion' => 'nullable|string|max:100'
        ]);

        $suscripcion->update($validated);
        return new SuscripcionResource($suscripcion);
    }

    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return response()->noContent();
    }
}
