<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .badge-stock {
            font-size: 0.9rem;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .product-actions {
            display: flex;
            gap: 5px;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
            margin-top: 10px;
        }
        
    </style>
</head>
<body class="bg-light">
<div class="container py-4">
    <!-- Encabezado mejorado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="bi bi-box-seam"></i> Catálogo de Productos
        </h1>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary">
                <i class="bi bi-person-fill"></i> {{ session('usuario') }}
            </span>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
        </div>
    </div>

    <!-- Barra de acciones -->
    <div class="d-flex justify-content-between mb-4">
        <div class="d-flex gap-2">
            <a href="{{ route('productos.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
            <a href="{{ route('carrito.index') }}" class="btn btn-primary position-relative">
                <i class="bi bi-cart"></i> Carrito
                @if($cartCount ?? 0 > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>
            <div class="text-center mt-3">
                <a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">➕ Agregar cuenta</a>
            </div>
        </div>
        
        <!-- Buscador -->
        <form action="{{ route('productos.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Buscar productos..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Listado de productos -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($productos as $producto)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <!-- Imagen del producto -->
                @if($producto->imagen)
                    <img src="{{ asset('storage/'.$producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                        <i class="bi bi-image" style="font-size: 3rem;"></i>
                    </div>
                @endif
                
                <!-- Badge de stock -->
                <span class="badge rounded-pill bg-{{ $producto->stock > 0 ? 'success' : 'danger' }} badge-stock">
                    {{ $producto->stock }} en stock
                </span>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($producto->descripcion, 100) }}</p>
                    
                    <div class="mt-auto">
                        <p class="h4 text-primary mb-3">${{ number_format($producto->precio, 2) }}</p>
                        
                        <!-- Formulario para añadir al carrito -->
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @if($producto->stock > 0)
                                <input type="number" name="cantidad" value="1" min="1" max="{{ $producto->stock }}" 
                                       class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-warning flex-grow-1">
                                    <i class="bi bi-cart-plus"></i> Añadir
                                </button>
                            @else
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="bi bi-exclamation-triangle"></i> Sin stock
                                </button>
                            @endif
                        </form>

                        <!-- Botones de Acciones (Editar y Eliminar) -->
                        <div class="action-buttons">
                            <!-- Botón Editar -->
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-outline-primary flex-grow-1">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            
                            <!-- Botón Eliminar -->
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> No se encontraron productos
            </div>
        </div>
        @endforelse
    </div>

    <!-- Paginación -->
    @if($productos->hasPages())
    <div class="mt-4">
        {{ $productos->withQueryString()->links() }}
    </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>