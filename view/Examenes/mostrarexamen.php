<!doctype html>
<html lang="en">
  <head>
    <title>Examenes</title>
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
                    <h4 class="card-title texto">Examenes</h4>
                    <div class="col-md-9">
                      <div class="mx-5">
                      <form action="../../view/Examenes/mostrarexamen.php" method="get">
                        <div class="row">
                          <div class="col-sm-5">
                            <input type="text" class="form-control d-flex" name="buscar" id="txtBuscarMedic" aria-describedby="helpId" placeholder="Búsqueda por nombre">
                          </div>
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary" id="btnBuscarMedicamento" name="Tipo" value="Buscar">Buscar</button>
                          </div>
                        </div>
                       </form>
                      </div>      
                    </div>
                    <br>
                    <table class="table table-hover table-dark" id="tblBuscar">
                        <thead class="table-primary">
                            <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              
                              <th>Tipo</th>
                              <th>Precio</th>
                              <th>Muestra</th>
                              <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            include("../../model/examenModel.php");
                            $medic = new examenModel();
                            $Lista = $medic->Verexamen();
      

                           $buscar="";
                            $buscar=$_REQUEST['buscar'];
                          if ($buscar!=""){ 

                            $Lista = $medic->Buscarexamen($buscar);

                          }else{ 

                            $Lista = $medic->Verexamen();

                          }
                            foreach($Lista as $med){
                              echo '<tr>';
                              echo '<td>'.$med['id'].'</td>';
                              echo '<td>'.$med['nombre'].'</td>';
                              
                              echo '<td>'.$med['tipoexamen'].'</td>';
                              echo '<td>'.$med['precio'].'</td>';
                              echo '<td>'.$med['tipomuestra'].'</td>';
                             
                              echo '<td><a href="../../controller/MedicamentoController.php?Tipo=Eliminar&id='.$med['id'].'" class="btn btn-danger">                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                              </svg>
                              </a>
                              |<a href="editarexamenes.php?id='.$med['id'].'&nombre='.$med['nombre'].'&tipoexamen='.$med['tipoexamen'].'&precio='.$med['precio'].'&tipomuestra='.$med['tipomuestra'].'" class="btn btn-success">Editar</a> 
                               
                              </td>';
                              echo '</td>';
                            }
                          ?>
                        
                        </tbody>
                    </table>

 
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