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
                        <div class="row">
                          <div class="col-sm-5">
                            <input type="text" class="form-control d-flex" name="buscarMedic" id="txtBuscarMedic" aria-describedby="helpId" placeholder="Búsqueda de Examenes">
                          </div>
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary" id="btnBuscarMedicamento">Buscar</button>
                          </div>
                        </div>
                        
                      </div>      
                    </div>
                    <table class="table table-hover my-5" id="tblBuscar">
                        <thead class="table-primary">
                            <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              
                              <th>Tipo</th>
                              <th>Precio</th>
                              <th>Muestra</th>

                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            include("../../model/examenModel.php");
                            $medic = new examenModel();
                            $Lista = $medic->Verexamen();

                            foreach($Lista as $med){
                              echo '<tr>';
                              echo '<td>'.$med['id'].'</td>';
                              echo '<td>'.$med['nombre'].'</td>';
                             
                              echo '<td>'.$med['tipoexamen'].'</td>';
                              echo '<td>'.$med['precio'].'</td>';
                              echo '<td>'.$med['tipomuestra'].'</td>';
                             
                              echo '<td><a href="editarexamenes.php?id='.$med['id'].'&nombre='.$med['nombre'].'&tipoexamen='.$med['tipoexamen'].'&precio='.$med['precio'].'&tipomuestra='.$med['tipomuestra'].'">Editar</a> | <a href="../../controller/MedicamentoController.php?Tipo=Eliminar&id='.$med['id'].'">eliminar</a></td>';
                              echo '</td>';
                            }
                          ?>
                          
                        </tbody>
                    </table>
                    <tbody>
                      <tr>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarMedic">Editar
                        </a></td>
                      </tr>
                    </tbody>
 
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