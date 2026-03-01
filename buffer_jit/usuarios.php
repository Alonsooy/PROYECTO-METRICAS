<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios - Buffer Jit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 500px">
            <h3 class="text-center mb-4">Registrar Usuario</h3>
            <form action="guardar_usuario.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control form-control-lg" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control form-control-lg" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control form-control-lg" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rol del Usuario</label>
                    <select class="form-select form-select-lg" name="rol">
                        <option value="admin">Administrador</option>
                        <option value="operador">Operador</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100 shadow-sm">Crear Usuario</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>