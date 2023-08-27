<!doctype html>
<html lang="en">
    <head>
        <title>Editar Examen</title>
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
                    <h4 class="card-title texto">Editar Examen de ID: <?php echo $_REQUEST['id']?></h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/MedicamentoController.php" method="get">
                            <div class="row">
                                <div class="col-sm-5">
                                <div class="mb-3">
                                        <label for="txtNombreexamen" class="form-label">Id</label>
                                        <input type="text" class="form-control" name="id" id="txtid" value="<?php echo $_REQUEST['id']?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtNombreexamen" class="form-label">Nombre del Examen</label>
                                        <input type="text" class="form-control" name="Nombreexamen" id="txtNombreexamen" value="<?php echo $_REQUEST['nombre']?>" placeholder="Ingrese el nombre del examen" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">Tipo Examen</label>
                                        <select class="form-select" name="Tipoexamen" id="txtTipoexamen" required>
                                        <option value="<?php echo $_REQUEST['tipoexamen']?>" selected><?php echo $_REQUEST['tipoexamen']?></option>
                                            <option value="Fluidos corporales">Fluidos corporales</option>
                                            <option value="Diacnostico po imagen">Diacnostico po imagen</option>
                                            <option value="Endoscopia">Endoscopia</option>
                                            <option value="Biopsia">Biopsia</option>
                                            <option value="Material genetico">Material genetico</option>                                      
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-5">
                                <div class="mb-3">
                                        <label for="txtTipomuestra" class="form-label">Tipo de muestra</label>
                                        <select class="form-select" name="Tipomuestra" id="txtTipomuestra" required>
                                        <option value="<?php echo $_REQUEST['tipomuestra']?>" selected><?php echo $_REQUEST['tipomuestra']?></option>
                                            <option value="Sangre completa">Sangre completa</option>
                                            <option value="Saliba">Saliba</option>
                                            <option value="Heces">Heces</option>
                                            <option value="Orina">Orina</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtCodigo" class="form-label">Codigo de examen</label>
                                        <input type="text" maxlength="8" pattern="[0-9]+" class="form-control" name="Codigo" id="txtCodigo" value="<?php echo $_REQUEST['codigo']?>" placeholder="Asigne un codigo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtPrecio" class="form-label">Precio</label>
                                        <input type="text" maxlength="4" pattern="[0-9 .]+" class="form-control" name="Precio" id="txtPrecio" value="<?php echo $_REQUEST['precio']?>" placeholder="Ingrese el precio" required>
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