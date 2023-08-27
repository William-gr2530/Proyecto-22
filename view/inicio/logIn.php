<?php
    function enviar(){
        header("Location: ./home.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
        <div class="container columna">
            <div class="card my-5">
                <div class="card-header">
                    <h2>Laboratorio Clinica 240</h2>
                </div>
                <div class="card-body ">
                    <div class="col-sm-3 my-5 mx-auto cbody">
                        <h4 >Inicio de sesion</h4>
                        <form action="../../controller/UsuarioController.php?Tipo?Tipo=Ingresar&" method="get">
                            <div class="mb-3">
                                <label for="txtuserName" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="IdUsuario" id="txtUserName" aria-describedby="helpId" placeholder="Ingrese su nombre de usuario" required="require">
                            </div>
                            <div class="mb-3">
                                <label for="txtPassword" class="form-label">Contraseña</label>
                                <input type="password"
                                    class="form-control" name="password" id="txtPassword" aria-describedby="helpId" placeholder="Ingrese su contraseña" required="require">
                            </div>
                            <div >
                                <button type="submit" class="btn btn-primary " name="Tipo" value="Ingresar">Iniciar sesión</button>
                            </div>
                        </form>

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