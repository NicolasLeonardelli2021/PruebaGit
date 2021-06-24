<?php
session_start();
include("conexion2.php");
$con = conectar2();


if(isset($_POST['dato'])){
    $dato = $_POST["dato"];
  $tipo = $_POST["menu"];

}else{
    $dato = "";
    $tipo = "";
}

if($tipo =="1"){
  $sql2 = "SELECT * FROM Administrativo where dni = '$dato'";
}elseif ($tipo=="2") {
$sql2 = "SELECT * FROM Administrativo where apellido = '$dato'";
}else {
  $sql2= "SELECT * FROM Administrativo";
}

$resultado= mysqli_query($con,$sql2);

if (isset($_POST['eliminar'])) {
    echo '<script type="text/javascript">';
    echo 'var opcion = confirm("Esta seguro que desea eliminar al Preceptor?:");';
    echo 'if (opcion == true) {';
        
    $dni = $_POST['dni'];
    $sql = "DELETE from Administrativo where dni = $dni";
    mysqli_query($con,$sql);

    echo 'alert("Preceptor Eliminado");';
    echo '} else {';
    echo 'alert ("Operacion Cancelada");';
    echo '}';
    echo '</script>';
    echo $_POST['dni'];
}

if(isset($_POST['actualizar'])){
  session_start();
  $_SESSION['dni2'] = $_POST['dni'];
  echo '<script type="text/javascript">';
    echo 'window.open("nuevo_preceptor.php" , "ventana1" , "width=1000,height=1000,scrollbars=NO");';
    echo '</script>';
    
}

if(isset($_POST['ver'])){
  
    $_SESSION['dni3'] = $_POST['dni'];
    $_SESSION['nombre'] = $_POST['nombre'];
    echo '<script type="text/javascript">';
    echo 'window.open("listado_curso.php" , "ventana1" , "width=150,height=300,scrollbars=NO,left=377,top=321.5");';
    echo '</script>';
    
}  



?>