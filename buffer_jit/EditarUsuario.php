<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar medicamentos</title>

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
            <h2>Actualizar Usuario</h2>
    </div>

    <div class="card-body">
        <form  action="" method="GET" class=" text-center  ">
             <div class="form-group row">
                    <label class="col-sm-3 col-form-label"  for="id" > ID: </label> 
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id" placeholder="Escribe el id" maxlength="100" name="id" value="" readonly  required> 
                    </div>
              </div>
                <div class="form-group row"  >
                    <label class="col-sm-3 col-form-label"  for="nombre"> Nombre: </label> 
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" placeholder="Escribe el nombre del medicamento" maxlength="300" name="nombre" value=""  required> 
                    </div>                             
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="categoria"> Correo: </label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="categoria" placeholder="Escribe el nombre de la categoria" maxlength="100" name="categoria" value="" required> 
                    </div>
                </div>  
                                
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="cantidad"> Telefono: </label>
                    <div class="col-sm-9">
                     <input type="text" class="form-control" id="cantidad" placeholder="Escribe la cantidad" maxlength="100" name="cantidad" value="" required> 
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label" for="proveedor_id"> Rol: </label>
                    <div class="col-sm-9">
                    <select  class="form-control" name="proveedor_id"  required>
                          <option> Seleccione un proveedor </option>                           
                          </option>   
                    </select>
                    </div>
                </div> 
              
                <div class="text-center form-group row mx-auto">
                    <div class="col-sm-12 text-center">
                    <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                    <button type="submit" class="btn btn-info"  onclick="return confirm('¿Desea actualizar este medicamento?');">Actualizar</button>
                    </div>
                </div>
            
            
            </form>
            <div class="d-flex justify-content-between">
                <a href="panel.php" class="btn btn-outline-primary">Volver al Panel</a>
                <a href="../logout.php" class="btn btn-outline-danger">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>
     
</body>
</html>