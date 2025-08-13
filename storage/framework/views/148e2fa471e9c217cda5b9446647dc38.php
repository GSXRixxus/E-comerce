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

    <?php if(session('carrito') && count(session('carrito')) > 0): ?>
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
                <?php $total = 0; ?>
                <?php $__currentLoopData = session('carrito'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $detalle['precio'] * $detalle['cantidad']; ?>
                    <tr>
                        <td><?php echo e($detalle['nombre']); ?></td>
                        <td>$<?php echo e(number_format($detalle['precio'], 2)); ?></td>
                        <td><?php echo e($detalle['cantidad']); ?></td>
                        <td>$<?php echo e(number_format($detalle['precio'] * $detalle['cantidad'], 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('carrito.eliminar', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total:</td>
                    <td>$<?php echo e(number_format($total, 2)); ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        
        <?php
            $mensaje = "Hola, quiero comprar:\n";
            foreach(session('carrito') as $id => $detalle) {
                $mensaje .= "- {$detalle['nombre']} (Cantidad: {$detalle['cantidad']}, Precio: {$detalle['precio']})\n";
            }
            $mensaje .= "Total: $" . number_format($total, 2);
            $mensaje = urlencode($mensaje);
        ?>

        <a href="https://wa.me/523111010475?text=<?php echo e($mensaje); ?>" target="_blank" class="btn btn-success">
            Confirmar pedido por WhatsApp
        </a>

    <?php else: ?>
        <div class="alert alert-warning">Tu carrito está vacío.</div>
    <?php endif; ?>

    <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary mt-3">Seguir comprando</a>
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\tongi\resources\views/carrito/index.blade.php ENDPATH**/ ?>