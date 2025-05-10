<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    
    public function store(Request $request)
    {
        $pago = new Pago();
        $pago->id_ticket = $request->id_ticket;
        $pago->referencia = $request->referencia;
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->metodo_de_pago = $request->metodo_de_pago;
        $pago->estado_pago = $request->estado_pago;
        $pago->dir_imagen_comprobante = $request->dir_imagen_comprobante;
        $pago->save();
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    
    public function destroy(Pago $pago)
    {
        //Eliminar el pago
        $pago->delete();
    }
}
