<?php
  include("procesar.php");
  include("phpAlumno.php");
 
	if(!$_SESSION["acceso"]){
		$_SESSION["url"] = "gestion_a.php";
		header("Location: login.php");
     exit();
}
?>

<!DOCTYPE html>
<?php
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/principal.css">
    <link rel="stylesheet" href="fonts/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/main.js"></script>
</head>

<header>
    <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
    </div>

    <nav>
        <ul>
            <li class="submenu">
                <a href="index.php"><span class="icon-home"></span>Inicio<span
                        class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="logout.php">Salir <span class="icon-log-out"></span></a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="gestion_a.php"><span class="icon-users"></span>Gestion de Alumnos<span
                        class="caret icon-arrow-down6"></span></a>

            </li>



            <li class="submenu">
                <a href="gestion_p.php"><span class="icon-open-book"></span>Gestion Preceptor<span
                        class="caret icon-arrow-down6"></span></a>

            </li>

            <li class="submenu">
                <a href="gestion_curso.php"><span class="icon-layers"></span>Cursos y Division<span
                        class="caret icon-arrow-down6"></span></a>
            </li>
            

        </ul>
    </nav>
</header>

<body>

    <div class="cabeza">

        <form class="form-inline" action="gestion_a.php" method="post">

            <label for="tipo">Seleccione el metodo de busqueda:</label>
            <select name="tipo" method="post">
                <option value="0">Todos</option>
                <option value="1">Por Legajo</option>
                <option value="2">Por DNI</option>
                <option value="3">Por Apellido</option>
            </select>


            <div class="form-group">
                <label for="legajo"> Ingrese un dato</label>
                <input type="text" class="form-control" name="dato" method="post" placeholder="dato" id="dato">
            </div>

            <label for="menu">Selecciona el Curso:</label>
          

            <select name="menu" method="post">
                <option value="0">Todos:</option>
                <?php 
        
      
          $query = "SELECT * FROM Curso"; 
          $resultado = mysqli_query($con,$query);
          while($mostrar=mysqli_fetch_array($resultado)){      
          
        ?>
                <option><?php echo $mostrar['denominacion']?></option>';
                <?php 
          }
          ?>

            </select>

            <div class="form-group">
                <button type="submit" name="buscar" method="post" class="btn btn-primary btn-sm">Buscar</button>
            </div>

        </form>

        <br>



    </div>
    <!--<form method="post" action=<?php                                             
                    //echo "nuevo_alumno.php"; ?> > -->
        <h2>Listado de Alumnos</h2>
        <a href="nuevo_alumno.php" button type="button" class="btn btn-primary">Agregar Alumno</a>
        <!--<button type="submit" name="actualizar" method="post" class="btn btn-primary btn-sm" onclick="<?php //$var = 2; ?>">Actualizar</button>  
        
        <button type="submit" class="btn btn-primary" method="post" value=<?php// $var = 1; ?> name="eliminar">Eliminar </button>-->
        <a href="gestion_a.php"   class="btn btn-primary"> Actualizar Lista</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>N° Legajo</th>
                        <th>DNI</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <?php
   
while($mostrar1=mysqli_fetch_array($resultado1)){
    
    //$valor=$valor+1;
  ?>

                <tbody>
                    <tr>
                        <td><?php echo $mostrar1['legajo']?> </td>
                        <td><?php echo $mostrar1['dni']?></td>
                        <td><?php echo $mostrar1['apellido']?></td>
                        <td><?php echo $mostrar1['nombre']?></td>
                        <td><?php echo $mostrar1['domicilio']?></td>
                        <td><?php echo $mostrar1['telefono']?></td>
                        <td><?php echo $mostrar1['celular']?></td>
                        <td><?php echo $mostrar1['email']?></td>
                        <!--<td><input type="radio" name="radio" value=<?php// echo $valor ?> /></td>-->
                        <td>
                    <form method='post' action='gestion_a.php'>
                       
                        <input type='submit' class="btn btn-primary btn-sm" value=' Actualizar ' name="actualizar">
                        <input type="hidden" name="legajo" value="<?php echo $mostrar1['legajo'] ?>">
                        <input type="hidden" name="curso" value="<?php echo $mostrar1['idCurso']?>">
                        <input type="hidden" name="apellido" value="<?php echo $mostrar1['apellido']?>">

                        <input type='submit' class="btn btn-primary btn-sm" value=' Eliminar ' name='eliminar'> 
                    </form> 
                    </td>

                    </tr>
                </tbody>

                <?php
    
                }
                ?>


            </table>
        </div>
    




    <footer>
        <div class="usuario">
            <span class="icon-users"></span>
            <?php 
        $id = 2;
        $tabla = "Alumno";
        
        $usuario =  $_SESSION["dni"];
        echo $usuario;
        ?>
        </div>
    </footer>

</body>

</html>