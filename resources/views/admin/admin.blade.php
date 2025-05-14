<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Cal+Sans&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Rubik+Mono+One&display=swap" rel="stylesheet">

    <title>Panel de Administrador</title>
</head>
<body>




<!--------------- TABLA DE GESTION  ---------->


    <a href="{{route('logout')}}"class="button">Cerrar sesion</a>
    <h1 class="section_title">Panel de Administrador</h1>

    {{-- Filtrador para la tabla de pagos de boletos --}}

    <div id="section_ventas_admin" class="container section_ventas">
        <h2 class="section_subtitle">Tabla de pagos de boletos</h2>

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
                            <form action={{route('pago.destroy',$pago->id_pago)}} method="POST">	
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Eliminar</button>
                            </form>
                        </td>
                        <td><a href="{{route('ticket.index',['id_pago'=>$pago->id_pago])}}" class="button">Asignar ticket</a></td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    

    
    
    
    <br><br><br><br><br><br><br><br><br><br>





    <!------------------ REGISTRAR SORTEO --------------------->

    <h2 class="section_subtitle">REGISTRAR SORTEO</h2>
    <div class="container_reg">
            <div class="cont_form">
                <form action="{{route('sorteo.store')}}" class="form_reg_sorteo form" method="POST" enctype="multipart/form-data">
                    <h3 class="sub_inp">Registra sorteo</h3>
                    @csrf
                    <label for="sorteo_nombre">Nombre:</label>
                    <input type="text" name="sorteo_nombre" id="sorteo_nombre" placeholder="Nombre del sorteo" class="input_form">
                    <label for="sorteo_fecha_inicio">Fecha de inicio:</label>
                    <input type="date" name="sorteo_fecha_inicio" id="sorteo_fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_form">
                    <label for="sorteo_fecha_fin">Fecha de fin:</label>
                    <input type="date" name="sorteo_fecha_fin" id="sorteo_fecha_fin" placeholder="Fecha de fin del sorteo" class="input_form">
                    <label for="sorteo_descripcion">Descripcion:</label>
                    <input type="text" name="sorteo_descripcion" id="sorteo_descripcion" placeholder="Descripcion del sorteo" class="input_form">

                    <label for="precio_boleto_bs">Precio boleto (bs):</label>
                    <input type="text" name="precio_boleto_bs" id="precio_boleto_bs" placeholder="Precio del boleto en bolivares" class="input_form">
                    <label for="precio_boleto_dolar">Precio boleto (dolar):</label>
                    <input type="text" name="precio_boleto_dolar" id="precio_boleto_dolar" placeholder="Precio del boleto en dolares" class="input_form">
                    <label for="sorteo_imagen" class="file">Imagen:</label>
                    <input type="file" name="sorteo_imagen" id="sorteo_imagen" placeholder="Imagen del sorteo" class="input_file" accept="image/*">
                    
                    <br>

                    <button type="submit" class="btn_reg_sorteo button">Registrar sorteo</button>
                </form>
            </div>
        
    </div>


    <!--------- TABLA DE SORTEOS  --------->

    <div id="section_ventas_admin" class="container">
        <h2 class="section_subtitle">TABLA DE SORTEOS</h2>
        <div class="container_table">
            <table id="table_gestion" class="table_gestion">
                <thead>
                    <tr>
                        <th>ID sorteo</th>
                        <th>Nombre del sorteo</th>
                        <th>Descripción</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sorteos as $sorteo)
                    <tr>
                        <td>{{ $sorteo->id_sorteo }}</td>
                        <td>{{ $sorteo->sorteo_nombre }}</td>
                        <td>{{ $sorteo->sorteo_descripcion }}</td>
                        <td>{{ $sorteo->sorteo_fecha_inicio }}</td>
                        <td>{{ $sorteo->sorteo_fecha_fin }}</td>
                        <td>
                            <form action={{route('sorteo.destroy',$sorteo)}} method="POST">	
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!------------------ Asignacion de Premios ---------------------> 



<h2 class="section_subtitle">Asignar Premios</h2>
<div class="container_reg">
    
            <div class="cont_form">
                <form action="{{route('premio.store')}}" class="form_reg_sorteo form" method="POST" enctype="multipart/form-data">
                    <h3 class="sub_inp">Asigna premios</h3>
                    @csrf
                   
                        
                     
                    <div>
                    <label for="opcion">Sorteos</label>
                    <select id="Sorteo" name="id_sorteo" class="input_select">
                        @foreach ($sorteos as $sorteo)
                        <option value="{{$sorteo->id_sorteo}}"class="input_option">{{$sorteo->sorteo_nombre}}</option>
                        @endforeach    
                    </select>
                   
                    </div>
                     
                    <label for="premio_nombre">Nombre del premio:</label>
                    <input type="text" name="premio_nombre" id="premio_nombre" placeholder="Nombre premio" class="input_form">
                    <label for="premio_descripcion">Descripcion del premio:</label>
                    <input type="text" name="premio_descripcion" id="premio_descripcion" placeholder="Descripcion premio" class="input_form">
                    <label for="premio_imagen" class="file">Imagen del premio:</label>
                    <input type="file" name="premio_imagen" id="premio_imagen" placeholder="Imagen de premio" class="input_file">
                    <br>
                    <button type="submit" class="btn_reg_sorteo button">Registrar Premio</button>
                </form>
            </div>
    </div>
<br><br><br><br>
        
</body>
</html>