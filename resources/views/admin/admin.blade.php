<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <title>Panel de Administrador</title>
</head>
<body>




<!--------------- TABLA DE GESTION  ---------->


    <a href="{{route('logout')}}"class="button">Cerrar sesion</a>
    <div id="section_ventas_admin" class="container section_ventas">
        <h2 class="section_subtitle">Boletos vendidos</h2>
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
                            <form action={{route('pago.destroy',$pago->referencia)}} method="POST" class="button">	
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Eliminar</button>
                            </form>
                        </td>
                        <td><a href="" class="button">Asignar ticket</a></td>
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
                    @csrf
                    <input type="text" name="sorteo_nombre" id="sorteo_nombre" placeholder="Nombre del sorteo" class="input_form">
                    <input type="date" name="sorteo_fecha_inicio" id="sorteo_fecha_inicio" placeholder="Fecha de inicio del sorteo" class="input_form">
                    <input type="date" name="sorteo_fecha_fin" id="sorteo_fecha_fin" placeholder="Fecha de fin del sorteo" class="input_form">
                    <input type="text" name="sorteo_descripcion" id="sorteo_descripcion" placeholder="Descripcion del sorteo" class="input_form">
                    <input type="file" name="sorteo_imagen" id="sorteo_imagen" placeholder="Imagen del sorteo" class="input_reg" accept="image/*">
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
                            <a href="#"class="button">Eliminar</a>
                            
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
                    @csrf
                   
                        
                     
                    <div>
                    <label for="opcion">Sorteos</label>
                    <select id="Sorteo" name="id_sorteo">
                        @foreach ($sorteos as $sorteo)
                        <option value="{{$sorteo->id_sorteo}}">{{$sorteo->sorteo_nombre}}</option>
                        @endforeach    
                    </select>
                   
                    </div>
                     
                    
                    <input type="text" name="premio_nombre" id="premio_nombre" placeholder="Nombre premio" class="input_form">
                    <input type="text" name="premio_descripcion" id="premio_descripcion" placeholder="Descripcion premio" class="input_form">
                    <input type="file" name="premio_imagen" id="premio_imagen" placeholder="Imagen de premio" >
                    <br>
                    <button type="submit" class="btn_reg_sorteo button">Registrar Premio</button>
                </form>
            </div>
    </div>
<br><br><br><br>
        
</body>
</html>