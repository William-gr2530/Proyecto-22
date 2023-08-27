<nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="../inicio/home.php">
          <img src="../../img/logoLab.png" alt="Avatar Logo" style="width:50px;" class="rounded-pill"> 
        </a>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Examenes</a>
                <ul class="dropdown-menu">
                  
                  
                  <li><a class="dropdown-item" href="../Examenes/mostrarexamen.php?buscar=&Tipo=">Mostrar Examenes</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pacientes</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Paciente/nuevopaciente.php">Nuevo Paciente</a></li>
                  <li><a class="dropdown-item" href="../Paciente/mostrarpaciente.php?buscar=&Tipo=">Mostrar Paciente</a></li>
                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Analisis</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Realizar/mostraranalisis.php?buscar=&Tipo=">Ver Analisis</a></li>
                  <li><a class="dropdown-item" href="../Paciente/mostrarpaciente.php?buscar=&Tipo=">Agregar analisis</a></li>
                  
                </ul>
              </li>
            </ul>
            <form class="d-flex">
            <a href="../../cookie-e.php" class="btn btn-primary ">Cerrar Sesión</a>
             
            </form>
          </div>
        </div>
      </nav>

      