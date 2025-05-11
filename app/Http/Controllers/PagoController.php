<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Premio;
use App\Models\Sorteo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premios= Premio::all();
        $pagos = Pago::all();
        $sorteos = Sorteo::all();
        return view('admin.admin',compact('pagos','premios','sorteos'));
    }

    
    public function destroy(string $referencia)
    {   $pago = Pago::find($referencia);
        $pago->delete();
        return redirect()->route('pago.index')->with('success', 'Pago eliminado exitosamente');
    }
}
