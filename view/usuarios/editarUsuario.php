<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Open modal
</button>-->

<!doctype html>
<html lang="en">
  <head>
    <title>Editar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

  </head>
  <body>
  <div class="container">
            <div class="card">
                <div class="card-header">
                    <?php


include("../templates/header.php");

if(isset($_COOKIE["rol"])) {

 
if ($_COOKIE["rol"]=="Administrador")
{
  include("../templates/nav-bar.php");

}else if ($_COOKIE["rol"]=="Especialista") {
//para un nemu aparte
include("../templates/nav-bar3.php");

}else if ($_COOKIE["rol"]=="Recepcionista")
{
include("../templates/nav-bar2.php"); 
}else
{
header('Location: ../../view/inicio/No.php');
}
}else
{
header('Location: ../../view/inicio/login.php');
}
                    ?>
                </div>
                <div class="card-body">
                  <h4 class="card-title texto">Editar usuario</h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/UsuarioController.php" method="get" class="mx-auto">
                            <div class="row">

                                <div class="col-sm-5">
                                    <div class="mb-3">
                                      <label for="txtNumDocumento" class="form-label">Numero de documento</label>
                                      <input type="text" maxlength="12" pattern="[0-9]+" class="form-control" name="idUsuario" id="txtNumDocumento" value="<?php echo $_REQUEST['IdUsuario']?>" placeholder="Ingrese numero de documento" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtNombreUsuario" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="nombreUsuario" id="txtNombreUsuario" value="<?php echo $_REQUEST['nombreUsuario']?>" placeholder="Ingrese el nombe de usuario" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="txtDireccion" class="form-label">Dirección</label>
                                      <input type="text" class="form-control" name="direccion" id="txtDireccion" value="<?php echo $_REQUEST['direccionUsuario']?>" placeholder="Ingrese dirección" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="txtEstado" class="form-label">Estado</label>
                                      <select class="form-select" name="estado" id="txtEstado" required>
                                      <option value="<?php echo $_REQUEST['estadoUsuario']?>" selected><?php echo $_REQUEST['estadoUsuario']?> </option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="mb-3">
                                      <label for="txtTipoDocumento" class="form-label">Tipo de documento</label>
                                      <select class="form-select" name="tipoDocumento" id="txtTipoDocumento"  required>
                                      <option value="<?php echo $_REQUEST['tipoDocumento']?>" selected><?php echo $_REQUEST['tipoDocumento']?> </option>
                                       
                                        <option value="Dui">Dui</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="txtRol" class="form-label">Rol</label>
                                      <select class="form-select" name="rol" id="txtRol"  required >
                                        <option value="<?php echo $_REQUEST['rol']?>" selected><?php echo $_REQUEST['rol']?> </option>
                                        <option value="Recepcionista">Recepcionista</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Especialista">Especialista</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="txtTelefono" class="form-label">Teléfono</label>
                                      <input type="text" pattern="[0-9]+" maxlength="8" class="form-control" name="telefono" id="txtTelefono" value="<?php echo $_REQUEST['telefonoUsuario']?>" placeholder="Ingrese teléfono" required>
                                    </div>
                                    <div class="mb-3">
                                      <label for="txtContrasena" class="form-label">Contraseña</label>
                                      <input type="password" class="form-control" name="contrasena" id="txtContrasena" value="<?php echo $_REQUEST['clave']?>" placeholder="Ingrese la contraseña" required>
                                    </div>
                                </div>
                            </div>
                            <div class="btnRegist">
                              <button type="submit" class="btn btn-primary" name="Tipo" value="Actualizar" >Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                    include("../templates/footer.php");
                    ?>
                </div>
            </div>
        </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

