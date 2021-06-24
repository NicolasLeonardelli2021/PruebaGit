<?php
  //include("procesar.php");
  include("phpCurso.php");
	if(!$_SESSION["acceso"]){
		$_SESSION["url"] = "gestion_curso.php";
		header("Location: login.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
					<a href="index.php"><span class="icon-home"></span>Inicio<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="logout.php">Salir <span class="icon-log-out"></span></a></li>
					</ul>
				</li>

                <li class="submenu">
					<a href="gestion_a.php"><span class="icon-users"></span>Gestion de Alumnos<span class="caret icon-arrow-down6"></span></a>
				
				</li>


                                 
                <li class="submenu">
					<a href="gestion_p.php"><span class="icon-open-book"></span>Gestion Preceptor<span class="caret icon-arrow-down6"></span></a>
		
				</li>

				<li class="submenu">
					<a href="gestion_curso.php"><span class="icon-layers"></span>Cursos y Division<span class="caret icon-arrow-down6"></span></a>
				</li>
				

			</ul>
		</nav>
	</header>

<body>

<div class="cabeza">
      
    <form class="form-inline" action="" method="post">
       
            <label  for="preceptor">buscar por preceptor:</label>
            <select name="preceptor1">
            <option value="0">Todos</option>
            
            <?php
                        while($mostrar=mysqli_fetch_array($resultado)){
                ?>

                <option> <?php
                            echo $mostrar['apellido'];
                ?>
                </option>
                <?php
                        }
                ?>
            </select>

        
        <div class="form-group">   
        <button type="submit" class="btn btn-primary btn-sm" name="buscar">Buscar</button>
        </div>
        
    </form>
    </p>
    <br>
    
    
   
</div>

   



<h2>Listado de Cursos Activos</h2>
    <a href="nuevo_curso.php" button type="button" class="btn btn-primary">Agregar Nuevo Curso</button></a>
    <a href="gestion_curso.php"   class="btn btn-primary"> Actualizar Lista</a>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
        <th>Curso</th>
        <th>Denominacion</th>
        <th>Precptor a cargo</th>
        
        
      </tr>
    </thead>
    <?php
while($mostrar= mysqli_fetch_array($resultado2)){
  
?>
    <tbody>
      <tr>
      
        <td><?php echo $mostrar['id'] ?></td>
        <td><?php echo $mostrar['denominacion'] ?></td>
    
        <td><?php echo $mostrar['apellido'] ?></td>
        
        
        <td><form method='post' action='gestion_curso.php'> 
        <input type="submit" class="btn btn-info btn-sm" value="Ver Alumnos" name="ver"> 
        <input type='submit' class="btn btn-primary btn-sm" value=' Actualizar ' name='actualizar'>
        <input type="hidden" name="id" value="<?php echo $mostrar['id'] ?>">
        <input type="hidden" name ="apellido" value="<?php echo $mostrar['apellido'] ?>">
        <input type="hidden" name = "denominacion" value="<?php echo $mostrar['denominacion']?>">
        <input type='submit' class="btn btn-primary btn-sm" value=' Eliminar 'name="eliminar">

        </form> 
    
     
    </tr>
    </tbody>
    <?php
      }
    ?>
  </table>
  </div>


</body>

<footer>
    <div class="usuario">
        <span class="icon-users"></span>
        <?php 
            $usuario =  $_SESSION["dni"];
            echo $usuario;
        ?>
    </div>
</footer>    

</html>
