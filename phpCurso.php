<?php
session_start();
include("conexion2.php");
$con = conectar2();


$sql = "SELECT apellido from Administrativo";
$resultado= mysqli_query($con,$sql);


if(isset($_POST['buscar'])){
    if($_POST['preceptor1'] <> '0'){
    $preceptor = $_POST['preceptor1'];
  $sql2 = "SELECT apellido, id, denominacion from Curso join Administrativo
   on Curso.dniAdministrativo = Administrativo.dni where apellido = '$preceptor'"; 
    $resultado2 = mysqli_query($con,$sql2);
}else {
    $sql2 = "SELECT id,denominacion,apellido from Curso join Administrativo on Curso.dniAdministrativo= Administrativo.dni";
    $resultado2 = mysqli_query($con,$sql2);
}

}else{
    $sql2 = "SELECT id,denominacion,apellido from Curso join Administrativo on Curso.dniAdministrativo= Administrativo.dni";
    $resultado2 = mysqli_query($con,$sql2);
}

//$resultado= mysqli_query($con,$sql2);

if (isset($_POST['eliminar'])) {
    echo '<script type="text/javascript">';
    echo 'var opcion = confirm("Esta seguro que desea eliminar el curso?");';
    echo 'if (opcion == true) {';
        
    $id = $_POST['id'];
    $sql3 = "DELETE from Curso where id = $id";
    mysqli_query($con,$sql3);

    echo 'alert("Curso Eliminado");';
    echo '} else {';
    echo 'alert ("Operacion Cancelada");';
    echo '}';
    echo '</script>';
}

if(isset($_POST['actualizar'])){
 session_start();
  $_SESSION['id'] = $_POST['id'];
  $_SESSION['apellido'] = $_POST['apellido'];
  $_SESSION['denominacion'] = $_POST['denominacion'];
  echo '<script type="text/javascript">';
    echo 'window.open("nuevo_curso.php" , "ventana1" , "width=1000,height=1000,scrollbars=NO");';
    echo '</script>';
    
}

if(isset($_POST['ver'])){
  
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['nombre'] = $_POST['denominacion'];
    echo '<script type="text/javascript">';
    echo 'window.open("listAlumnoCurso.php" , "ventana1" , "width=150,height=300,scrollbars=NO,left=377,top=321.5");';
    echo '</script>';
    
}  
?>