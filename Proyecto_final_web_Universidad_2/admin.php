<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mi_estilo.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/estilo_admin.css">


</head>
<body>
<div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-white" href="index.php">
          <img src="img/logo.png" height="40px">
        </a>
        <form class="form-inline w-50">
          <input class="form-control w-75" placeholder="Busca tu producto">
          <button class="btn btn-success text-dark" style="background-color:#FCBA11">
            <img src="img/lupa.png" height="20px">
          </button>
        </form>
        <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav mr-auto"> <!-- mr-auto llena todo el espacio de la celda-->
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="desplegable" href="#">
              Infraestructura
              </a>
              <div class="dropdown-menu">
                <a>
                  <a  href="Infraestructura.php" class="dropdown-item">Fotos Infraestructura</a>
                </a>
              </div>
            </li>           
             <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="desplegable" href="#">
              Login
              </a>
              <div class="dropdown-menu">
                <a>
                  <a href="login.php" class="dropdown-item">Ingresar</a>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="desplegable" href="#">
              Mapa
              </a>
              <div class="dropdown-menu">
                <a>
                  <a href="Mapa.php" class="dropdown-item" href="#">Ver mapa</a>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="desplegable" href="#">
              Misión, visión y valores 
              </a>
              <div class="dropdown-menu">
                <a>
                  <a class="dropdown-item" href="Mision.php">Ver documentación</a>
                </a>
              </div>
            </li>
          </ul>
          </button>
        </div>
      </nav>




<!--------------------------------------------------------------------------------------------------->

    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Admin</h3>
            </div>
            <div class="card-body">

                <div class="col text-center">
                    <a href="admin_profesores.php" class="btn btn-primary btn-block btn-warning" >Profesores</a><br>
                </div>
                <div class="col text-center">
                    <a href="admin_estudiantes.php" class="btn btn-primary btn-block btn-warning">Estudiantes</a><br><br><br>
                </div>

                <form action='cerrar_sesion.php'>
                    <div class="col text-center">
                        <input type="submit" name="sesionDestroy" value="Cerrar sesion" class="btn btn-primary btn-block btn-danger"/>
                    </div> 
                </form>
                
            </div>
        </div>
    </div>
</div>
</body>










</html>