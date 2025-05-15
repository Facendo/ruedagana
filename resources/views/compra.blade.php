<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\resources\css\styles.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Compra</title>
</head>

<body>

<h2 class="section_subtitle">REGISTRAR COMPRA</h2>

<section id="cuentas">

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

<br><br><br><br>    

@php
    $numeros_disponibles = json_decode($sorteo->numeros_disponibles);
    $cantidad_disponible = count($numeros_disponibles);
@endphp

<section id="compra" class="container container_compra">
        <div class="cont_form cont_form_compra">
 
            <form action="{{route("cliente.store")}}" method="POST" class="form" enctype="multipart/form-data" class="form">
                <h2>ingrese sus datos</h2>
                @csrf
                <input type="hidden" id="id_sorteo" name="id_sorteo" value="{{$sorteo->id_sorteo}}" required>
                <label for="cedula">Cedula:</label>
                <input type="text" placeholder="cedula" id="cedula" name="cedula" class="input_form" required>
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="nombre" id="nombre" name="nombre"class="input_form" required>
                <label for="apellido">Apellido:</label>
                <input type="text" placeholder="apellido" id="apellido" name="apellido" class="input_form" required> 
                <label for="telefono">Telefono:</label>
                <input type="text" placeholder="telefono" id="telefono" name="telefono" class="input_form" required>
                <label for="correo">Correo:</label>
                <input type="text" placeholder="correo" id="correo" name="correo" class="input_form" required>
                <label for="cantidad_de_tickets">Cantidad de tickets:</label>
                <p class="data">Tickets disponibles: {{$cantidad_disponible}}</p>
                <input type="number" placeholder="cantidad de tickets" id="cantidad_de_tickets" name="cantidad_de_tickets" class="input_form"  required min="1" max="{{$cantidad_disponible}}">
                <div class="sumador_de_montos">
                    <h3>25</h3>
                </div>
                <label for="referencia">Referencia de pago:</label>
                <input type="number" placeholder="referencia de pago" id="referencia" name="referencia" class="input_form" required>
                <label for="monto">Monto:</label>
                <input type="number" placeholder="monto" id="monto" name="monto" class="input_form" required>
                <label for="fecha_de_pago">Fecha de pago:</label>
                <input type="date" placeholder="fecha de pago" id="fecha_de_pago" name="fecha_de_pago" class="input_form" required>
                <div>
                    <label for="metodo_de_pago">Metodo de pago</label>
                    <select id="metodo_de_pago" name="metodo_de_pago" class="input_select"  required>
                        <option value="Pago movil Banesco" class="input_option">Pago Movil Banesco</option>
                        <option value="Pago movil Banplus" class="input_option">Pago Movil Banplus</option>
                        <option value="Zinli" class="input_option">Zinli</option>
                        <option value="Binance" class="input_option">Binance</option>
                    </select>
                </div>
                <div>
                    <label for="">Subir comprobante de pago</label>
                    <label for="imagen_comprobante" class="file">Click para enviar comprobante de pago</label>
                    <input type="file" id="imagen_comprobante" name="imagen_comprobante" accept="image/png, image/jpeg, image/jpg" class="input_file"  required>
                </div>
                <button class="button" type="submit">Enviar</button>
            </form>
        </div>
</section>
</body>
</html>
