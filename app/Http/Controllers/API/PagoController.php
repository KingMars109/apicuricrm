<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PagoResource;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        return PagoResource::collection(Pago::with(['cliente', 'suscripcion'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_suscripcion' => 'required|exists:suscripcions,id_suscripcion',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric'
        ]);

        $pago = Pago::create($validated);
        return new PagoResource($pago->load(['cliente', 'suscripcion']));
    }

    public function show($id)
    {
        $pago = Pago::with(['cliente', 'suscripcion'])->find($id);
        
        if (!$pago) {
            return response()->json([
                'success' => false,
                'message' => 'Pago no encontrado'
            ], 404);
        }

        return new PagoResource($pago);
    }

    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'id_cliente' => 'exists:clientes,id_cliente',
            'id_suscripcion' => 'exists:suscripcions,id_suscripcion',
            'fecha_pago' => 'date',
            'monto' => 'numeric'
        ]);

        $pago->update($validated);
        return new PagoResource($pago->load(['cliente', 'suscripcion']));
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response()->noContent();
    }
}
