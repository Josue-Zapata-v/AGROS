@extends('layouts.app')

@section('content')
<h2>Mis Productos</h2>

<a href="{{ route('productos.create') }}">Nuevo Producto</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>S/ {{ $producto->precio }}</td>
            <td>{{ $producto->stock }} kg</td>
            <td>
                {{--<a href="{{ route('productos.edit', $producto->id) }}">Editar</a>--}}
                {{--<form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>--}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
