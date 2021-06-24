<?php
  include("procesar.php");
  include("phpPreceptor.php");
  
	if(!$_SESSION["acceso"]){
		$_SESSION["url"] = "gestion_p.php";
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
      
    <form class="form-inline" action="gestion_p.php" method="post">
       
            <label  for="menu">Seleccione el metodo de busqueda:</label>
            <select name="menu">
            <option value="0">Todos</option>
            <option value="1">Por DNI</option>
            <option value="2">Por Apellido</option>
            </select>


        <div class="form-group">
        <label for ="legajo"> Ingrese un dato</label>
        <input type="text" class="form-control" placeholder="dato" id="dato" name="dato">
        </div>
        
        <div class="form-group">   
        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
        </div>
        
    </form>
    </p>
    <br>
    
    
   
</div>

 <hr>   

<h2>Listado de Preceptores</h2>
    <a href="nuevo_preceptor.php" button type="button" class="btn btn-primary">Agregar Preceptor</button></a>
    <a href="gestion_p.php"   class="btn btn-primary"> Actualizar Lista</a>
<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
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
while($mostrar= mysqli_fetch_array($resultado)){
  
?>
    <tbody>
      <tr>
      
        <td><?php echo $mostrar['dni'] ?></td>
        <td><?php echo $mostrar['apellido'] ?></td>
        <td><?php echo $mostrar['nombre'] ?></td>
        <td><?php echo $mostrar['domicilio'] ?></td>
        <td><?php echo $mostrar['telefono'] ?></td>
        <td><?php echo $mostrar['celular'] ?></td>
        <td><?php echo $mostrar['email'] ?></td>
         
        <td>
          <form method='post' action='gestion_p.php'>
         <input type="submit" class="btn btn-info btn-sm" value="Ver Cursos" name="ver">
          <input type='submit' class="btn btn-primary btn-sm" value=' Actualizar ' name="actualizar">
          <input type="hidden" name="dni" value="<?php echo $mostrar['dni'] ?>">
          <input type="hidden" name="nombre" value="<?php echo $mostrar['nombre']?>">
          <input type='submit' class="btn btn-primary btn-sm" value=' Eliminar ' name='eliminar'> 
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
        <span class="icon-users"></span>Usuario: Anonimo
    </div>
</footer>    

</html>
