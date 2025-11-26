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
    .form-group{
        margin-bottom:15 px;
    }
    label{
        display:block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input{
        width:100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius:4px;
    }
    button{
        background-color: #4CAF50;
        color:white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover{
        background-color: #45a049;
    }
    .error{
        color:red;
        font-size:14px;
    }
    .back-link{
        display: inline-block;
        margin-top: 20px;
        color: #4CAF50;
    }
</style>
<body>
    <h1>Crear nueva ciudad</h1>
    @if ($errors->any())
        <div style="background: #ffdddd; padding: 10px; margin-bottom: 20px; border-radius:4px;">
            <ul style="margin: 0">
                @foreach ( $errors->all() as $error )
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
    <!--formulari-->
    <form action="/ciudades" method="POST">

        <!--Cross-Site Request Forgery Protection. Laravel rebutja formularis sense aquest token-->
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pais">Pais:</label>
            <input type="text" id="pais" name="pais" value="{{ old('pais') }}" required>
            @error('pais')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="poblacion">Población:</label>
            <input type="text" id="poblacion" name="poblacion" value="{{ old('poblacion') }}" min="0">
            @error('poblacion')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Guardar Ciudad</button>
    </form>

    <a href="/ciudades" class="back-link"><- Volver a la lista</a>
</body>
</html>