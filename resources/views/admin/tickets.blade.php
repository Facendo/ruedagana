<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Manejo de Tickets</title>
</head>
<body>
    <section class="container">

        <div class="section_tickets">


            <div class="container_tickets">
                <h2 class="section_subtitle">Selecciona el ticket</h2>
                <form action="" method="post" class="form_tickets">
                    <div class="numeros_tickets">
                        @csrf
                            @php
                                $numeros_disponibles = json_decode($sorteo->numeros_disponibles);
                            @endphp
                        @foreach ($numeros_disponibles as $numero )
                            <form action="{{route('ticket.store')}}" method="POST" class="form">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id_sorteo" value="{{$sorteo->id_sorteo}}">
                                <input type="hidden" name="descripcion" value="{{$numero}}">
                                <input type="hidden" name="cedula_cliente" value="{{$cliente->cedula}}">
                                <input type="hidden" name="nombre_cliente" value="{{$cliente->nombre}}">
                                <input type="hidden" name="telefono_cliente" value="{{$cliente->telefono}}">
                                <input type="hidden" name="correo_cliente" value="{{$cliente->correo}}">
                                <input type="hidden" name="id_pago" value="{{$pago->id_pago}}">
                            <input type="submit" name="name" value="{{$numero}}" class="button">
                            </form>
                        @endforeach

                    </div>
                </form>
            </div>



            <div class="cont_tickets_selector">
               
            
            <!------------- BLOQUEAR TICKETS ------------>

            <h2 class="section_subtile">GESTIONA TICKETS</h2>

            <h3 class="sub_inp">Bloquear Numero</h3>
            <div class="cont_form">
                <form action="{{route('ticket.bloquear',$sorteo)}}" class="form" method="POST" enctype="multipart/form-data">
                    <h2>Bloquear Tickets</h2>
                    @csrf
                    @method('PUT')
                    
                    <input type="number" name="numero_a_bloquear" id="numero_a_bloquear" placeholder="Bloquear Numero" class="input_form" min="0" max="9999">

                    
                    <br>

                    <button type="submit" class="button">Bloquear Numero</button>
                </form>
            </div>

            <br><br><br><br><br><br><br><br><br><br>


            <!------------- DESBLOQUEAR CHECKLIST ------------>
            
            <div class="cont_form">
                <form action="{{route('ticket.desbloquear',$sorteo)}}" class="form" method="post">
                    @csrf
                    @method('PUT')
                    <h3 class="sub_inp">Desbloquear tickets</h3>
                    <select name="numero_a_desbloquear" id="numero_a_desbloquear" class="input_select">
                            @php
                                $numeros_ganadores = json_decode($sorteo->numeros_ganadores);
                            @endphp
                            @if ($numeros_ganadores != null)
                                @foreach($numeros_ganadores as $numero)
                            <option value="{{$numero}}" class="input_option">{{$numero}}</option>
                            @endforeach
                            @endif
                        <option value="" class="input_option">No hay numeros ganadores</option>
                    </select>
                    <button type="submit" class="button">Desbloquear</button>
                </form>
            </div>
            
            <br><br><br><br><br><br><br><br><br><br>    


            <!--------- BOTTON PARA GENERACION ALEATORIA ------->

            
            <div class="cont_form">
                <form action="#" class="form">
                    <h3 class="sub_inp">Generar tickets aleatorios</h3>
                    <button class="button">Generar</button>
                </form>
            </div>



            </div>




        </div>


    </section>
    
</body>
</html>