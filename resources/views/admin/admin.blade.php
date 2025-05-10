<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <title>Panel de Administrador</title>
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
                        <th>Tickets</th>
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
                        <td><a href="ticket.store">Asignar ticket</a></td>
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
                <form action="{{route('sorteo.store')}}" class="form_reg_sorteo" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="sorteo_nombre" id="sorteo_nombre" placeholder="Nombre del sorteo" class="input_reg_sorteo">
                    <input type="date" name="sorteo_fecha_inicio" id="sorteo_fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_reg_sorteo">
                    <input type="date" name="sorteo_fecha_fin" id="sorteo_fecha_fin" placeholder="Fecha de fin del sorteo" class="input_reg_sorteo">
                    <input type="text" name="sorteo_descripcion" id="sorteo_descripcion" placeholder="Descripcion del sorteo" class="input_reg_sorteo">
                    <input type="file" name="sorteo_imagen" id="sorteo_imagen" placeholder="Imagen del sorteo" class="input_reg_sorteo" accept="image/*">
                    <br>
                    <button type="submit" class="btn_reg_sorteo button">Registrar sorteo</button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="container">
        <div class="reg_sorteo">
            <div class="cont_reg_sorteo">
                <form action="" class="form_reg_sorteo" id="">
                    @csrf
                    <input type="text" name="sorteo_nombre" id="sorteo_nombre" placeholder="Nombre del sorteo" class="input_reg_sorteo">
                    <input type="date" name="sorteo_fecha_inicio" id="sorteo_fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_reg_sorteo">
                    <input type="date" name="sorteo_fecha_fin" id="sorteo_fecha_fin" placeholder="Fecha de fin del sorteo" class="input_reg_sorteo">
                    <input type="text" name="sorteo_descripcion" id="sorteo_descripcion" placeholder="Descripcion del sorteo" class="input_reg_sorteo">
                    <input type="file" name="sorteo_imagen" id="sorteo_imagen" placeholder="Imagen del sorteo" class="input_reg_sorteo">
                    <br>
                    <input type="submit" value="Editar Sorteo" class="btn_reg_sorteo button">
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($premios as $premio)
                    <tr>
                        <td>{{ $premio->id_premio }}</td>
                        <td>{{ $premio->id_sorteo }}</td>
                        <td>{{ $premio->premio_nombre }}</td>
                        <td>{{ $premio->premio_descripcion }}</td>
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

<div class="container">
        <div class="reg_sorteo">
            <div class="cont_reg_sorteo">
                <form action="" class="form_reg_sorteo" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_sorteo" id="id_sorteo" value="" class="input_reg_sorteo">
                    <input type="text" name="premio_nombre" id="premio_nombre" placeholder="Nombre premio" class="input_reg_sorteo">
                    <input type="text" name="premio_descripcion" id="premio_descripcion" placeholder="Descripcion premio" class="input_reg_sorteo">
                    <input type="file" name="premio_imagen" id="premio_imagen" placeholder="Imagen de premio" class="input_reg_sorteo">
                    <br>
                    <input type="submit" value="Registrar sorteo" class="btn_reg_sorteo button">
                </form>
            </div>
        </div>
    </div>
<a href="{{route('logout')}}">Cerrar sesion</a>
        
</body>
</html>