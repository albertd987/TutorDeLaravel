@extends('layouts.app')
@section('title', 'Editar ciudad')
@section('content')
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
        <select name="pais_id" id="pais_id" required>
            <option value="">Selecciona un pais</option>
            @foreach ($paises as $pais)
                <option value="{{ $pais->id }}" {{ old('pais_id', $ciudad->pais_id ?? '') == $pais->id ? 'selected' : '' }}>
                    {{ $pais->nombre }}
                </option>
            @endforeach
        </select>
        @error('pais_id')
            <span class="error">{{ $message }}</span>
        @enderror

        <label>Población:</label>
        <input type="number" name="poblacion" value="{{ old('poblacion', $ciudad->poblacion) }}">
        @error('poblacion')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Actualizar Ciudad</button>
    </form>
    <a href="/ciudades"> <- Volver al listado</a>
@endsection