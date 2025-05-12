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
                <form action="#" method="post" class="form_tickets">
                    <div class="numeros_tickets">

                        @for ($i = 0; $i < 1000; $i++)
                            <input type="submit" name="name" value="{{$i}}" class="button">
                        
                        @endfor

                    </div>
                </form>
            </div>



            <div class="cont_tickets_selector">
               
            
            <!------------- BLOQUEAR TICKETS ------------>

            <h2 class="section_subtile">GESTIONA TICKETS</h2>

            <h3>Bloquear Numero</h3>
            <div class="cont_form">
                <form action="{{route('ticket.bloquear',$sorteo)}}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <input type="number" name="numero_a_bloquear" id="numero_a_bloquear" placeholder="Bloquear Numero" class="input_form" min="0" max="9999">

                    
                    <br>

                    <button type="submit" class="button">Bloquear Numero</button>
                </form>
            </div>

            <br><br><br><br><br><br><br><br><br><br>


            <!------------- DESBLOQUEAR CHECKLIST ------------>
            <h3>Desbloquear tickets</h3>
            <div class="cont_form">
                <form action="{{route('ticket.desbloquear',$sorteo)}}" class="form" method="post">
                    <select name="desbloquear" id="desbloq" class="input_form">
                        <option value="0">0</option>
                    </select>
                    <button type="submit" class="button">Desbloquear</button>
                </form>
            </div>
            
            <br><br><br><br><br><br><br><br><br><br>    


            <!--------- BOTTON PARA GENERACION ALEATORIA ------->

            <h3>Generar tickets aleatorios</h3>
            <div class="cont_form">
                <form action="#" class="form">
                    <button class="button">Generar</button>
                </form>
            </div>



            </div>




        </div>


    </section>
    
</body>
</html>