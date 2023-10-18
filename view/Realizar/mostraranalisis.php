
<!doctype html>
<html lang="en">
    <head>
      <title>Analisis</title>
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
                    <h4 class="card-title texto">Analisis</h4>
                    <div class="col-md-9">
                      <div class="mx-5">
                        
                        <form action="../../view/Realizar/mostraranalisis.php" method="get">
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
   
                    <table class="table table-hover my-5" id="tblBuscar">

                          <thead class="table-primary">
                            <tr>
                              <th>Id</th>
                              <th>Examen</th>
                              <th>Paciente</th>
                              <th>Medico</th>
                              <th>Fecha</th>
                              <th>Descuento</th>
                              <th>Resultado</th>
                              <th>Acciones</th>
                              <th><a href="../../view/fpdf/ReporteResultado.php?buscar=<?php echo $_REQUEST['buscar'];?>" target="_blank" class="btn btn-danger">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                     <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                   </svg></a></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              include("../../model/realizarModel.php");
                              $user = new realizarModel();
                              $Lista = $user->VerPruevas();


                              $buscar="";
                              $buscar=$_REQUEST['buscar'];
                            if ($buscar!=""){ 
  
                              $Lista = $user->Buscarexamen($buscar);
  
                            }else{ 
  
                              $Lista = $user->VerPruevas();
  
                            }
                      
                              foreach($Lista as $usuario){
                                echo '<tr>';
                                echo '<td scope="row">'.$usuario['id'].'</td>';
                                echo '<td scope="row">'.$usuario['examen'].'</td>';
                                echo '<td scope="row">'.$usuario['paciente'].'</td>';
                                echo '<td scope="row">'.$usuario['medico'].'</td>';
                                echo '<td scope="row">'.$usuario['Fecha'].'</td>';
                                echo '<td scope="row">'.$usuario['Descuento'].'%</td>';
                                echo '<td scope="row">'.$usuario['resultado'].'</td>';

                                echo '<td> <a href="../../controller/examenController.php?Tipo=Eliminar&id='.$usuario['id'].'" name="btnEliminar" rol="buton" class="btn btn-danger">Eliminar</a> |
                                           <a href="../../view/Realizar/resultadosanalisis.php?id='.$usuario['id'].'&nombre='.$usuario['paciente'].'&resultado='.$usuario['resultado'].'" name="btnEliminar" rol="buton" class="btn btn-primary" >Ingresar Resultados</a> |
                                           <a href="../../view/fpdf/ResultadoExamen.php?paciente='.$usuario['paciente'].'&examen='.$usuario['examen'].'&fecha='.$usuario['Fecha'].'&resultado='.$usuario['resultado'].'" target="_blank" class="btn btn-danger">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                             <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                           </svg></a>
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