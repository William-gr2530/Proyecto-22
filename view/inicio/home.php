<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>

    <div class="container contenedor">
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
        <div class="card-body homecbody">
          
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="../templates/fun.js"></script>
  </body>

</html>