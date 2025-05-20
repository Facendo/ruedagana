<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <title>Panel de tickets</title>
</head>
<body>
    
        <br>
        <section id="compra" class="container container_compra">
        <div class="cont_form cont_form_compra">
            
            <form action="{{route('admin.ticket')}}" method="GET" class="form" >
            <label>
            Buscar numero
            </label>
            <input type="text" class="input_form" id="numero" name="numero">
            <button class="button btn_modal" type="submit">Buscar numero</button>
            </form>
        </div>
        </section>
    

    <div id="section_ventas_admin" class="container">
        <h2 class="section_subtitle">TABLA DE TICKETS CREADOS</h2>
        <div class="container_table">
            <table id="table_gestion" class="table_gestion">
                <thead>
                    <tr>
                        <th>ID Ticket</th>
                        <th>Token de Ticket</th>
                        <th>Cedula del Cliente</th>
                        <th>Nombre del Cliente</th>
                        <th>Telefono Cliente</th>
                        <th>Numeros Comprados</th>
                        <th>Nombre de Sorteo</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id_ticket}}</td>
                        <td>{{ $ticket->ticket_token}}</td>
                        <td>{{ $ticket->cedula_cliente}}</td>
                        <td>{{ $ticket->nombre_cliente}}</td>
                        <td>{{ $ticket->telefono_cliente}}</td>
                        @php
                            $numeros_comprados = json_decode($ticket->numeros_seleccionados, true);
                            $numeros_comprados = implode("-", $numeros_comprados);
                        @endphp
                        <td>{{ $numeros_comprados}}</td>
                        <td>{{ $ticket->nombre_sorteo}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



<br><br><br><br>
        
</body>
</html>