<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\resources\css\styles.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <title>Compra</title>
</head>

<body>

 <nav id="menu" class="menu">
    <h2 class="titulo">Compra de tickets</h2>
 </nav>

<h2 class="section_subtitle">REGISTRAR COMPRA</h2>

@php
    $numeros_disponibles = json_decode($sorteo->numeros_disponibles, true);
    $cantidad_disponible = count($numeros_disponibles);
@endphp

<section id="cuentas">

        <div class="barra_cont">
            <p class="text_compra">
                <h3>Leer (IMPORTANTE)</h3> <br>
            Tu pago será verificado manualmente por nuestro equipo en las próximas horas.
Una vez confirmado, recibirás tus boletos del sorteo directamente en el correo que registraste.

Recuerda:
	•	Si pagaste por PagoMóvil, Zinli o Binance, asegúrate de enviar el comprobante.  
	•	Mantente pendiente de tu bandeja de entrada (y también revisa el correo no deseado).

🙏 Que Dios bendiga tu suerte.
¡Rueda y gana con nosotros! 🏍️💨
        </p>
    </div>

    <br><br>

    <h3>CALCULE AQUI EL PRECIO DEL BOLETO</h3>

    <div class="barra_cont">
        <h3>QUEDAN {{$cantidad_disponible}} DISPONIBLES</h3>
        <div class="calc_pago">
            <div class="cont_element_calc">
                <button class="btn_calc button" id="suma">+</button>
            </div>
            <div class="cont_element_calc">
                <h3 class="cant_boletos">0</h3>
            </div>
            <div class="cont_element_calc">
                <button class="btn_calc button" id="resta">-</button>
            </div>
            
            
        </div>
        <h3 class="monto"></h3>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const sumaBtn = document.getElementById('suma');
    const restaBtn = document.getElementById('resta');
    const cantBoletosDisplay = document.querySelector('.cant_boletos');
    const montoDisplay = document.querySelector('.monto');


    const precioBoletoD = {{$sorteo->precio_boleto_dolar}};
    const precioBoletoB = {{$sorteo->precio_boleto_bs}}

    let cantidadBoletos = 0;

    function actualizarMonto() {
        const totalPagarD = cantidadBoletos * precioBoletoD;
        const totalPagarB =  cantidadBoletos * precioBoletoB
        montoDisplay.textContent = `Total: $${totalPagarD.toFixed(2)} ----- bs${totalPagarB.toFixed(2)}`; 
    }

    sumaBtn.addEventListener('click', function() {
        cantidadBoletos++;
        cantBoletosDisplay.textContent = cantidadBoletos;
        actualizarMonto();
    });

    restaBtn.addEventListener('click', function() {
        if (cantidadBoletos > 0) {
            cantidadBoletos--;
            cantBoletosDisplay.textContent = cantidadBoletos;
            actualizarMonto();
        }
    });

   
    cantBoletosDisplay.textContent = cantidadBoletos;
    actualizarMonto();
});
    </script>


</section>

<br><br><br><br>    




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
                
                <div>
                    <label for="metodo_de_pago">Metodo de pago</label>
                    <select id="metodo_de_pago" name="metodo_de_pago" class="input_select"  required>
                        <option value="n" class="input_option">Ninguno</option>
                        <option value="Pago movil Banesco" class="input_option">Pago Movil Banesco</option>
                        <option value="Pago movil Banplus" class="input_option">Pago Movil Banplus</option>
                        <option value="Zinli" class="input_option">Zinli</option>
                        <option value="Binance" class="input_option">Binance</option>
                    </select>
                </div>
                <div class="cont_pago_compra">
                    <div class="datos_pago data_p">
                        <h3>Binance</h3>
                        <p class="data">Jesus Melean</p>
                        <p class="data">Correo: rocktoyonyo@gmail.com</p>
                        <p class="data">ID: 163593375</p>
                    </div>

                </div>
                <br>
                <label for="cantidad_de_tickets">Cantidad de tickets:</label>
                <p class="data">Tickets disponibles: {{$cantidad_disponible}}</p>
                <input type="number" placeholder="cantidad de tickets" id="cantidad_de_tickets" name="cantidad_de_tickets" class="input_form"  required min="1" max="{{$cantidad_disponible}}">
                <label for="referencia">Referencia de pago:</label>
                <input type="number" placeholder="referencia de pago" id="referencia" name="referencia" class="input_form" required>
                <label for="monto">Monto:</label>
                <input type="number" placeholder="monto" id="monto" name="monto" class="input_form" required>
                <label for="fecha_de_pago">Fecha de pago:</label>
                <input type="date" placeholder="fecha de pago" id="fecha_de_pago" name="fecha_de_pago" class="input_form" required>
                
                <div>
                    <label for="">Subir comprobante de pago</label>
                    <label for="imagen_comprobante" class="file">Click para enviar comprobante de pago</label>
                    <input type="file" id="imagen_comprobante" name="imagen_comprobante" accept="image/png, image/jpeg, image/jpg" class="input_file"  required>
                </div>
                <button class="button btn_modal" type="submit">Enviar</button>
            </form>
        </div>
</section>

<script>
        document.addEventListener('DOMContentLoaded', () => {
    const metodoDePagoSelect = document.getElementById('metodo_de_pago');
    const contPagoCompraDiv = document.querySelector('.data_p');

    const detallesDePago = {
        'Pago movil Banesco': `
            <h3>Pago Movil Banesco</h3>
            <p class="data">0134</p>
            <p class="data">28.407.272</p>
            <p class="data">0424-8676344</p>
            
        `,
        'Pago movil Banplus': `
            <h3>Pago Movil Banplus</h3>
            <p class="data">0174</p>
            <p class="data">28.588.823</p>
            <p class="data">0412-9425624</p>
            
        `,
        'Zinli': `
            <h3>Zinli</h3>
            <p class="data">Jesus Melean</p>
            <p class="data">Correo: rocktoyonyo@gmail.com</p>
        `,
        'Binance': `
            <h3>Binance</h3>
            <p class="data">Jesus Melean</p>
            <p class="data">Correo: rocktoyonyo@gmail.com</p>
            <p class="data">ID: 163593375</p>
            
        `,
        'n': `<p>Por favor, selecciona un método de pago para ver los detalles.</p>`,
        'default': `<p>Por favor, selecciona un método de pago para ver los detalles.</p>`
    };

    metodoDePagoSelect.addEventListener('change', () => {
        const valorSeleccionado = metodoDePagoSelect.value;
        mostrarDetallesDePago(valorSeleccionado);
    });

    function mostrarDetallesDePago(metodo) {
        const contenidoAMostrar = detallesDePago[metodo] || detallesDePago['default'];
        contPagoCompraDiv.innerHTML = contenidoAMostrar;
    }

    mostrarDetallesDePago(metodoDePagoSelect.value);
});
    </script>

</body>
</html>
