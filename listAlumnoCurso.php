<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista de Alumnos por Curso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
    session_start();
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    unset($_SESSION['id']);
    unset($_SESSION['nombre']);

    include('conexion.php');
    $con = conectar();

    $sql ="SELECT apellido,nombre from Alumno where idCurso= $id";
    $resultado = mysqli_query($con,$sql);
    
?>

    <table border="1">
        <thead>
            <tr>
                <th>
                    <?php
                    echo $nombre;
                    ?>
                </th>
            </tr>
        </thead>
        
        <?php
while($mostrar= mysqli_fetch_array($resultado)){
  
?>
        <tbody>
            <tr>
                <td>
                    <?php
                    echo $mostrar['apellido'];
                    ?>
                    </td>
                    <td>
                    <?php
                    echo $mostrar['nombre'];
                    ?>
                    </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</body>
</html>