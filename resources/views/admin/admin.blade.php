<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <title>Document</title>
</head>
<body>

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
            </tr>
            @endforeach
        </tbody>
    </table>

    
        
</body>
</html>