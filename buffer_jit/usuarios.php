<?php
include "Contents/Class/Usuarios.php";
$usuario = new Usuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Buffer Jit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Contents/CSS/style.css">
</head>
<body class="bg-light">
    <?php include 'Contents/Views/navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Gestión de Usuarios</h2>

        <ul class="nav nav-tabs mb-4 border-0 justify-content-center" id="userTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active border-0 fw-bold" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro">Registrar Nuevo</button>
            </li>
            <li class="nav-item">
                <button class="nav-link border-0 fw-bold" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista">Lista de Usuarios</button>
            </li>
        </ul>

        <div class="tab-content" id="userTabsContent">
            
            <div class="tab-pane fade show active" id="registro">
                <div class="d-flex justify-content-center">
                    <div class="card p-4 shadow-sm border-0" style="width: 100%; max-width: 500px">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-lg" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Usuario</label>
                                <input type="text" class="form-control form-control-lg" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control form-control-lg" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rol</label>
                                <select class="form-select form-select-lg" name="rol">
                                    <option value="1">Administrador</option>
                                    <option value="2">Operador</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100 shadow-sm">Registrar Usuario</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="lista">
                <div class="card shadow-sm border-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>NOMBRE_USUARIO</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?= $usuario->ObtenerUsuarios($mysqli);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'Contents/Views/footer.php'; ?>