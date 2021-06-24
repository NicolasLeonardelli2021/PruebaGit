<?php
include("conexion2.php");
$con = conectar2();

$sql = "SELECT apellido from Administrativo;";
$resultado= mysqli_query($con,$sql);


//function registrar(){


//if (!$con) {
  //    die("Connection failed: " . mysqli_connect_error());
//}else{
    
    //}
if(isset($_POST['register'])){
          if(strlen($_POST['nombre'])>= 1 && 
          strlen($_POST['preceptor'])>= 1){
                
                $nombre = trim($_POST['nombre']);
                $preceptor= $_POST['preceptor'];
                  
                

                  
                  $sql="SELECT dni from Administrativo where apellido = '$preceptor'";
                  $consulta2= mysqli_query($con,$sql);
                  $mostrar = mysqli_fetch_array($consulta2);
                  $dniPreceptor = $mostrar['dni'];

                  if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                    

                    $consulta = "UPDATE Curso set denominacion = '$nombre', dniAdministrativo= $dniPreceptor
                                where id = $id";
                  }else{
                $consulta = "INSERT INTO Curso(denominacion,dniAdministrativo)
                 values('$nombre','$dniPreceptor')";
                  }
                $resultado= mysqli_query($con,$consulta);
                if(!$resultado){
                      echo "ha ocurrido un error". mysqli_connect_error();
                }
          }else{
                echo "complete los campos";
          }
      if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
        echo '<script type="text/javascript">';
        echo 'window.close("nuevo_curso.php")';
        echo '</script>';
        }else{
              header("Location: gestion_curso.php");
        }
  }




      mysqli_close($con);
   
//}
//function actualizar(){
    //include("conexion2.php");
//    $con = conectar());


//}

?>