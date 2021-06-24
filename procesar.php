<?php

include("conexion.php");

function validar(){
$username = $_SESSION["dni"];
$password = $_SESSION["password"];
$con = conectar();


if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
}

$sqlp = "select password from Administrativo where password= '$password'";
$resultadopass = mysqli_query($con,$sqlp);
$sql = "select dni from Administrativo where dni=$username";
$resultadouser = mysqli_query($con,$sql);

  
  if( (mysqli_num_rows( $resultadouser) > 0)){
    

      if( (mysqli_num_rows( $resultadopass) > 0)){


        $_SESSION["acceso"] = true;
        if($_SESSION["url"]){
         
        $url = $_SESSION["url"];
        header("Location: $url ");
        }else{
          header("Location: index.php");
        }
    
           
       
    }else{
      echo '<script language="javascript">alert("Contraseña incorrecta");
    window.location.href="login.php";
    
    </script>';
    }
}else{
  echo '<script language="javascript">alert("DNI incorrecto");
    window.location.href="login.php";
    
    </script>';
}


mysqli_close($con);

}


function eliminar($id,$tabla){
  include("conexion.php");
  if($tabla == "Administrativo"){
$sql ="DELETE FROM $tabla WHERE dni = $id";
  }else if($tabla == "Alumno"){
    $sql="DELETE FROM $tabla WHERE legajo = $id";
  }else{
    $sql="DELETE FROM $tabla WHERE id = $id";
  }
 mysqli_queri("$con,$sql");


 mysqli_close($con);

}

  ?>

 