<?php
function accesoRol($zona){
    if (!isset($_SESSION["usuario"], $_SESSION["rol"])){
        header("Location: index.php");
        exit();
    }
    if ($zona === "ZonaUsuario" && $_SESSION["rol"] !== "ADMIN") {
            header("Location: gestion.php?Credenciales no suficientes");
            exit();
        }
}
?>