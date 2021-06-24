<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista de curso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
    session_start();
    $dni = $_SESSION['dni3'];
    $nombre = $_SESSION['nombre'];
    unset($_SESSION['dni3']);
    unset($_SESSION['nombre']);

    include('conexion.php');
    $con = conectar();

    $sql ="SELECT denominacion from Curso where dniAdministrativo= $dni";
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
                    echo $mostrar['denominacion'];
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