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
            $sql = "CALL PA_USUARIOS_JSON(
                        JSON_OBJECT('http_method','GET'),
                        JSON_OBJECT()
                    );";
            $result = $mysqli->query($sql);
        }

        if ($cantidad > 0) {
            while ($usuario = $result->fetch_assoc()) {
                $nombreUsuario = $usuario['NOMBRE_USUARIO'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['ID_USUARIO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['NOMBRE_USUARIO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['ROL']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['CORREO']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['TELEFONO']); ?></td>
                    <td>
                        <a href="EditarUsuario.php" class="btn btn-success">Editar</a>
                    </td>
                    <td>
                        <form action="Contents/Controllers/Controller_Users.php" method="POST">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id_usuario"  id="id_usuario" value="<?php echo $usuario['ID_USUARIO'];?>">
                            <button class="btn btn-danger"  onclick="return confirm('¿Desea eliminar este Usauario?');" type="submit">Eliminar</button>
                        </form>
                    </td>
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
            $_SESSION["uid"] = $usuario["ID_USUARIO"];
            $_SESSION["rol"] = $usuario["ROL"];
            header("Location: ../../gestion.php");
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos.'); window.location='../../index.php';</script>";
            exit();
        }
    }

    function crearUsuario($mysqli,$usuario,$password,$correo,$telefono,$rol){

    $stmt = $mysqli->prepare("CALL PA_USUARIOS_JSON(?, ?)");

    $http_method = json_encode([
        "http_method" => "POST"
    ]);

    $params = json_encode([
        "NOMBRE_USUARIO" => $usuario,
        "CORREO" => $correo,
        "PASSWORD_USER" => $password,
        "TELEFONO" => $telefono,
        "ID_ROL" => $rol
    ]);

    $stmt->bind_param("ss", $http_method, $params);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $data = $resultado->fetch_assoc();
    $stmt->close();
    $respuesta = $data["RESULT"];
    header("Location: ../../usuarios.php?mensaje=" . urlencode($respuesta));
    exit();
}

    function modificarUsuario(){

    } 

    function eliminarUsuario($mysqli,$IdUsuario){
        $stmt = $mysqli->prepare("CALL PA_USUARIOS_JSON(
                                    JSON_OBJECT('http_method','DEL'),
                                    JSON_OBJECT('ID_USUARIO',?)
                                )");

        $stmt->bind_param("i", $IdUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $data = $resultado->fetch_assoc();
        $stmt->close();
        $respuesta = $data["RESULT"];
        header("Location: ../../usuarios.php?mensaje=" . urlencode($respuesta));
    }
}
