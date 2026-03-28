<?php
require_once "ConexionBD.php";

class Productos{
    function obtenerProductos($mysqli)
    {

        $contarProductos = $mysqli->query("SELECT COUNT(1) AS cantidad FROM PRODUCTO");
        $resultadoContar = $contarProductos->fetch_assoc();
        $cantidad = $resultadoContar['cantidad'];

        if ($cantidad > 0) {
            $sql = "CALL PA_PRODUCTOS_JSON(
                        JSON_OBJECT('http_method','GET'),
                        JSON_OBJECT('ID_PRODUCTO',0)
                    );";
            $result = $mysqli->query($sql);
        }

        if ($cantidad > 0) {
            while ($producto = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['ID_PRODUCTO']); ?></td>
                    <td><?php echo htmlspecialchars($producto['NOMBRE_PRODUCTO']); ?></td>
                    <td><?php echo htmlspecialchars($producto['CODIGO_PRODUCTO']); ?></td>
                    <td><?php echo htmlspecialchars($producto['VALOR_UNITARIO']); ?></td>
                    <td><?php echo htmlspecialchars($producto['STOCK_ACTUAL']); ?></td>
                    <td><?php echo htmlspecialchars($producto['CATEGORIA_ABCD']); ?></td>
                    <td><?php echo htmlspecialchars($producto['NOMBRE_PROVEEDOR']); ?></td>
                    <?php 
                            if ($_SESSION["rol"] === "ADMIN") { ?>
                                <td>
                                    <a href="EditarProducto.php" class="btn btn-success">Editar</a>
                                </td>
                                <td>
                                    <form action="Contents/Controllers/Controller_Product.php" method="POST">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="id_producto"  id="id_producto" value="<?php echo $producto['ID_PRODUCTO'];?>">
                                        <button class="btn btn-danger"  onclick="return confirm('¿Desea eliminar este Producto?');" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            <?php } ?> 
                    </tr>
                    <?php }
        } else {
            echo '<tr>
                 <td>No se encontraron usuarios</td>
                </tr>';
        }

        /*
        CASE 
            WHEN (P.VALOR_UNITARIO * IFNULL(I.STOCK_ACTUAL,0)) >= 1000 THEN 'A'
            WHEN (P.VALOR_UNITARIO * IFNULL(I.STOCK_ACTUAL,0)) >= 500 THEN 'B'
            WHEN (P.VALOR_UNITARIO * IFNULL(I.STOCK_ACTUAL,0)) >= 100 THEN 'C'
            ELSE 'D'
        END AS CATEGORIA_ABCD
        */
    }
    function eliminarProducto($mysqli, $idProducto){
        echo "Id producto: " . $idProducto;
    }
}