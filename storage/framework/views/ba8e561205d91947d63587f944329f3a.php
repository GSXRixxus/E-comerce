

<?php $__env->startSection('content'); ?>
<div class="user-form-container">
    <div class="form-card">
        <div class="form-header">
            <h2 class="form-title">Agregar Nuevo Usuario</h2>
            <p class="form-subtitle">Complete los campos requeridos para registrar un nuevo usuario</p>
        </div>

        <form action="<?php echo e(route('usuarios.store')); ?>" method="POST" class="user-form">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <label class="form-label">Nombre de Usuario</label>
                <div class="input-with-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <input type="text" name="usuario" class="form-input" value="<?php echo e(old('usuario')); ?>" placeholder="Ingrese el nombre de usuario" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <div class="input-with-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input type="password" name="password" class="form-input" placeholder="Ingrese una contraseña segura" required>
                    <button type="button" class="password-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="strength-bar"></div>
                    <div class="strength-text">Seguridad: <span>Débil</span></div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Guardar Usuario
                </button>
                <a href="<?php echo e(route('productos.index')); ?>" class="cancel-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    :root {
        --primary-color: #4f46e5;
        --secondary-color: #f9fafb;
        --text-color: #111827;
        --border-color: #e5e7eb;
        --error-color: #ef4444;
        --success-color: #10b981;
        --warning-color: #f59e0b;
    }

    .user-form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 80px);
        padding: 2rem;
        background-color: #f3f4f6;
    }

    .form-card {
        width: 100%;
        max-width: 500px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    .form-header {
        padding: 1.5rem 2rem;
        background-color: var(--primary-color);
        color: white;
    }

    .form-title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .form-subtitle {
        margin: 0.5rem 0 0;
        font-size: 0.875rem;
        opacity: 0.9;
    }

    .user-form {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-color);
    }

    .input-with-icon {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-with-icon svg {
        position: absolute;
        left: 12px;
        color: #6b7280;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 40px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.9375rem;
        transition: all 0.2s;
        background-color: var(--secondary-color);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-input::placeholder {
        color: #9ca3af;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        background: none;
        border: none;
        cursor: pointer;
        color: #6b7280;
        padding: 0;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    .password-strength {
        margin-top: 0.5rem;
    }

    .strength-bar {
        height: 4px;
        width: 100%;
        background-color: #e5e7eb;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 0.25rem;
    }

    .strength-bar::after {
        content: '';
        display: block;
        height: 100%;
        width: 20%;
        background-color: var(--error-color);
        transition: all 0.3s;
    }

    .strength-text {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .strength-text span {
        font-weight: 500;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .submit-button, .cancel-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 0.9375rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .submit-button {
        background-color: var(--primary-color);
        color: white;
        border: none;
        flex: 1;
    }

    .submit-button:hover {
        background-color: #4338ca;
    }

    .cancel-button {
        background-color: white;
        color: var(--text-color);
        border: 1px solid var(--border-color);
        text-decoration: none;
    }

    .cancel-button:hover {
        background-color: var(--secondary-color);
    }

    @media (max-width: 640px) {
        .user-form-container {
            padding: 1rem;
        }
        
        .form-card {
            border-radius: 8px;
        }
        
        .form-header {
            padding: 1rem 1.5rem;
        }
        
        .user-form {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .submit-button, .cancel-button {
            width: 100%;
        }
    }
</style>

<script>
    // Toggle para mostrar/ocultar contraseña
    document.querySelector('.password-toggle').addEventListener('click', function() {
        const passwordInput = document.querySelector('input[name="password"]');
        const eyeIcon = this.querySelector('svg');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.replace('feather-eye', 'feather-eye-off');
            eyeIcon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.replace('feather-eye-off', 'feather-eye');
            eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        }
    });

    // Indicador de fuerza de contraseña
    document.querySelector('input[name="password"]').addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.querySelector('.strength-bar::after');
        const strengthText = document.querySelector('.strength-text span');
        
        let strength = 0;
        let width = '20%';
        let color = 'var(--error-color)';
        let text = 'Débil';
        
        if (password.length >= 8) strength++;
        if (password.match(/[A-Z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^A-Za-z0-9]/)) strength++;
        
        if (strength > 3) {
            width = '100%';
            color = 'var(--success-color)';
            text = 'Fuerte';
        } else if (strength > 1) {
            width = '60%';
            color = 'var(--warning-color)';
            text = 'Moderada';
        }
        
        document.querySelector('.strength-bar').style.setProperty('--strength-width', width);
        document.querySelector('.strength-bar').style.setProperty('--strength-color', color);
        strengthText.textContent = text;
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\tongi\resources\views/usuarios/create.blade.php ENDPATH**/ ?>