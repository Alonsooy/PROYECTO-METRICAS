<?php
session_start();
include "../Models/Usuarios.php";
$usuario = new Usuarios();

if(isset($_POST['accion'])){
    switch($_POST['accion']){
        case "crear":
            if (!isset($_POST['rol']) || $_POST['rol'] === '') {
                echo "Debe seleccionar un rol";
            }
            if (isset($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['password'], $_POST['rol'])) {
                $usuario->crearUsuario($mysqli, $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['password'], $_POST['rol']);           
            }      
            break;
        case "modificar":
            $usuario->modificarUsuario();
            break;
        case "login":
            $usuario->login($mysqli, $_POST['usuario'], $_POST['password']);
            break;
        case "eliminar":
            $usuario->eliminarUsuario($mysqli, $_POST['id_usuario']);
            break;
    }
}