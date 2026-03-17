
<nav class="navbar navbar-expand-lg navbar-light stick-top">
    <div class="container">
        <a class="navbar-brand" href="gestion.php">Buffer Jit</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php"> Registrar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestion.php">Gestión y Stock</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reportes.php">Reportes</a>
                </li>
                <LI>
                   <?php
                    if (isset($_SESSION['usuario'])) {
                        echo '<a href="Contents/Functions/logout.php" class="btn btn-outline-danger fw-bold px-4">Cerrar sesión</a>';
                    } ?> 
                </LI>
            </ul>
        </div>
    </div>
</nav>