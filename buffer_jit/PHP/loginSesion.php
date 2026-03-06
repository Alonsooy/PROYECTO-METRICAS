<?php
session_start();
require "ConexionBD.php";

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $mysqli->prepare("SELECT * FROM USUARIOS WHERE NOMBRE_USUARIO = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario && $password === $usuario["PASSWORD_USER"]) {
session_regenerate_id(true);
    $_SESSION["usuario"] = $usuario["NOMBRE_USUARIO"];
    $_SESSION['uid'] = $usuario['ID_USUARIO'];
   header("Location: ../usuarios.php");
   exit();
}
 else
        {
             echo "<script>alert('Usuario o contraseña incorrectos.'); window.location='../gestion.php';</script>";
    exit();
        }
?>
