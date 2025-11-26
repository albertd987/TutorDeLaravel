<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family:Arial,sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1{
            color:#333;
        }
        ul{
            list-style: none;
            padding: 0;
        }
        li{
            padding: 10px;
            margin: 5px 0;
            background: #f5f5f5;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>{{ $pais->nombre }}</h1>
    <p><strong>Código: </strong> {{ $pais->codigo }}</p>

    <h2>Ciudades ({{ $pais->ciudades->count() }}):</h2>
    <ul>
        @forelse ($pais->ciudades as $ciudad)
            <li>
                <strong>{{ $ciudad->nombre }}</strong>
                {{ number_format($ciudad->poblacion) }} habitantes
            </li>
        @empty
            <li>No hay ciudades registradas</li>
        @endforelse
    </ul>

    <p><strong>Población total:</strong>{{ number_format($pais->ciudades->sum('poblacion')) }} habitantes</p>

    <a href="/ciudades"><- Volver al listado de ciudades</a>
</body>
</html>