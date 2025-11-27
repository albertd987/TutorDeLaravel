<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Empleats</h1>

    <ul>
        @forelse($empleats as $empleat)
            <li>{{ $empleat->nom }} - {{ $empleat->departament->nom }}</li>
            <form action="/empleats/{{ $empleat->id }}/eliminar" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="display:inline;" onclick="return confirm ('Segur que vols eliminar aquest empleat?')">Eliminar</button>    
            </form>
            @empty
            <li>No hi ha empleats</li>
        @endforelse
    </ul>

    <hr>

    <h2>Afegir empleat</h2>

    <form action="/empleats" method="POST">
        @csrf

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
        @error('nom')
            <span>{{ $message }}</span>
        @enderror

        <br><br>
    
        <label for="dpt_id">Departament:</label>
        <select name="dpt_id" id="dpt_id">
            <option value="">Selecciona el departament</option>
            @foreach ($departaments as $departament)
                <option value="{{ $departament->id }}">{{ $departament->nom }}</option>>
            @endforeach
        </select>
        @error('dpt_id')
            <span>{{ $message }}</span>
        @enderror

        <br><br>
        <button type="submit">Crear</button>

    </form>
</body>
</html>