@extends('layouts.app')
@section('title',$pais->nombre)
@section('content')
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
@endsection