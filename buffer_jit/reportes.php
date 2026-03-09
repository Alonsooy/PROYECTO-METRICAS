<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard- Buffer JIt</title>
    <link rel="stylesheet" href="Contents/CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include 'Contents/Views/navbar.php'; ?>
    
    <div class="container mt-5">
        <h2 class="mb-5 text-center">Estado del Inventario de Seguridad</h2>
        
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3 shadow-sm border-0">
                    <div class="card-body py-4">
                        <h3 class="card-title">Peligroso</h3>
                        <p class="card-text">Stock faltante</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3 shadow-sm border-0">
                    <div class="card-body py-4">
                        <h3 class="card-title text-dark">Urgente</h3>
                        <p class="card-text text-dark">Revisar pronto</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3 shadow-sm border-0">
                    <div class="card-body py-4">
                        <h3 class="card-title">En orden</h3>
                        <p class="card-text">Stock suficiente</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg shadow-sm">Descargar Reporte PDF</button>
        </div>
    </div>

    <?php include 'Contents/Views/footer.php'; ?>