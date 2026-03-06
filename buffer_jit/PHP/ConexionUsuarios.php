<?php
session_start();
require "ConexionBD.php";

function Usuarios($mysqli)
{

    $contarUsuarios = $mysqli->query("SELECT COUNT(*) AS cantidad FROM USUARIOS");
    $resultadoContar = $contarUsuarios->fetch_assoc();
    $cantidad = $resultadoContar['cantidad'];

    if ($cantidad > 0) {
        $sql = "SELECT U.ID_USUARIO, U.NOMBRE_USUARIO,U.CORREO,U.TELEFONO ,UR.ID_ROL, R.ROL
        FROM USUARIOS U LEFT JOIN usuario_rol UR ON U.ID_USUARIO = UR.ID_USUARIO
	    LEFT JOIN ROLES R ON UR.ID_ROL = R.ID_ROL";
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
                <td><a href="editar.php?id=<?php echo $medicamento['ID_USUARIO']; ?>" class="btn btn-success">Editar </a></td>
                <td><a href="eliminar.php?id=<?php echo $medicamento['ID_USUARIO']; ?>" class="btn btn-danger">Eliminar </a></td>
            </tr>
<?php }
    } else {
        echo '<tr>
                 <td>No se encontraron usuarios</td>
              </tr>';
    }
}
?>