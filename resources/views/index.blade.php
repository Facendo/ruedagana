<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Rueda y Gana || Inicio</title>
</head>





<!------------------ TODO EL CONTENIDO DE LA APP  --------------------->

<body>

<!------------------------- ENCABEZADO -------------------------------->
    
    <header id="header">
        
        <nav id="menu" class="menu">
                <h2 class="titulo">RUEDA Y GANA</h2>
        </nav>
        
    
        <div class="container container_header">
            <div class="container_info container">
                
                <div class="container_logo">

                    <img src="{{asset('img/logo_ruedaygana_sf.png')}}" class="img_logo" alt="imagenlogo">

                </div>
                
                <div class="containertext_presentacion">
                    <h1 class="text_presentacion">¡RUEDA Y GANA CON NOSOTROS!</h1>
                    <p class="text_center">Participa para ganar increibles premios cada semana, por tan solo 35bs</p>
                    <a href="{{route('compra')}}" class="button button_ini">Participar</a>
                </div>
            </div>
        </div>
    
    </header>
        



<!------------------------- SECCION DE PREMIOS ------------------------->
        
        
    <section id="premios" class="container">  

    <h2 class="section_subtitle">SORTEOS DISPONIBLES</h2>
    <div class="container">
        @if(count($sorteos) > 0)
            @foreach($sorteos as $sorteo)
                <div class="container_card">
                    <div class="card">
                        <figure>
                           @if($sorteo->sorteo_imagen)
                                <img src="{{ asset('storage/' . $sorteo->sorteo_imagen) }}" class="img_card" alt="imagen_premio">   
                            @else
                                <img src="{{ asset('img/default.webp') }}" alt="Imagen por defecto">
                            @endif
                        </figure>
                        <div class="contenido">
                            <h3 class="title_card">{{$sorteo->sorteo_nombre}}</h3>
                            <p class="text_card">{{$sorteo->sorteo_descripcion}}</p>
                            <a href="{{ route('compra', ['sorteo_id' => $sorteo->id]) }}" class="button">Participar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="message_alert message">
                <p>No hay sorteos disponibles en este momento.</p>
            </div>
        @endif
    </div>
</section>



<!------------------------- SECCION DE SORTEOS FINALIZADOS (COMENTADA) ------------------------->

<!-- <section id="finish">

       <h2 class="section_subtitle">Sorteos finalizados</h2>

            <div class="container">

                <div class="container_card">

                    <div class="card">
                        <figure>
                            <img src="{{asset('img/moto.webp')}}" alt="img_premio" class="img_card">
                        </figure>
                        <div class="contenido">
                            <h3 class="title_card">Premio</h3>
                            <p class="text_card">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Fuga exercitationem voluptates aliquam mollitia. Assumenda,
                                reiciendis.
                            </p>
                            <a href="#" class="comprar">Participar</a>
                        </div>
            </div>

    </section>
 -->




<!----------------------- SECCION DE CUENTAS ----------------------------->


<section id="cuentas">
        <h2 class="section_subtitle">CUENTAS</h2>

        <div class="container">
            <div class="container_card">

                <div class="card_datos">
                    <div class="container_datos">
                        <img src="{{asset('img/banesco_logo.png')}}" alt="imagenlogo" class="logo_bdv">
                        <div class="datos_pago">
                            <h3>Pago Movil Banesco</h3>
                            <p class="data">0134</p>
                            <p class="data">28.407.272</p>
                            <p class="data">0424-8676344</p>
                        </div>
                    </div>
                </div>

                <div class="card_datos">
                    <div class="container_datos">
                        <img src="{{asset('img/banplus_logo.png')}}" alt="imagenlogo" class="logo_bp">
                        <div class="datos_pago">
                            <h3>Pago Movil Banplus</h3>
                            <p class="data">0174</p>
                            <p class="data">28.588.823</p>
                            <p class="data">0412-9425624</p>
                        </div>
                    </div>
                </div>

                <div class="card_datos">
                    <div class="container_datos">

                        <img src="{{asset('img/zelle_logo.webp')}}" alt="imagenlogo" class="logo_zin">

                        <div class="datos_pago">
                            <h3>Zinli</h3>
                            <p class="data">Jesus Melean</p>
                            <p class="data">Correo: rocktoyonyo@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="card_datos">
                    <div class="container_datos">
                        <img src="{{asset('img/binance_logo.png')}}" alt="imagenlogo" class="logo_binance">
                        <div class="datos_pago">
                            <h3>Binance</h3>
                            <p class="data">Jesus Melean</p>
                            <p class="data">Correo: rocktoyonyo@gmail.com</p>
                            <p class="data">ID: 163593375</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>


<!----------------------- SECCION DE REDES SOCIALES ----------------------------->
    
    
<footer id="foot">

    <div class="container">
        <div class="contenido_foot">
            
            <div class="cont_foot">
                <img src="{{asset('img/logo_ruedaygana_sf.png')}}" class="img_logo" alt="imagenlogo">
            </div>

            <div class="cont_foot">
                <h2 class="slogan_footer">GRACIAS POR VISITAR</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quaerat.</p>
            </div>
            
            <div class="cont_foot"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quaerat.</p></div>
            <div class="cont_foot"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quaerat.</p></div>

        </div>
    </div>

</footer>
</body>
</html>
