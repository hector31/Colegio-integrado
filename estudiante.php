<?php
include_once 'database.php';
include_once 'connect_database.php';
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Required meta tags -->
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

    <link rel="stylesheet" type="text/css" href="css/estilo_profesor.css">

    <title>Estudiante</title>
</head>
<body>
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




<div class="container">
    <h1 class="bg-warning">Estudiante</h1>
    <br>
    <div class="col text-right">
        <form action='cerrar_sesion.php'>
            <input class="btn btn-danger" type="submit" name="sesionDestroy" value="Cerrar sesion"/>
        </form>
    </div>
    
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td style="background-color:#0056ff; color:white; font-size:25px;">Id</td>
                            <td style="background-color:#0056ff; color:white; font-size:25px;">Materia</td>
                            <td style="background-color:#0056ff; color:white; font-size:25px;">Profesor</td>
                            <td style="background-color:#0056ff; color:white; font-size:25px;">Nota</td>
                        </tr>
                        
                        <?php
                            $username = $_SESSION["name_user"];
                            $name_student="SELECT * FROM estudiantes WHERE username='$username' ;";
                            $result3=mysqli_query($conn,$name_student);
                            $row3=mysqli_fetch_assoc($result3);
                            echo "<h2 class='text-white'>".$row3['nombre']." ".$row3['apellido']. "</h2>";
                            $contador=1;
                            $sql="SELECT * FROM materias WHERE usuario_estudiante='$username' ;";
                            $result=mysqli_query($conn,$sql);
                            $resultCheck=mysqli_num_rows($result);

                            if($resultCheck>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    $profesor=$row['profesor'];
                                    $sql2="SELECT * FROM profesores WHERE username='$profesor' ;";
                                    $result2=mysqli_query($conn,$sql2);
                                    $row2=mysqli_fetch_assoc($result2);
                                    echo "<tr> 
                                            <td style='background-color:#FFFFFF'>>" .$contador."</td>
                                            <td style='background-color:#FFFFFF'>>" .$row['materia_name']."</td>
                                            <td style='background-color:#FFFFFF'>>" .$row2['nombre']." ".$row2['apellido']."</td>
                                            <td style='background-color:#FFFFFF'>>" .$row['nota']."</td>
                                        </tr>";
                                        $contador++;
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>