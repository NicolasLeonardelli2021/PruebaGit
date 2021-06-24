<?php
    include("conexion2.php");
    $con = conectar2();

    if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['register'])){
        
          if(strlen($_POST['dni']) >= 1 && 
          strlen($_POST['nombre'])>= 1 && 
          strlen($_POST['apellido'])>= 1 &&
          strlen($_POST['celular'])>= 1){
                $dni = trim($_POST['dni']);
                $nombre = trim($_POST['nombre']);
                $apellido = trim($_POST['apellido']);
                $telefono = trim($_POST['telefono']);
                $celular = trim($_POST['celular']);
                $domicilio = trim($_POST['domicilio']);
                $email = trim($_POST['email']);
                $password=trim($_POST['password']);
                  
                  if(isset($_SESSION['dniPrec'])){
                  $dniPrec = $_SESSION['dniPrec'];
                  
                  $consulta = "UPDATE Administrativo set dni =$dni, nombre='$nombre', apellido='$apellido',
                  telefono='$telefono', celular='$celular', domicilio='$domicilio', email='$email', password='$password'
                  where dni = $dniPrec";
                  
                  }else{
                $consulta = "INSERT INTO Administrativo(dni,nombre,apellido,telefono,celular,domicilio,email,Password) 
                values('$dni','$nombre','$apellido','$telefono','$celular','$domicilio','$email','$password')";
               
                  }
                $resultado = mysqli_query($con,$consulta);
              
                if(!$resultado){
                      echo "ha ocurrido un error". mysqli_connect_error();
                }
          }else{
                echo "complete los campos";
      }
      if($_SESSION['dniPrec']){
      unset($_SESSION['dniPrec']);
      echo '<script type="text/javascript">';
      echo 'window.close("nuevo_preceptor.php")';
      echo '</script>';
      }else{
            header("Location: gestion_p.php");
      }
}



/*$sql = "INSERT INTO Alumno(DNI,Nombre,Apellido) values('34805449','Nico','Leonardelli')";
if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
*/

if(isset($_SESSION['dni2'])){
                
      echo $_SESSION['dni2'];
$usuario =  $_SESSION["dni2"];
unset($_SESSION['dni2']);
$_SESSION['dniPrec'] = $usuario;     
$sql = "SELECT * from Administrativo where dni = $usuario"; 
$resultado = mysqli_query($con,$sql);
$mostrar = mysqli_fetch_array($resultado);
}
  
      
        mysqli_close($con);
?>