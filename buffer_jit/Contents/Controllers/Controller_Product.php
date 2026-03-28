<?php
session_start();
include "../Models/Productos.php";
$producto = new Productos();

if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case "crear":    
            break;
        case "modificar":
            break;
        case "eliminar":
            $producto->eliminarProducto($mysqli, $_POST['id_producto']);
            break;
    }
}