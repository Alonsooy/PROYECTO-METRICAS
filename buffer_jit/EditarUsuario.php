<?php
session_start();
require "ConexionBD.php";

$nombre= "";
$correo = "";
$telefono = "";
$id_usuario = "";
$rol = "";
$mensaje = "";

if(isset($_GET['ID_USUARIO'])){
    $id_usuario = $_GET['ID_USUARIO'];
}

if(isset($_POST['ID_USUARIO'])){
    $id_usuario = $_POST['ID_USUARIO'];
    $nombre = $_POST['NOMBRE_USUARIO'];
    $rol = $_POST['ID_ROL'];
    $correo = $_POST['CORREO'];
    $telefono = $_POST['TELEFONO'];

    $existenciaUsuario = $mysqli->prepare("SELECT ID_USUARIO FROM USUARIOS WHERE NOMBRE_USUARIO = ? AND ID_USUARIO != ?");
    $existenciaUsuario->bind_param("si", $nombre, $id_usuario);
    $existenciaUsuario->execute();
    $existenciaUsuario->store_result();

    if($existenciaUsuario->num_rows > 0){
        $mensaje = "Ya existe un usuario con ese nombre";
    } else {

        $stmt = $mysqli->prepare("UPDATE USUARIOS SET NOMBRE_USUARIO = ?, CORREO = ?, TELEFONO = ? WHERE ID_USUARIO = ?");
        $stmt->bind_param("sssi", $nombre, $correo, $telefono, $id_usuario);

        $stmt2 = $mysqli->prepare("UPDATE USUARIO_ROL SET ID_ROL = ? WHERE ID_USUARIO = ?");
        $stmt2->bind_param("ii", $rol, $id_usuario);

        if($stmt->execute() && $stmt2->execute()){
            $mensaje = "Usuario actualizado correctamente";
        } else {
            $mensaje = "Error al actualizar el usuario";
        }

        $stmt->close();
        $stmt2->close();
    }
}

if(!empty($id_usuario)){
    $stmt = $mysqli->prepare("
        SELECT U.NOMBRE_USUARIO, U.CORREO, U.TELEFONO, UR.ID_ROL
        FROM USUARIOS U
        LEFT JOIN usuario_rol UR ON U.ID_USUARIO = UR.ID_USUARIO
        WHERE U.ID_USUARIO = ?
    ");

    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if($user = $result->fetch_assoc()){
        $nombre = $user['NOMBRE_USUARIO'];
        $correo = $user['CORREO'];
        $telefono = $user['TELEFONO'];
        $rol = $user['ID_ROL'];
    }

    $stmt->close();
}

$roles = $mysqli->query("SELECT ID_ROL, ROL FROM ROLES");
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuarios</title>

    <style>
        body {
            background-color: #f8f9fa; 
        }
        .register-container {
            margin-top: 50px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        .card-header-custom {
            background-color: #1eb9d4ff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
        }
        .form-label-custom {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container register-container">
    <div class="card shadow-lg border-0 rounded-lg bg-white">

    <div class="card-header card-header-custom rounded-top-lg">
            <h2>Actualizar Usuarios</h2>
    </div>

    <div class="card-body">
        <form  action="" method="POST" class=" text-center  ">
            <?php if(!empty($mensaje)) { ?>
                <div class = "alert alert-success text-center " role="alert">
                <?php echo htmlspecialchars($mensaje);?>
                </div>
                <?php } ?>
             <div class="form-group row">
                    <label class="col-sm-3 col-form-label"  for="id" > ID: </label> 
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id" placeholder="Escribe el id" maxlength="100" name="ID_USUARIO" value="<?php echo $id_usuario;?>" readonly  required> 
                    </div>
              </div>
                <div class="form-group row"  >
                    <label class="col-sm-3 col-form-label"  for="nombre"> Nombre usuario: </label> 
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" placeholder="Escribe el nombre del Usuario" maxlength="300" name="NOMBRE_USUARIO" value="<?php echo $nombre;?>"  required> 
                    </div>              
                    
                </div>
                                
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="cantidad"> Correo: </label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="cantidad" placeholder="Escribe la cantidad" maxlength="100" name="CORREO" value="<?php echo $correo;?>" required> 
                    </div>
                </div>
                 <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="precio"> Telefono: </label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="precio" placeholder="Escribe la cantidad" maxlength="100" name="TELEFONO" value="<?php echo $telefono;?>" required> 
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"> Rol: </label>
                    <div class="col-sm-9">
                    <select  class="form-control" name="ID_ROL" required>
                          <option> Seleccione un ROL </option> 
                           <?php while($row = $roles ->fetch_assoc()){ ?>  
                          <option value="<?php echo $row['ID_ROL'];?>"
                            <?php if($row['ID_ROL'] == $rol) echo "selected"; ?>>
                            <?php echo $row['ROL'];?>
                          </option>   
                          <?php } ?>
                    </select>
                    </div>
                </div> 
              
                <div class="text-center form-group row mx-auto">
                    <div class="col-sm-12 text-center">
                    <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                    <button type="submit" class="btn btn-info"  onclick="return confirm('¿Desea actualizar este usuario?');">Actualizar</button>
                    </div>
                </div>
            
            
            </form>
            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-outline-primary">Volver al Panel</a>
                <a href="" class="btn btn-outline-danger">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>
     
</body>
</html>