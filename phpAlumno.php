<?php
session_start();
 include("conexion2.php");
 $con = conectar2();

 //$contador = 0;
 //$_SESSION["idAlumno"] = array();
 
 if(isset($_POST["tipo"])){
   $tipo = $_POST["tipo"];
 }else{
   $tipo = "";
 }
 
   if( isset($_POST["dato"])){
 $dato = $_POST["dato"];
   }else{
     $dato = "";
   }
   if(isset($_POST["menu"])){
 $curso = $_POST["menu"];
 }else{
   $curso = "0";
 }
 
 if($tipo == "1"){
   
     $sql = "select * from Alumno where legajo = '$dato'";
   
 
   }else if($tipo == "2"){
 
       $sql = "select * from Alumno where dni = '$dato'";
     
 
   }else if($tipo == "3"){
   
       $sql = "select * from Alumno where Apellido = '$dato'";
     
   }else{
     
     if($curso <> "0"){
       echo $curso;
       $sql = "select * from Alumno join Curso on Curso.id = Alumno.idCurso where Curso.denominacion = '$curso'";
     }else{
     $sql = "select * from Alumno";
 }
   }
 //$valor= 0;
 $resultado1 = mysqli_query($con,$sql);


 if(isset($_POST['actualizar'])){
 // session_start();
  $_SESSION['legajo'] = $_POST['legajo'];
  $_SESSION['curso2'] = $_POST['curso'];
  echo '<script type="text/javascript">';
    echo 'window.open("nuevo_alumno.php" , "ventana1" , "width=1000,height=1000,scrollbars=NO");';
    echo '</script>';
    
}

if (isset($_POST['eliminar'])) {
 
  echo '<script type="text/javascript">';
  echo 'var opcion = confirm("Esta seguro que desea eliminar el alumno?:");';
  echo 'if (opcion == true) {';
      
  $legajo = $_POST['legajo'];
  $sql = "DELETE from Alumno where legajo = $legajo";
  mysqli_query($con,$sql);

  echo 'alert("Alumno Eliminado");';
  echo '} else {';
  echo 'alert ("Operacion Cancelada");';
  echo '}';
  echo '</script>';
  
}
?>