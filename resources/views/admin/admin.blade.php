<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <title>Document</title>
</head>
<body>

    <div id="section_ventas_admin" class="container">
        <div class="container_table">
            <table id="table_gestion" class="table_gestion">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Referencia</th>
                        <th>Monto</th>
                        <th>Cantidad de Tickets</th>
                        <th>Fecha pago</th>
                        <th>Metodo de pago</th>
                        <th>Estado de pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                    <tr>
                        <td>{{ $pago->cedula_cliente }}</td>
                        <td>{{ $pago->referencia }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->cantidad_de_tickets }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                        <td>{{ $pago->metodo_de_pago}}</td>
                        <td>{{ $pago->estado_pago }}</td>
                        <td>
                            <a href="#">Eliminar</a>
                            <a href="#">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br>

    <div class="container">
        <div class="reg_sorteo">
            <div class="cont_reg_sorteo">
                <form action="#" class="form_reg_sorteo" id="">
                    <input type="text" name="nombre_sorteo" id="nombre_sorteo" placeholder="Nombre del sorteo" class="input_reg_sorteo">
                    <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_reg_sorteo">
                    <input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha de fin del sorteo" class="input_reg_sorteo">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del sorteo" class="input_reg_sorteo">
                    <input type="file" name="imagen" id="imagen" placeholder="Imagen del sorteo" class="input_reg_sorteo">
                    <br>
                    <input type="submit" value="Registrar sorteo" class="button_form button">
                </form>
            </div>
        </div>
    </div>


    <box-icon name='message-alt-x'></box-icon>

    
    <div class="container">
        <div class="reg_sorteo">
            <div class="cont_reg_sorteo">
                <form action="#" class="form_reg_sorteo" id="">
                    <input type="text" name="nombre_sorteo" id="nombre_sorteo" placeholder="Nombre del sorteo" class="input_reg_sorteo">
                    <input type="date" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_reg_sorteo">
                    <input type="date" name="fecha_fin" id="fecha_fin" placeholder="Fecha de fin del sorteo" class="input_reg_sorteo">
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del sorteo" class="input_reg_sorteo">
                    <input type="file" name="imagen" id="imagen" placeholder="Imagen del sorteo" class="input_reg_sorteo">
                    <br>
                    <input type="submit" value="Registrar sorteo" class="button_form button">
                </form>
            </div>
        </div>
    </div>

    

    <div id="section_ventas_admin" class="container">
        <div class="container_table">
            <table id="table_gestion" class="table_gestion">
                <thead>
                    <tr>
                        <th>ID premio</th>
                        <th>ID sorteo</th>
                        <th>Premio</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <i class="ti ti-trash"></i>
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>    
</body>
</html>