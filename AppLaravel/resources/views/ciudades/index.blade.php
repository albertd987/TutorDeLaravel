<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de ciudades</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Ciudades en la base de datos</h1>
    @if (session('success'))
        <div style="background: #d4edda; color:#155724; padding: 10px; margin: 20px 0; border-radius: 4px" > 
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Población</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ciudades as $ciudad )
                <tr>
                    <td>{{ $ciudad->id }}</td>
                    <td>{{ $ciudad->nombre }}</td>
                    <td>{{ $ciudad->pais }}</td>
                    <td>{{ number_format($ciudad->poblacion) }}</td>
                </tr>
            @endforeach
            <a href="/ciudades/crear" style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background: #4CAF50; color:white;text-decoration: none; border-radius:4px;">
                + Crear Nueva Ciudad
            </a>
        </tbody>
    </table>
    <p>Total de ciudades: {{ $ciudades->count() }}</p>
</body>

</html>