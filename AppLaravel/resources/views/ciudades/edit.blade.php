<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        font-family:Arial, sans-serif;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
    }
    label{
        display:block;
        margin-top: 15px;
        font-weight: bold;
    }
    input{
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    button{
        background-color: #28a745;
        color:white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
    }
    button:hover{
        background-color: #218838;
    }
    .error{
        color:red;
        font-size:14px;
    }
    a{
        display: inline-block;
        margin-top:20px;
        color: #007bff;
        text-decoration: none;
    }
</style>
<body>
    <h1>Editar Ciudad</h1>
    <form action="/ciudades/{{ $ciudad->id }}" method="POST">
        @csrf
        @method('PUT') <!-- Els formularis nms tenen get y post, així q li especifiquem que es put-->

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $ciudad->nombre) }}">
        @error('nombre')
            <span class="error">{{ $message }}</span>
        @enderror

        <label>País:</label>
        <input type="text" name="pais" value="{{ old('pais', $ciudad->pais) }}">
        @error('nombre')
            <span class="error">{{ $message }}</span>
        @enderror

        <label>Población:</label>
        <input type="number" name="poblacion" value="{{ old('poblacion',$ciudad->poblacion) }}">
        @error('poblacion')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Actualizar Ciudad</button>
    </form>
    <a href="/ciudades"> <- Volver al listado</a>
</body>
</html>