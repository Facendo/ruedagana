<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Sorteo;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    
    public function index(int $id_pago)
    {   $pago = Pago::find($id_pago);
        $cliente = Cliente::find($pago->cedula_cliente);
        $tickets = Ticket::all();
        $sorteo= Sorteo::find($pago->id_sorteo);
        return view('admin.tickets', compact('sorteo', 'tickets','cliente', 'pago'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show()
    {
        $tickets = Ticket::all();
        return view('admin.showticket', compact('tickets'));
    }
    
    public function showticket(Request $request)
    {
    $ticket = Ticket::whereJsonContains('numeros_seleccionados', $request->numero)->first();

    if ($ticket) {
        return view('admin.ticket', compact('ticket'));
    } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $sorteo = Sorteo::find($request->id_sorteo);
        $admin = User::all();
        $pago = Pago::find($request->id_pago);
        $cliente = Cliente::find($pago->cedula_cliente);
        
        if($request->numeros_seleccionados == "aleatorio"){ 
            $numerosSeleccionados = [];
            $cantidad_a_seleccionar = $pago->cantidad_de_tickets;
            $numerosDisponibles = json_decode($sorteo->numeros_disponibles, true);
            $indicesSeleccionados = array_rand($numerosDisponibles, $cantidad_a_seleccionar);
            foreach ($indicesSeleccionados as $indice) {
                $numerosSeleccionados[] = $numerosDisponibles[$indice];
            }

            // Asegurarse de que $numerosSeleccionados sea siempre un array
            if (!is_array($numerosSeleccionados)) {
                $numerosSeleccionados = [$numerosSeleccionados];
            }
        }

        //Condicional si los numeros fueron seleccionados
        else{
            $numerosSeleccionados = json_decode($request->numeros_seleccionados, true);
            $numerosDisponibles = json_decode($sorteo->numeros_disponibles, true);

        }
        $pago->estado_pago = 'Confirmado';
        $pago->save();

        $ticket = new Ticket();
        $ticket->cedula_cliente = $request->cedula_cliente;
        $ticket->id_sorteo = $request->id_sorteo;
        $ticket->nombre_sorteo = $sorteo->sorteo_nombre;
        $ticket->ticket_token = $this->buildtoken();
        $ticket->nombre_cliente = $request->nombre_cliente;
        $ticket->telefono_cliente = $request->telefono_cliente;
        $ticket->ticket_descripcion = "Ticket de la rifa " . $sorteo->sorteo_nombre;
        $ticket->numeros_seleccionados = json_encode($numerosSeleccionados);

        foreach ($numerosSeleccionados as $numero) {
            $indiceEncontrado = array_search($numero, $numerosDisponibles);
            if ($indiceEncontrado !== false) {
                unset($numerosDisponibles[$indiceEncontrado]);
            }
        }
        $sorteo->numeros_disponibles = json_encode($numerosDisponibles);
        $ticket->created_at = now();
        $ticket->updated_at = now();
        $sorteo->save();
        $ticket->save();
    
        $correo = new \App\Mail\mailCreated($ticket);
        Mail::to($cliente->correo)->send($correo);
        
        return redirect()->route('pago.index')->with('success', 'Ticket created successfully.');
        
    }



    public function showticket(Request $request)
    {
    $ticket = Ticket::whereJsonContains('numeros_seleccionados', $request->numero)->first();

    if ($ticket) {
        return view('admin.ticket', compact('ticket'));
    } 
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
        $numerosDisponibles = json_decode($sorteo->numeros_disponibles, true);
        $numerosGanadores = json_decode($sorteo->numeros_ganadores, true);

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
        $numerosDisponibles = json_decode($sorteo->numeros_disponibles,true);
        $numerosGanadores = json_decode($sorteo->numeros_ganadores,true);

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

