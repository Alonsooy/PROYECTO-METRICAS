<?php
session_start();
include "Contents/Models/Productos.php";
include "Contents/Functions/ControlAcceso.php";
$producto = new Productos($mysqli);
accesoRol("");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión - Buffer Jit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Contents/CSS/style.css">
</head>
<body class="bg-light">
    <?php include 'Contents/Views/navbar.php'; ?>
    
    <div class="container mt-5">
        <div class="mb-5">
            <h4 class="mb-4">Inventario Actual</h4>
            <div class="table-responsive">
                <table class="table table-hover"> <thead>
                        <tr>
                            <th>Id del producto</th>
                            <th>Nombre del Producto</th>
                            <th>Codigo del Producto</th>
                            <th>Valor Unitario</th>
                            <th>Número de Piezas</th>
                            <th>Clasificación</th>
                            <th>Provedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $producto->obtenerProductos($mysqli);?>
                    </tbody>
                </table>
            </div>
        </div>

        <h4 class="mb-4">Gestión de Stock</h4>
        <div class="card p-4 shadow-sm" style="max-width: 400px">
            <form action="cargar.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="archivo" class="form-label">Subir archivo Excel</label>
                    <input type="file" class="form-control" id="archivo" name="archivo" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Cargar Inventario</button>
            </form>
        </div>
    </div>

    <?php include 'Contents/Views/footer.php'; ?>