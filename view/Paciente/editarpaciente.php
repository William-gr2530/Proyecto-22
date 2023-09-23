<!doctype html>
<html lang="en">
    <head>
        <title>Editar Paciente</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                <h4 class="card-title texto">Editar Paciente de ID: <?php echo $_REQUEST['nombre']?></h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/pacienteController.php" method="get">
                            <div class="row">
                            <div class="mb-3">
                                        <label for="txtId" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="txtId"  value="<?php echo $_REQUEST['id']?> " readonly>
                                    </div>
                                <div class="col-sm-5">
                                    <div class="mb-3">
                                        <label for="txtNombreexamen" class="form-label">Nombre del Paciente</label>
                                        <input type="text" class="form-control" name="Nombrepaciente" id="txtNombrepaciente"  value="<?php echo $_REQUEST['nombre']?> "required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">Edad</label>
                                        <input type="text" class="form-control" maxlength="3" name="edad" id="txtEdad" pattern="[0-9]+" value="<?php echo $_REQUEST['edad']?>"required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipomuestra" class="form-label">Telefono</label>
                                        <input type="text" class="form-control" maxlength="8" name="telefono" id="txttelefono" pattern="[0-9]+" value="<?php echo $_REQUEST['telefono']?>" placeholder="Ingrese el telefono del paciente" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="mb-3">
                                        <label for="txtCodigo" class="form-label">Persona de contacto</label>
                                        <input type="text" class="form-control" name="contacto" id="txtContacto" value="<?php echo $_REQUEST['contacto']?>" placeholder="Ingrese una persona de contacto" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtdirecion" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" name="direccio" id="txtDireccion" value="<?php echo $_REQUEST['direccion']?>" placeholder="Ingrese la direccion del paciente" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtdui" class="form-label">Dui</label>
                                        <input type="text" class="form-control" maxlength="9" name="dui" id="txtDui"  pattern="[0-9]+" value="<?php echo $_REQUEST['dui']?>" placeholder="Ingrese la dui del paciente" required>
                                    </div>

                                </div>
                            </div>
                            <div class="btnRegist">
                                <button type="submit" class="btn btn-primary" name="Tipo" value="Actualizar">Registrar</button>
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