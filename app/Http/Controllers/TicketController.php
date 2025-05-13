<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Sorteo;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    
    public function index(string $cedula)
    {   
        $cliente = Cliente::find($cedula);
        $tickets = Ticket::all();
        $sorteo= Sorteo::find($cliente->id_sorteo);
        return view('admin.tickets', compact('sorteo', 'tickets','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Vista para crear un nuevo ticket
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $sorteo = Sorteo::find($request->id_sorteo);
        $admin = User::all();
        $ticket = new Ticket();
        $ticket->cedula_cliente = $request->cedula_cliente;
        $ticket->id_sorteo = $request->id_sorteo;
        $ticket->nombre_sorteo = $sorteo->sorteo_nombre;
        $ticket->ticket_token = $this->buildtoken();
        $ticket->nombre_cliente = $request->nombre_cliente;
        $ticket->telefono_cliente = $request->telefono_cliente;
        $ticket->ticket_descripcion = $request->descripcion;
        $ticket->created_at = now();
        $ticket->updated_at = now();
        $ticket->save();

        Mail::to($ticket->correo_cliente);
        foreach ($admin as $user) {
            Mail::to($user->email);
        }
        return redirect()->route('pago.index')->with('success', 'Ticket created successfully.');
    }

    private function buildtoken($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //Vista para editar un ticket
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->id_sorteo = $request->id_sorteo;
        $ticket->ticket_token = $request->ticket_token;
        $ticket->nombre_cliente = $request->nombre_cliente;
        $ticket->telefono_cliente = $request->telefono_cliente;
        $ticket->correo_cliente = $request->correo_cliente;
        $ticket->descripcion = $request->descripcion;
        $ticket->confirmacion_de_pago = $request->confirmacion_de_pago;
        $ticket->created_at = now();
        $ticket->updated_at = now();
        $ticket->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.index')->with('success', 'Ticket deleted successfully.');
    }

    public function bloquear(Request $request, Sorteo $sorteo)
    {   

        $valorABloquear = $request->numero_a_bloquear;
        $numerosDisponibles = json_decode($sorteo->numeros_disponibles);
        $numerosGanadores = json_decode($sorteo->numeros_ganadores);

        $indiceEncontrado = array_search($valorABloquear, $numerosDisponibles);

        if ($indiceEncontrado !== false) {
            $numerosGanadores[] = $valorABloquear;
            unset($numerosDisponibles[$indiceEncontrado]);
            $nuevosNumerosDisponibles = array_values($numerosDisponibles); // Reindexar

            $sorteo->numeros_disponibles = json_encode($nuevosNumerosDisponibles);
            $sorteo->numeros_ganadores = json_encode(array_values($numerosGanadores));
            $sorteo->save();

            return redirect()->route('pago.index');
        } else {
            return redirect()->route('pago.index');
        }

    }

    public function desbloquear(Request $request, Sorteo $sorteo)
    {   
       
        $valorADesbloquear = $request->numero_a_desbloquear;
        $numerosDisponibles = json_decode($sorteo->numeros_disponibles);
        $numerosGanadores = json_decode($sorteo->numeros_ganadores);

        $indiceEncontradoEnGanadores = array_search($valorADesbloquear, $numerosGanadores);

        if ($indiceEncontradoEnGanadores !== false) {
            $numerosDisponibles[] = $valorADesbloquear;
            unset($numerosGanadores[$indiceEncontradoEnGanadores]);
            $nuevosNumerosGanadores = array_values($numerosGanadores); // Reindexar
            sort($numerosDisponibles); // Ordenar los números disponibles
            $sorteo->numeros_disponibles = json_encode(array_values($numerosDisponibles));
            $sorteo->numeros_ganadores = json_encode($nuevosNumerosGanadores);
            $sorteo->save();

            return redirect()->route('pago.index');
        } else {
            return redirect()->route('pago.index');
        }
    }
    
}

