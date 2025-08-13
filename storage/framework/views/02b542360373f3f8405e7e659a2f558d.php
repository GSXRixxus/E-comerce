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
                <i class="bi bi-person-fill"></i> <?php echo e(session('usuario')); ?>

            </span>
            <a href="<?php echo e(route('logout')); ?>" class="btn btn-sm btn-danger">
                <i class="bi bi-box-arrow-right"></i> Salir
            </a>
        </div>
    </div>

    <!-- Barra de acciones -->
    <div class="d-flex justify-content-between mb-4">
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
            <a href="<?php echo e(route('carrito.index')); ?>" class="btn btn-primary position-relative">
                <i class="bi bi-cart"></i> Carrito
                <?php if($cartCount ?? 0 > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo e($cartCount); ?>

                    </span>
                <?php endif; ?>
            </a>
            <div class="text-center mt-3">
                <a href="<?php echo e(route('usuarios.create')); ?>" class="btn btn-success mb-3">➕ Agregar cuenta</a>
            </div>
        </div>
        
        <!-- Buscador -->
        <form action="<?php echo e(route('productos.index')); ?>" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Buscar productos..." value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Listado de productos -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <!-- Imagen del producto -->
                <?php if($producto->imagen): ?>
                    <img src="<?php echo e(asset('storage/'.$producto->imagen)); ?>" class="card-img-top" alt="<?php echo e($producto->nombre); ?>">
                <?php else: ?>
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 200px;">
                        <i class="bi bi-image" style="font-size: 3rem;"></i>
                    </div>
                <?php endif; ?>
                
                <!-- Badge de stock -->
                <span class="badge rounded-pill bg-<?php echo e($producto->stock > 0 ? 'success' : 'danger'); ?> badge-stock">
                    <?php echo e($producto->stock); ?> en stock
                </span>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo e($producto->nombre); ?></h5>
                    <p class="card-text text-muted"><?php echo e(Str::limit($producto->descripcion, 100)); ?></p>
                    
                    <div class="mt-auto">
                        <p class="h4 text-primary mb-3">$<?php echo e(number_format($producto->precio, 2)); ?></p>
                        
                        <!-- Formulario para añadir al carrito -->
                        <form action="<?php echo e(route('carrito.agregar', $producto->id)); ?>" method="POST" class="d-flex gap-2">
                            <?php echo csrf_field(); ?>
                            <?php if($producto->stock > 0): ?>
                                <input type="number" name="cantidad" value="1" min="1" max="<?php echo e($producto->stock); ?>" 
                                       class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-warning flex-grow-1">
                                    <i class="bi bi-cart-plus"></i> Añadir
                                </button>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100" disabled>
                                    <i class="bi bi-exclamation-triangle"></i> Sin stock
                                </button>
                            <?php endif; ?>
                        </form>

                        <!-- Botones de Acciones (Editar y Eliminar) -->
                        <div class="action-buttons">
                            <!-- Botón Editar -->
                            <a href="<?php echo e(route('productos.edit', $producto->id)); ?>" class="btn btn-outline-primary flex-grow-1">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                            
                            <!-- Botón Eliminar -->
                            <form action="<?php echo e(route('productos.destroy', $producto->id)); ?>" method="POST" class="flex-grow-1">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle"></i> No se encontraron productos
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Paginación -->
    <?php if($productos->hasPages()): ?>
    <div class="mt-4">
        <?php echo e($productos->withQueryString()->links()); ?>

    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\tongi\resources\views/productos/index.blade.php ENDPATH**/ ?>