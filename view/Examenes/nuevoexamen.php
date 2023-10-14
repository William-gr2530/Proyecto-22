<!doctype html>
<html lang="en">
    <head>
        <title>Nuevo Tipo de Examen</title>
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
                    <h4 class="card-title texto">Nuevo Tipo Examen</h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/MedicamentoController.php" method="get">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="mb-3">
                                        <label for="txtNombreexamen" class="form-label">Nombre del Examen</label>
                                        <input type="text" class="form-control" name="Nombreexamen" id="txtNombreexamen"  placeholder="Ingrese el nombre del examen" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">Tipo Examen</label>
                                        <select class="form-select" name="Tipoexamen" id="txtTipoexamen" required>
                                            <option></option>
                                            <option value="Fluidos corporales">Fluidos corporales</option>
                                            <option value="Diacnostico po imagen">Diagnostico por imagen</option>
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
                                        <option></option>
                                        <option value="Sangre completa">Sangre completa</option>
                                        <option value="Saliba">Saliba</option>
                                        <option value="Heces">Heces</option>
                                        <option value="Orina">Orina</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="txtPrecio"  class="form-label">Precio</label>
                                    <input type="text" pattern="[0-9 .]+" maxlength="4" class="form-control" name="Precio" id="txtPrecio"  placeholder="Ingrese el precio" required>
                                </div>
                            </div>

                                </div>
                            
                            <div class="btnRegist">
                                <button type="submit" class="btn btn-primary" name="Tipo" value="Insertar">Registrar</button>
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