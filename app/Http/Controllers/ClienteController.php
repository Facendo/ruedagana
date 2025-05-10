<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
   
    
    public function store(Request $request)
    {   
        if(Cliente::where('cedula', $request->cedula)->exists()){
            $clienteregistrado = Cliente::where('cedula', $request->cedula)->first();
            $clienteregistrado->cantidad_comprados+=$request->cantidad_de_tickets;
            $clienteregistrado->fecha_de_pago = $request->fecha_de_pago;
            $clienteregistrado->save();
            
        }
        else{
        $cliente = new Cliente();
        
        $cliente->cedula = $request->cedula;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->cantidad_comprados = 0;
        $cliente->cantidad_comprados+= $request->cantidad_de_tickets;
        $cliente->fecha_de_pago = $request->fecha_de_pago; 
        $cliente->save();
        }
        $pago = new Pago();
        $pago->cedula_cliente = $request->cedula;
        $pago->referencia = $request->referencia;
        $pago->monto = $request->monto;
        $pago->cantidad_de_tickets = $request->cantidad_de_tickets;
        $pago->descripcion = $request->descripcion;
        $pago->fecha_pago = $request->fecha_de_pago;
        $pago->metodo_de_pago = $request->metodo_de_pago;
        $pago->estado_pago = "pendiente";
        $img = $request->file('imagen_comprobante');
        $img->move(public_path('img/comprobantes'), 'comprobante_'.$request->referencia);
        $pago->dir_imagen_comprobante = $request->imagen_comprobante;
        $pago->created_at = now();
        $pago->updated_at = now();
        $pago->save();
        return redirect()->route('cliente.index')->with('success', 'Cliente registrado exitosamente.');
    }

   
}
