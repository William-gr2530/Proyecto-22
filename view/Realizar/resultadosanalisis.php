<!doctype html>
<html lang="en">
    <head>
        <title>Ingresar resultados</title>
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
                <h4 class="card-title texto">Ingrezar resultados del paciente: <?php echo $_REQUEST['nombre']?></h4>
                    <div class="col-md-9 formulario">
                        <form action="../../controller/examenController.php" method="get">
                            <div class="row">

                            <div class="mb-3">
                                        <label for="txtIdexamen" class="form-label">ID</label>
                                        <input type="text" class="form-control" name="id" id="txtIdexamen" value="<?php echo $_REQUEST['id']?> " readonly>
                                    </div>



                                    <div class="mb-3">
                                        <label for="txtId" class="form-label">Resultados del examen</label>
                                        <textarea name="comentarios" rows="5" cols="5" type="text" class="form-control" id="txtId"  required><?php echo $_REQUEST['resultado']?></textarea>
                                    </div>

                            
                            <div class="btnRegist">
                                <button type="submit" class="btn btn-primary" name="Tipo" value="Actualizar" >Registrar</button>
                            </div>
                     
                        </form>

                        <form class="d-flex">
                    <a href="../Realizar/mostraranalisis.php?buscar=&Tipo=" class="btn btn-primary ">Cancelar</a>
                  </form>

                            </div>
                    

                    </div>

 <!-- href="../whapp/whap.php" target="_blank"--->
 <!-- Envio del notificasion de los examenes --->
 <?php
                                    include("../../model/realizarModel.php");
                                    $user = new realizarModel();
                                  
                              $Enviar="";
                              $Enviar=$_REQUEST['nombre'];
                              if ($Enviar!=""){ 
                              $Lista = $user->EnviarResultado($Enviar);
                              foreach($Lista as $usuario){
                                echo '<a href="../whapp/whap.php?telefono='.$usuario['telefono'].'" target="_blank" class="btn btn-warning">Notificar resultados</a>';

                               }
                            }
                            
                    ?>




                <div class="card-footer">
                    <?php
                    include("../templates/footer.php");
                    ?>
                
            </div>
        </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
