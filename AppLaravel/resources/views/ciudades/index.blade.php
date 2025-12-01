@extends ('layouts.app') <!--és la ruta /layouts/app-->
@section('title','Lista de Ciudades')
@section('content')

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Población</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ciudades as $ciudad)
                <tr>
                    <td>{{ $ciudad->id }}</td>
                    <td>{{ $ciudad->nombre }}</td>
                    <td>
                        <a href="/paises/{{ $ciudad->pais->id }}">
                        {{ $ciudad->pais->nombre }}</a>
                    </td>
                    <td>{{ number_format($ciudad->poblacion) }}</td>
                    <td>
                        <a href="/ciudades/{{ $ciudad->id }}/editar">Editar</a>
                        <form action="/ciudades/{{ $ciudad->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Seguro que quieres eliminar {{ $ciudad->nombre }}?')">
                                Eliminar
                            </button>
                        </form>
                        <a href="/ciudades/{{ $ciudad->id }}/eliminar"
                            onclick="return confirm('¿Seguro que quieres eliminar {{ $ciudad->nombre }}?')">
                            Eliminar amb href
                        </a>
                    </td>
                </tr>
            @endforeach
            <a href="/ciudades/crear"
                style="display: inline-block; margin-bottom: 20px; padding: 10px 20px; background: #4CAF50; color:white;text-decoration: none; border-radius:4px;">
                + Crear Nueva Ciudad
            </a>
        </tbody>
    </table>
    <p>Total de ciudades: {{ $ciudades->count() }}</p>
@endsection