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
<section id="compra" class="container container_compra">
        <div class="cont_form">
            <form action="" method="POST" class="form" enctype="multipart/form-data" class="form">
                <h2>ingrese sus datos</h2>
                @csrf
                <input type="text" placeholder="cedula" id="cedula" name="cedula" class="input_form">
                <input type="text" placeholder="nombre" id="nombre" name="nombre"class="input_form">
                <input type="text" placeholder="apellido" id="apellido" name="apellido" class="input_form"> 
                <input type="text" placeholder="telefono" id="telefono" name="telefono"      class="input_form">
                <input type="text" placeholder="correo" id="correo" name="correo" class="input_form">
                <input type="number" placeholder="cantidad de tickets" id="cantidad_de_tickets" name="cantidad_de_tickets" class="input_form">
                <input type="number" placeholder="referencia de pago" id="referencia" name="referencia" class="input_form">
                <input type="number" placeholder="monto" id="monto" name="monto" class="input_form">
                <input type="date" placeholder="fecha de pago" id="fecha_de_pago" name="fecha_de_pago" class="input_form">
                <div>
                    <label for="opcion">Metodo de pago</label>
                    <select id="metodo_de_pago" name="metodo_de_pago">
                        <option value="Pago movil Banesco">Pago Movil Banesco</option>
                        <option value="Pago movil Banplus">Pago Movil Banplus</option>
                        <option value="Zinli">Zinli</option>
                        <option value="Binance">Binance</option>
                    </select>
                </div>
                <div>
                    <label for="imagen">Subir comprobante de pago</label>
                    <input type="file" id="imagen_comprobante" name="imagen_comprobante" accept="image/png, image/jpeg, image/jpg">
                </div>
                <button class="button button_compra buttom_form" type="submit">enviar</button>
            </form>
        </div>
</section>
</body>
</html>
