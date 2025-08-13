<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="mb-4 text-center">Carrito de Compras</h1>

    @if(session('carrito') && count(session('carrito')) > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('carrito') as $id => $detalle)
                    @php $total += $detalle['precio'] * $detalle['cantidad']; @endphp
                    <tr>
                        <td>{{ $detalle['nombre'] }}</td>
                        <td>${{ number_format($detalle['precio'], 2) }}</td>
                        <td>{{ $detalle['cantidad'] }}</td>
                        <td>${{ number_format($detalle['precio'] * $detalle['cantidad'], 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total:</td>
                    <td>${{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        {{-- Botón para enviar a WhatsApp --}}
        @php
            $mensaje = "Hola, quiero comprar:\n";
            foreach(session('carrito') as $id => $detalle) {
                $mensaje .= "- {$detalle['nombre']} (Cantidad: {$detalle['cantidad']}, Precio: {$detalle['precio']})\n";
            }
            $mensaje .= "Total: $" . number_format($total, 2);
            $mensaje = urlencode($mensaje);
        @endphp

        <a href="https://wa.me/523111010475?text={{ $mensaje }}" target="_blank" class="btn btn-success">
            Confirmar pedido por WhatsApp
        </a>

    @else
        <div class="alert alert-warning">Tu carrito está vacío.</div>
    @endif

    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Seguir comprando</a>
</div>

</body>
</html>