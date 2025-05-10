<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\..\resources\css\styles.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Compra</title>
</head>
<body>
<section id="compra" class="container container_compra">
    <div class="container_compra">
        <div class="cont_form">
            <form action="" method="POST" class="form_compra">
                @csrf
                <input type="text" placeholder="cedula" id="cedula" name="cedula">
                <input type="text" placeholder="nombre" id="nombre" name="nombre">
                <input type="text" placeholder="apellido" id="apellido" name="apellido">
                <input type="text" placeholder="telefono" id="telefono" name="telefono">
                <input type="text" placeholder="correo" id="correo" name="correo">
                <input type="number" placeholder="cantidad de tickets" id="cantidad_de_tickets" name="cantidad_de_tickets">
                <input type="number" placeholder="referencia de pago" id="referencia" name="referencia">
                <input type="number" placeholder="monto" id="monto" name="monto">
                <input type="date" placeholder="fecha de pago" id="fecha_de_pago" name="fecha_de_pago">
                <div>
                    <label for="opcion">Metodo de pago</label>
                    <select id="metodo_de_pago" name="metodo_de_pago">
                        <option value="Pago movil">Pago Movil</option>
                        <option value="Zelle">Zelle</option>
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
    </div>
</section>
</body>
</html>
