<?php
$mysqli = new mysqli("localhost", "root", "", "buffer_jit");
if ($mysqli->connect_errno) {
die("Error de conexión:" . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4"); 
?>
