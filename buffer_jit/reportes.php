<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard- Buffer JIt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="mb-4">Estado del Inventario de Seguridad</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3 tarjeta-custom">
                    <div class="card-body">
                        <h3 class="card-tittle">Peligroso</h3>
                        <p class="card-text">Stock faltante</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3 tarjeta-custom">
                    <div class="card-body">
                        <h3 class="card-tittle">Urgente</h3>
                        <p class="card-text">Revisar pronto</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3 tarjeta-custom">
                    <div class="card-body">
                        <h3 class="card-tittle">En orden</h3>
                        <p class="card-text">Stock suficiente</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>