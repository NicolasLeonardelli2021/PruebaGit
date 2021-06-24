<?php
session_start();
    //include("conexion2.php");
//function registrar(){
    $con = conectar();
    
    //echo $sesionLegajo;

    
//include("conexion2.php");


if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
}
    
  ///  }
if(isset($_POST['register'])){
          if(strlen($_POST['dni_a']) >= 1 && 
          strlen($_POST['nombre'])>= 1 && 
          strlen($_POST['apellido'])>= 1 &&
          strlen($_POST['celular'])>= 1){
                $dni = trim($_POST['dni_a']);
                $nombre = trim($_POST['nombre']);
                $curso= $_POST['menu'];
                $consulta1 ="select id from Curso where denominacion='$curso'";
                $resultado1= mysqli_query($con,$consulta1);
                
                if(!$resultado1){
                    $curso=0;
                }else{
                    while($row = $resultado1->fetch_assoc()) {
                        $curso=$row['id'];
                    }
                }
                $apellido = trim($_POST['apellido']);
                $telefono = trim($_POST['telefono']);
                $celular = trim($_POST['celular']);
                $domicilio = trim($_POST['domicilio']);
                $email = trim($_POST['email']);
                
                

                if(isset($_SESSION['legajo'])){
                $sesionLegajo = $_SESSION['legajo'];
                

                    $consulta = "UPDATE Alumno set dni =$dni, idCurso='$curso', nombre='$nombre', apellido='$apellido',
                    telefono='$telefono', celular='$celular', domicilio='$domicilio', email='$email'
                    where legajo = $sesionLegajo";
                    
                }else{
                    
                $consulta = "INSERT INTO Alumno(dni,idCurso,nombre,apellido,telefono,celular,domicilio,email)
                 values($dni,$curso,'$nombre','$apellido','$telefono','$celular','$domicilio','$email')";
                }
                $resultado= mysqli_query($con,$consulta);
                echo $resultado;
                if(!$resultado){
                      echo "ha ocurrido un error". mysqli_connect_error();
                }
          }else{
                echo "complete los campos";
      }
      if($_SESSION['legajo']){
        unset($_SESSION['legajo']);
        echo '<script type="text/javascript">';
        echo 'window.close("nuevo_alumno.php")';
        echo '</script>';
        }else{
              header("Location: gestion_a.php");
        }
      
   }
   mysqli_close($con);

//function actualizar(){
    //include("conexion2.php");
//    $con = conectar());


//}

?>