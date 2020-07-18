
<?php
include_once 'database.php';
include_once 'connect_database.php';
session_start();
    if(isset($_GET['materia'])){
        $materia = $_GET['materia']; //some_value
    }
    
    if(isset($_POST['actualizar'])){
        $estudiante_apellido=$_POST['estudiante_apellido'];
        $estudiante_nombre=$_POST['estudiante_nombre'];
        $estudiante_usuario=$_POST['username_estudiante'];
        $last_estudiante_usuario=$_POST['last_username_estudiante'];
        $estudiante_password=$_POST['estudiante_password'];
        $queryUpdate = "UPDATE estudiantes SET nombre = '$estudiante_nombre',
                        apellido = '$estudiante_apellido'
                        WHERE username = '$last_estudiante_usuario';";
                        
        $queryUpdate2 = "UPDATE usuarios SET username = '$estudiante_usuario',
        password = '$estudiante_password'
        WHERE username = '$last_estudiante_usuario';";

        $resultUpdate = mysqli_query($conn, $queryUpdate); 
        $resultUpdate2 = mysqli_query($conn, $queryUpdate2); 
        
        if($resultUpdate&&$resultUpdate2)
            {
              $message = "Actualizacion exitosa";
              echo "<script type='text/javascript'>window.onload = function(){ 
                alert('$message');}</script>";            }
        else
            {
              $message = "Actualizacion no exitosa";
              echo "<script type='text/javascript'>window.onload = function(){ 
                alert('$message');}</script>"; 
            }
    
    }
    if(isset($_POST['actualizar_materia'])){
        $estudiante_materia=$_POST['estudiante_materia'];
        $estudiante_profesor=$_POST['estudiante_profesor'];
        $estudiante_nota=$_POST['estudiante_nota'];
        $elim_estudiante_username=$_POST['elim_estudiante_username'];
        $elim_estudiante_materia=$_POST['elim_estudiante_materia'];
        $elim_estudiante_profesor=$_POST['elim_estudiante_profesor'];
        
        $queryUpdate = "UPDATE materias SET materia_name = '$estudiante_materia',
        profesor = '$estudiante_profesor', nota='$estudiante_nota'
        WHERE usuario_estudiante = '$elim_estudiante_username' AND materia_name = '$elim_estudiante_materia' AND profesor = '$elim_estudiante_profesor' ;";
        $resultUpdate = mysqli_query($conn, $queryUpdate); 

        if($resultUpdate&&$resultUpdate)
        {
          $message = "Actualizacion exitosa";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        }
        else
        {
          $message = "Actualizacion exitosa";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        }
        
    }
    if(isset($_POST['agregar_estudiante'])){
        $new_estudiante_apellido=$_POST['new_estudiante_apellido'];
        $new_estudiante_nombre=$_POST['new_estudiante_nombre'];
        $new_estudiante_usuario=$_POST['new_estudiante_usuario'];
        $new_estudiante_contrasena=$_POST['new_estudiante_contraseña'];
        $new_estudiante_materia=$_POST['new_estudiante_materia'];
        $new_estudiante_nota=$_POST['new_estudiante_nota2'];
        $new_estudiante_profesor=$_POST['new_estudiante_profesor'];
        
        $sql = "INSERT INTO usuarios (username,password, rol_id)
        VALUES ('$new_estudiante_usuario', '$new_estudiante_contrasena', '3')";
        
        $sql2 = "INSERT INTO estudiantes (nombre,apellido, username)
        VALUES ('$new_estudiante_nombre', '$new_estudiante_apellido', '$new_estudiante_usuario')";

        if($new_estudiante_materia!='' && $new_estudiante_profesor!=''){
            // if($new_estudiante_nota==''){
            //     $new_estudiante_nota=0.00;
            // }
            $sql3 = "INSERT INTO materias (materia_name,usuario_estudiante, profesor,nota)
            VALUES ('$new_estudiante_materia', '$new_estudiante_usuario', '$new_estudiante_profesor','$new_estudiante_nota')";
            
         }
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
          $message = "Registro exitoso";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        } else {
          $message = "Registro no exitoso";
              echo "<script type='text/javascript'>window.onload = function(){ 
                alert('$message');}</script>"; 
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        // if($new_estudiante_materia!='' && $new_estudiante_profesor!=''){

        // if ($conn->query($sql3) === TRUE) {
        //     echo "New record created successfully";
        //     } else {
        //     echo "Error: " . $sql3 . "<br>" . $conn->error;
        //     }
        // }    

    }
    if(isset($_POST['agregar'])){
        $estudiante_usuario=$_POST['username_estudiante'];
        $new_estudiante_materia=$_POST['new_estudiante_materia'];
        $new_estudiante_nota=$_POST['new_estudiante_nota'];
        $new_estudiante_profesor=$_POST['new_estudiante_profesor'];
        
        $sql = "INSERT INTO materias (materia_name, usuario_estudiante, profesor,nota)
        VALUES ('$new_estudiante_materia', '$estudiante_usuario', '$new_estudiante_profesor','$new_estudiante_nota')";

        if ($conn->query($sql) === TRUE) {
          $message = "Registro exitoso";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        } else {
          $message = "Registro no exitoso";
              echo "<script type='text/javascript'>window.onload = function(){ 
                alert('$message');}</script>"; 
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if(isset($_POST['eliminar_estudiante'])){
        $estudiante_usuario=$_POST['username_estudiante'];
        
        // sql to delete a record
        $sql = "DELETE FROM usuarios WHERE username='$estudiante_usuario'";

        if ($conn->query($sql) === TRUE) {
          $message = "Estudiante eliminado";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }


    if(isset($_POST['eliminar'])){
        $elim_estudiante_materia=$_POST['elim_estudiante_materia'];
        $elim_estudiante_profesor=$_POST['elim_estudiante_profesor'];
        $elim_estudiante_username=$_POST['elim_estudiante_username'];
        
        $sql = "DELETE FROM materias WHERE usuario_estudiante='$elim_estudiante_username' AND materia_name='$elim_estudiante_materia' AND profesor='$elim_estudiante_profesor'" ;

        if ($conn->query($sql) === TRUE) {
          $message = "Materia eliminada";
          echo "<script type='text/javascript'>window.onload = function(){ 
            alert('$message');}</script>"; 
        } else {
          $message = "Materia no eliminada";
              echo "<script type='text/javascript'>window.onload = function(){ 
                alert('$message');}</script>"; 
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

    <link rel="stylesheet" type="text/css" href="css/estilo_adm_std.css">

    
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
            <a href="admin_profesores.php" class="btn btn-warning">Profesores</a>        
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
                        <td id="Id">Id</td>
                        <td id="Datos">Datos</td>
                        <td id="SP"></td>
                    </tr>
                    
                        <tr>
                            <form method='post'>
                                <td>New</td>
                                
                                <td><table class=table>                   
                                    <tr><td>Apellido:<input type='text'  name='new_estudiante_apellido' id='new_estudiante_apellido' value=''></td></tr>
                                    <tr><td>Nombre:<input type='text'  name='new_estudiante_nombre' id='new_estudiante_nombre' value=''></td></tr>
                                    <tr><td>Usuario:<input type='text'  name='new_estudiante_usuario' id='new_estudiante_usuario' value=''></td></tr>
                                    <tr><td>Contraseña:<input type='text'  name='new_estudiante_contraseña' id='new_estudiante_contraseña' value=''></td></tr>
                                    
                                </table></td>
                                <td><table class='table  '>
                                    
                                    <tr>
                                        <td>Materia:<input type='text' name='new_estudiante_materia' id='new_estudiante_materia' value=''></td>
                                        <td>Nota:<input type='text' name='new_estudiante_nota2' id='new_estudiante_nota2' value=''></td>
                                        <td>Profesor:<input type='text' name='new_estudiante_profesor' id='new_estudiante_profesor' value=''></td>  
                                        <td> <br> <input class="btn" id="Btn_AE" type='submit' name='agregar_estudiante' value='Añadir estudiante'></td> </td>
                                    </tr>
                                </table>
                            </td>
                            
                            </form>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $estudiantes_names="SELECT * FROM estudiantes ORDER BY apellido;";
                        $result=mysqli_query($conn,$estudiantes_names);
                        $contador=1;
                        $resultCheck=mysqli_num_rows($result);
    
                        if($resultCheck>0){
                            while($row=mysqli_fetch_assoc($result)){
                                $estudiante_nombre=$row['nombre'];
                                $estudiante_apellido=$row['apellido'];
                                $estudiante_username=$row['username'];
                                $materias="SELECT * FROM materias WHERE usuario_estudiante='$estudiante_username' ;";
                                $password="SELECT * FROM usuarios WHERE username='$estudiante_username' ;";
                                $result3=mysqli_query($conn,$password);
                                $row3=mysqli_fetch_assoc($result3);
                                $password_estudiante=$row3['password'];
                                $result2=mysqli_query($conn,$materias);
                                $resultCheck2=mysqli_num_rows($result2);
                                $form_num="form_".$contador;
                                echo "<form id='".$form_num."' method='post'></form>
                                        <tr> 
                                        <td>" .$contador."</td>
                                        
                                        <td><table class='table'>
                                        <tr><td>Apellido:<input type='text' form='".$form_num."' name='estudiante_apellido' id='estudiante_apellido' value='".$estudiante_apellido."'></td></tr>
                                        <tr><td>Nombre<input type='text' form='".$form_num."' name='estudiante_nombre' id='estudiante_nombre' value='".$estudiante_nombre."'></td></tr>
                                        <tr><td>Usuario:<input type='text' form='".$form_num."' name='username_estudiante' id='username_estudiante' value='".$estudiante_username."'>
                                        <input type='hidden' form='".$form_num."' name='last_username_estudiante' id='last_username_estudiante' value='".$estudiante_username."'></td></tr>
                                        <tr><td>Contraseña:<input type='text' form='".$form_num."' name='estudiante_password' id='estudiante_password' value='".$password_estudiante."'></td></tr>
                                        <tr><td><input  class='btn btn_actualizar' type='submit' form='".$form_num."' name='actualizar' value='Actualizar' ><br>
                                        <input class='btn btn_elminar_est' type='submit' form='".$form_num."' name='eliminar_estudiante' value='Eliminar estudiante' ></td></tr>
                                        </table></td>
                                        <td>
                                        <table class='table  '>
                                        ";
                                if($resultCheck2>0){
                                        while($row2=mysqli_fetch_assoc($result2)){
                                            $materia=$row2['materia_name'];
                                            $nota=$row2['nota'];
                                            $profesor=$row2['profesor'];
                                        echo "<tr>
                                                <form method='post'>
                                                    <td><input type='text' name='estudiante_materia' id='estudiante_materia' value='".$materia."'></td>
                                                    <td><input type='text' name='estudiante_nota' id='estudiante_nota' value='".$nota."'></td>
                                                    <td><input type='text' name='estudiante_profesor' id='username_profesor' value='".$profesor."'></td>                                 
                                                    <input type='hidden' name='elim_estudiante_materia' value='".$materia."'>
                                                    <input type='hidden' name='elim_estudiante_profesor' value='".$profesor."'>
                                                    <input type='hidden' name='elim_estudiante_username' value='".$estudiante_username."'>
                                                    <td><input type='submit' name='eliminar' value='eliminar' style='background-color:#FF4140; color: white;' class='btn'>
                                                    <input type='submit'  name='actualizar_materia' value='Actualizar' class='btn' style='background-color:#0079FF; color: white'></td>
                                                </form>
                                            </tr>";
                                            }
                                        }
                                        else{
                                            echo "<tr>
                                            
                                            <input type='hidden' form='".$form_num."' name='estudiante_materia' id='estudiante_materia' value=''>
                                            <input type='hidden' form='".$form_num."' name='estudiante_nota' id='estudiante_nota' value=''>
                                            <input type='hidden' form='".$form_num."' name='estudiante_profesor' id='username_profesor' value=''>
                                        </tr>";
                                        }
                                        echo "
                                        <tr>
                                            <td>Materia:<input type='text' form='".$form_num."' name='new_estudiante_materia' id='new_estudiante_materia' value=''></td>
                                            <td>Nota:<input type='text' form='".$form_num."' name='new_estudiante_nota' id='new_estudiante_nota' value=''></td>
                                            <td>Profesor:<input type='text' form='".$form_num."' name='new_estudiante_profesor' id='new_username_profesor' value=''></td>                                 
                                            <td><br><input class='btn btn_agregar' type='submit' form='".$form_num."' name='agregar' value='Agregar' style='background-color:#00D600; color: white;'></td>
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