<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Sorteo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File\UploadedFile;
use Illuminate\Http\UploadedFile as HttpUploadedFile;

class ClienteController extends Controller
{
    public function index(int $id_sorteo)
    {
        $sorteo= Sorteo::find($id_sorteo);
        return view('compra', compact('sorteo'));
    }
    
    public function store(Request $request)
    {   
       
        if(Cliente::where('cedula', $request->cedula)->exists()){
            $clienteregistrado = Cliente::where('cedula', $request->cedula)->first();
            $clienteregistrado->cantidad_comprados+=$request->cantidad_de_tickets;
            $clienteregistrado->fecha_de_pago = $request->fecha_de_pago;
            $clienteregistrado->save();
            $clienteregistrado->id_sorteo = $request->id_sorteo;
            
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
        $cliente->id_sorteo = $request->id_sorteo;
        $cliente->save();
        
        }
        $pago = new Pago();
        $pago->cedula_cliente = $request->cedula;
        $pago->referencia = $request->referencia;
        $pago->id_sorteo = $request->id_sorteo;
        $pago->monto = $request->monto;
        $pago->cantidad_de_tickets = $request->cantidad_de_tickets;
        $pago->descripcion = $request->descripcion;
        $pago->fecha_pago = $request->fecha_de_pago;
        $pago->metodo_de_pago = $request->metodo_de_pago;
        $pago->estado_pago = "pendiente";
       if ($request->hasFile('imagen_comprobante')) {
            $image = $request->file('imagen_comprobante');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('comprobantes', $filename, 'public'); // Guarda con el nombre original
            $pago->imagen_comprobante = 'sorteo/' . $filename; // Guarda la ruta con el nombre original
        }
        $pago->descripcion = " Pago de " . $request->cantidad_de_tickets . " tickets". " En la fecha " . $request->fecha_de_pago;
        $pago->save();
        return redirect()->route('sorteo.index');
    }

   
}
