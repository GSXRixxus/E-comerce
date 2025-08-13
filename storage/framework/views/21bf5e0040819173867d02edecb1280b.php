<form action="<?php echo e(route('productos.update', $producto->id)); ?>" method="POST" enctype="multipart/form-data" class="product-form">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-header">
        <h2>Editar Producto</h2>
    </div>

    <div class="form-group">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo e(old('nombre', $producto->nombre)); ?>" class="form-input" required>
    </div>

    <div class="form-group">
        <label class="form-label">Descripción:</label>
        <textarea name="descripcion" class="form-textarea"><?php echo e(old('descripcion', $producto->descripcion)); ?></textarea>
    </div>

    <div class="form-row">
        <div class="form-group half-width">
            <label class="form-label">Precio:</label>
            <div class="input-with-symbol">
                <span class="currency-symbol">$</span>
                <input type="number" step="0.01" name="precio" value="<?php echo e(old('precio', $producto->precio)); ?>" class="form-input" required>
            </div>
        </div>

        <div class="form-group half-width">
            <label class="form-label">Stock:</label>
            <input type="number" name="stock" value="<?php echo e(old('stock', $producto->stock)); ?>" class="form-input" required>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Imagen actual:</label>
        <div class="current-image">
            <?php if($producto->imagen): ?>
                <img src="<?php echo e(asset('storage/'.$producto->imagen)); ?>" class="product-image">
            <?php else: ?>
                <span class="no-image">No hay imagen</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">Nueva imagen (opcional):</label>
        <div class="file-upload">
            <label class="file-upload-label">
                <input type="file" name="imagen" class="file-input">
                <span class="file-upload-button">Seleccionar archivo</span>
                <span class="file-upload-text">No se ha seleccionado ningún archivo</span>
            </label>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="submit-button">Actualizar Producto</button>
    </div>
</form>

<style>
    :root {
        --primary-color: #4a6bff;
        --secondary-color: #f8f9fa;
        --text-color: #333;
        --border-color: #ddd;
        --error-color: #e74c3c;
        --success-color: #2ecc71;
    }

    .product-form {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .form-header h2 {
        color: var(--primary-color);
        font-size: 1.8rem;
        margin: 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-row {
        display: flex;
        gap: 1.5rem;
    }

    .half-width {
        flex: 1;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-color);
    }

    .form-input, .form-textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-input:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(74, 107, 255, 0.2);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .input-with-symbol {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }

    .input-with-symbol .form-input {
        padding-left: 30px;
    }

    .current-image {
        margin-top: 0.5rem;
    }

    .product-image {
        max-width: 120px;
        max-height: 120px;
        border-radius: 4px;
        border: 1px solid var(--border-color);
    }

    .no-image {
        color: #666;
        font-style: italic;
    }

    .file-upload {
        margin-top: 0.5rem;
    }

    .file-input {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .file-upload-button {
        padding: 0.75rem 1.5rem;
        background-color: var(--secondary-color);
        color: var(--text-color);
        border: 1px solid var(--border-color);
        border-radius: 4px;
        margin-right: 1rem;
        transition: all 0.3s;
    }

    .file-upload-button:hover {
        background-color: #e9ecef;
    }

    .file-upload-text {
        color: #666;
    }

    .submit-button {
        width: 100%;
        padding: 1rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #3a5bef;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .product-form {
            padding: 1.5rem;
            margin: 1rem;
        }
    }
</style>

<script>
    // Actualizar el texto del archivo seleccionado
    document.querySelector('.file-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'No se ha seleccionado ningún archivo';
        document.querySelector('.file-upload-text').textContent = fileName;
    });
</script><?php /**PATH C:\xampp\htdocs\tongi\resources\views/productos/edit.blade.php ENDPATH**/ ?>