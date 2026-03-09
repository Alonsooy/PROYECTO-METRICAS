<?php
include "../Class/Usuarios.php";

$usuario = new Usuarios();

if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case "crear":
            $usuario-> crearUsuario();            
            break;
        case "modificar":
            $usuario->modificarUsuario();
            break;
        case "login":
            $usuario->login($mysqli, $_POST['usuario'], $_POST['password']);
            break;
        case "eliminar":
            $usuario->eliminarUsuario();
            break;
    }
}