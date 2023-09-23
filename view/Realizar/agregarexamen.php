<!doctype html>
<html lang="en">
    <head>
        <title>Realizar Examen</title>
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
                    <h4 class="card-title texto">Realizar Examen</h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/examenController.php" method="get">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="mb-3">
                                        <label for="txtIdexamen" class="form-label">ID Examen</label>
                                        <input type="text" class="form-control" name="idexamen" id="txtIdexamen" value="<?php echo $_REQUEST['idexamen']?> "readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">ID Cliente</label>
                                        <input type="text" class="form-control" name="idpaciente" id="txtIdcliente" value="<?php echo $_REQUEST['idpaciente']?> " readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">ID Medico</label>
                                        <input type="text" class="form-control" name="idmedico" id="txtIdcliente" value="<?php echo $_REQUEST['idmedico']?> " readonly>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                <div class="mb-3">
                                        <label for="txtTipoexamen" class="form-label">Fecha</label>
                                        <input type="text" class="form-control" name="fecha" id="txtIdcliente" value="<?php date_default_timezone_set("America/El_Salvador"); echo date("d/m/Y h:i");?> " readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtPago" class="form-label"><h3>Monto a pagar: <?php echo $_REQUEST['precio']?></h3> </label>
                                        <select class="form-select" name="des" id="txtTipomuestra" required>
                                        <option></option>
                                        <option value="10">10%</option>
                                        <option value="15">15%</option>
                                        <option value="20">20%</option>
                                        <option value="0" selected>0%</option>
                                    </select>
                                    
                                    <label for="txtPago" class="form-label"><h3>Monto a pagar con descuento: <?php //$precio=$_REQUEST['precio']  $des=$_REQUEST['des']; echo $precio-($precio*$des) ?></h3> </label>   
                                        
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