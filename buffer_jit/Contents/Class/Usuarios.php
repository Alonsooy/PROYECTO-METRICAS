<?php
require_once "ConexionBD.php";
class Usuarios
{
    private $IdUsuario = 0;
    function obtenerUsuarios($mysqli)
    {

        $contarUsuarios = $mysqli->query("SELECT COUNT(1) AS cantidad FROM USUARIOS");
        $resultadoContar = $contarUsuarios->fetch_assoc();
        $cantidad = $resultadoContar['cantidad'];

        if ($cantidad > 0) {
            $sql = "CALL USUARIOS(
                        JSON_OBJECT('HTTP_METHOD', 'GET'),
                        JSON_OBJECT()
                    )";
            $result = $mysqli->query($sql);
        }

        if ($cantidad > 0) {
            while ($usuario = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['ID_USUARIO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['NOMBRE_USUARIO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['ROL']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['CORREO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['TELEFONO']); ?></td>
                    <td><a href="editar.php?id=<?php echo $usuario['ID_USUARIO']; ?>" class="btn btn-success">Editar </a></td>
                    <td><a href="eliminar.php?id=<?php echo $usuario['ID_USUARIO']; ?>" class="btn btn-danger">Eliminar </a></td>
                </tr>
                <?php }
        } else {
            echo '<tr>
                 <td>No se encontraron usuarios</td>
                </tr>';
        }
    }

    function login($mysqli, $username, $password)
    {
        $stmt = $mysqli->prepare("SELECT U.NOMBRE_USUARIO, U.PASSWORD_USER ,R.ROL
	                            FROM USUARIOS U
                                    LEFT JOIN USUARIO_ROL UR ON U.ID_USUARIO = UR.ID_USUARIO
	                                LEFT JOIN ROLES R ON UR.ID_ROL = R.ID_ROL 
                                WHERE NOMBRE_USUARIO = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && $password === $usuario["PASSWORD_USER"]) {
            session_regenerate_id(true);
            $_SESSION["usuario"] = $usuario["NOMBRE_USUARIO"];
            $_SESSION['uid'] = $usuario['ID_USUARIO'];
            $_SESSION["rol"] = $usuario["rol"];
            header("Location: ../../gestion.php");
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos.'); window.location='../../index.php';</script>";
            exit();
        }
    }

    function crearUsuario(){

    }

    function modificarUsuario(){
    
    } 

    function eliminarUsuario(){
        
    }
}
