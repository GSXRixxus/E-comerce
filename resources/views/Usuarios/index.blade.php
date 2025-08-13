@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Lista de cuentas</h3>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Agregar cuenta</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
        @foreach($usuarios as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->usuario }}</td>
            <td>
                <form action="{{ route('usuarios.destroy', $u->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este usuario?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary w-100 py-2 mt-2">
    Ir a Usuarios
</a>

                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
