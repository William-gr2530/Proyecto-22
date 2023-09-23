
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

                                echo '<td> <a href="../../controller/examenController.php?Tipo=Eliminar&id='.$usuario['id'].'" name="btnEliminar" rol="buton" >eliminar</a> |
                                 <a href="../../view/Realizar/resultadosanalisis.php?id='.$usuario['id'].'&nombre='.$usuario['paciente'].'&resultado='.$usuario['resultado'].'" name="btnEliminar" rol="buton" >Ingresar Resultados</a> </td>';
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