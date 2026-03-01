<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion- buffer Jit</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="mb-4">Gestión de Stock</h2>
            <div class="card p-4 shadow" style="width: 100%; max-width: 400px">
                <form action="cargar.php" method="POST">
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Subir archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" required>
                    </div>
                    <button class="btn btn-success d-block mx-auto">Cargar Excel</button>
                </form>
            </div>
            <div class="mt-5">
                    <h4>Inventario Actual</h4>
                    <table class="table table-striped table-hover border">
                        <thead class="table-dark">
                            <tr>
                                <th>Número de Piezas</th>
                                <th>Descripción</th>
                                <th>Cantidad en Stock</th>
                                <th>Clasificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PZ-001</td>
                                <td>Tornillo de Acero</td>
                                <td>500</td>
                                <td><span class="badge bg-success">A</span></td>
                            </tr>
                            <tr>
                                <td>PZ-002</td>
                                <td>Manija</td>
                                <td>150</td>
                                <td><span class="badge bg-warning text-dark">B</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    </div>
</body>
</html>