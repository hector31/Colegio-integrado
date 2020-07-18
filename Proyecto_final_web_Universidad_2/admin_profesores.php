
<?php
include_once 'database.php';
include_once 'connect_database.php';
session_start();
    if(isset($_GET['materia'])){
        $materia = $_GET['materia']; //some_value
    }
    
    if(isset($_POST['actualizar'])){
        $profesor_apellido=$_POST['profesor_apellido'];
        $profesor_nombre=$_POST['profesor_nombre'];
        $profesor_usuario=$_POST['username_profesor'];
        $last_profesor_usuario=$_POST['last_username_profesor'];
        $profesor_password=$_POST['profesor_password'];
        
        
        
        $queryUpdate = "UPDATE profesores SET nombre = '$profesor_nombre',
                        apellido = '$profesor_apellido'
                        WHERE username = '$last_profesor_usuario';";
                        
        $queryUpdate2 = "UPDATE usuarios SET username = '$profesor_usuario',
        password = '$profesor_password'
        WHERE username = '$last_profesor_usuario';";

 
         $resultUpdate = mysqli_query($conn, $queryUpdate); 
         $resultUpdate2 = mysqli_query($conn, $queryUpdate2); 
    
         if($resultUpdate&&$resultUpdate2)
         {
            echo "<strong>El registro fue exitoso</strong>. <br>";
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
    }
    if(isset($_POST["actualizar_materia"])){
        $last_profesor_materia=$_POST['elim_profesor_materia'];
        $act_profesor_materia=$_POST['profesor_materia'];
        $act_profesor_username=$_POST['elim_profesor_username'];
        $queryUpdate = "UPDATE materias_profesor SET materia_name = '$act_profesor_materia'
        WHERE profesor = '$act_profesor_username' AND materia_name='$last_profesor_materia';";
        
        $queryUpdate2 = "UPDATE materias SET materia_name = '$act_profesor_materia'
        WHERE profesor = '$act_profesor_username' AND materia_name='$last_profesor_materia';";
        $resultUpdate = mysqli_query($conn, $queryUpdate); 
        $resultUpdate2 = mysqli_query($conn, $queryUpdate2); 
        if($resultUpdate)
        {
           echo "<strong>El registro fue exitoso</strong>. <br>";
        }
        else
        {
           echo "No se pudo actualizar el registro. <br>";
           
        }
    }
    if(isset($_POST['agregar_profesor'])){
        $new_profesor_apellido=$_POST['new_profesor_apellido'];
        $new_profesor_nombre=$_POST['new_profesor_nombre'];
        $new_profesor_usuario=$_POST['new_profesor_usuario'];
        $new_profesor_contrasena=$_POST['new_profesor_contraseña'];
        $new_profesor_materia=$_POST['new_profesor_materia'];
        
        
        $sql = "INSERT INTO usuarios (username,password, rol_id)
        VALUES ('$new_profesor_usuario', '$new_profesor_contrasena', '1')";
        
        $sql2 = "INSERT INTO profesores (nombre,apellido, username)
        VALUES ('$new_profesor_nombre', '$new_profesor_apellido', '$new_profesor_usuario')";

        if($new_profesor_materia!='' ){
            $sql3 = "INSERT INTO materias_profesor (materia_name,profesor)
            VALUES ('$new_profesor_materia', '$new_profesor_usuario')";
        }
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        if($new_profesor_materia!=''){

        if ($conn->query($sql3) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        }    

    }

    if(isset($_POST['agregar'])){
        $profesor_usuario=$_POST['username_profesor'];
        $new_profesor_materia=$_POST['new_profesor_materia'];
        
        $sql = "INSERT INTO materias_profesor (materia_name, profesor)
        VALUES ('$new_profesor_materia', '$profesor_usuario')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if(isset($_POST['eliminar_profesor'])){
        $profesor_usuario=$_POST['username_profesor'];
        
        $sql = "DELETE FROM usuarios WHERE username='$profesor_usuario'";
        
        if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }


    if(isset($_POST['eliminar'])){
        $elim_profesor_materia=$_POST['elim_profesor_materia'];
        $elim_profesor_username=$_POST['elim_profesor_username'];      
        
        $sql = "DELETE FROM materias_profesor WHERE profesor='$elim_profesor_username' AND materia_name='$elim_profesor_materia'" ;
        $sql2 = "DELETE FROM materias WHERE profesor='$elim_profesor_username' AND materia_name='$elim_profesor_materia'" ;

        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . $conn->error;
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
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url(css/img/adm1.png);  
            background-size:1500px 800px;
        }

        tr:nth-child(even)
        {
            background-color:white;
        }

        tr:nth-child(odd)
        {
            background-color:#eee;
        }
    </style>

    
    <title>Admin Estudiantes</title>
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



<!------------------------------------------------------------------------------------>




    <div class="container tablas">
        <h1>Administrador</h1>
        <div class="col text-left">
            <a href="admin.php" class="btn btn-warning">Inicio</a>
            <a href="admin_estudiantes.php" class="btn btn-warning">Estudiantes</a>
        </div>
        <div class="col text-right">
            <form action='cerrar_sesion.php'>
                <input type="submit" name="sesionDestroy" value="Cerrar sesion" class="btn btn-danger" />
            </form>
        </div>    
    
        <div class="row ">
            <div class="col-md-12 col-md-offset-2">
                <div class="table-responsive">
                    <table class="table  table-bordered table-sm">
                        <thead>
                            <tr>
                                <td style="background-color:#0056ff">Id</td>
                                <td style="background-color:#0056ff">Datos</td>
                                <td style="background-color:#0056ff">Materias</td>
                            </tr>
                            <tr>
                                <form method='post'>
                                    <td>New</td>
                                    <td><table class="table">
                                    <tr><td>Apellido: <br><input type='text'  name='new_profesor_apellido'  id='new_profesor_apellido' value=''></td></tr>
                                    <tr><td>Nombre: <br><input type='text'  name='new_profesor_nombre'    id='new_profesor_nombre' value=''></td></tr>
                                    <tr><td>Usuario: <br><input type='text'  name='new_profesor_usuario'   id='new_profesor_usuario' value=''></td></tr>
                                    <tr><td>Contraseña: <br><input type='text'  name='new_profesor_contraseña'id='new_profesor_contraseña' value=''></td></tr>
                                    <td><input type='submit' name='agregar_profesor' value='Añadir profesor' class="btn btn-warning"></td> </td>
                                    </table></td>
                                    <td>Materia: <br><input type='text' name='new_profesor_materia' id='new_profesor_materia' value=''></td>
                                    
                                </form>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                        $profesores_names="SELECT * FROM profesores ORDER BY apellido;";
                        $result=mysqli_query($conn,$profesores_names);
                        $contador=1;
                        $resultCheck=mysqli_num_rows($result);
    
                        if($resultCheck>0){
                            while($row=mysqli_fetch_assoc($result)){
                                $profesor_nombre=$row['nombre'];
                                $profesor_apellido=$row['apellido'];
                                $profesor_username=$row['username'];
                                $materias_profesor="SELECT * FROM materias_profesor WHERE profesor='$profesor_username' ;";
                                $password="SELECT * FROM usuarios WHERE username='$profesor_username' ;";
                                $result3=mysqli_query($conn,$password);
                                $row3=mysqli_fetch_assoc($result3);
                                $password_profesor=$row3['password'];
                                $result2=mysqli_query($conn,$materias_profesor);
                                $resultCheck2=mysqli_num_rows($result2);
                                $form_num="form_".$contador;
                                echo "<form id='".$form_num."' method='post'></form>
                                        <tr> 
                                        <td>" .$contador."</td>
                                        <td><table class='table'>
                                        <tr><td>Apellido:<br><input type='text' form='".$form_num."' name='profesor_apellido' id='profesor_apellido' value='".$profesor_apellido."'></td></tr>
                                        <tr><td>Nombre:<br><input type='text' form='".$form_num."' name='profesor_nombre' id='profesor_nombre' value='".$profesor_nombre."'></td></tr>
                                        <tr><td>Usuario:<br><input type='text' form='".$form_num."' name='username_profesor' id='username_profesor' value='".$profesor_username."'>
                                        <input type='hidden' form='".$form_num."' name='last_username_profesor' id='last_username_profesor' value='".$profesor_username."'></td></tr>
                                        <tr><td>Contraseña:<br><input type='text' form='".$form_num."' name='profesor_password' id='profesor_password' value='".$password_profesor."'></td></tr>
                                        <tr><td><input class='btn' style='background-color:#0079FF; color: white;' type='submit' form='".$form_num."' name='actualizar' value='Actualizar' ><br>
                                        <input type='submit' class='btn' style='background-color:#FF4140;color: white;' form='".$form_num."' name='eliminar_profesor' value='Eliminar profesor' ></td></tr>
                                        
                                        </table></td>
                                        <td>
                                        <table class='table  '>
                                        ";
                                if($resultCheck2>0){
                                        while($row2=mysqli_fetch_assoc($result2)){
                                            $materia=$row2['materia_name'];
                                            $profesor=$row2['profesor'];
                                        echo "<tr>
                                                <form method='post'>
                                                    <td>Materia:<br><input type='text' name='profesor_materia' id='profesor_materia' value='".$materia."'></td>
                                                    <td><input class='btn' style='background-color:#FF4140;color: white;'type='submit' name='eliminar' value='eliminar' >
                                                    <input class='btn' style='background-color:#0079FF; color: white;' type='submit' name='actualizar_materia' value='Actualizar' ></td>
                                                    <input type='hidden' name='elim_profesor_materia' value='".$materia."'>
                                                    <input type='hidden' name='elim_profesor_username' value='".$profesor_username."'>
                                                </form>
                                                
                                            </tr>";
                                            }
                                        }
                                        else{
                                            echo "
                                            <tr>
                                            <td>vacio</td>
                                            </tr>
                                        ";
                                        }
                                        echo "
                                        
                                        <tr>
                                            <td><input type='text' form='".$form_num."' name='new_profesor_materia' id='new_profesor_materia' value=''></td>    
                                            <td><input class='btn' style='background-color:#00D600; color: white;' type='submit' form='".$form_num."' name='agregar' value='Agregar' ></td>                   

                                        </tr>
                                        </table></td>
                                                                        
                                    </tr> ";
                                    $contador++;
                                    }
                                }
                            ?>
                        
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>