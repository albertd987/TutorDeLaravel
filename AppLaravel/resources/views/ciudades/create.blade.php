@extends('layouts.app')
@section('title','Crear Ciudad')
@section('content')

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
            <label for="pais_id">Pais:</label>
            <select name="pais_id" id="pais_id" required>
                <option value="">Selecciona un pais</option>
                @foreach ( $paises as $pais )
                    <option value="{{ $pais->id }}"
                        {{ old('pais_id', $ciudad->pais_id ?? '')==$pais->id ? 'selected' : '' }}>
                        {{ $pais->nombre }}
                    </option>
                @endforeach
            </select>
            @error('pais_id')
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
@endsection