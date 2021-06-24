
<?php
  include("procesar.php");
  session_start();
	if(!$_SESSION["acceso"]){
		$_SESSION["url"] = "gestion_a.php";
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
      
    <form class="form-inline" action="">
       
            <label  for="menu">Seleccione el metodo de busqueda:</label>
            <select name="menu">
            <option value="0">Todos</option>
            <option value="1">Por Legajo</option>
            <option value="2">Por DNI</option>
            <option value="3">Por Apellido</option>
            </select>


        <div class="form-group">
        <label for ="legajo"> Ingrese un dato</label>
        <input type="text" class="form-control" placeholder="dato" id="dato">
        </div>
        
        <label  for="menu">Selecciona el Curso:</label>
            <select name="menu">
            <option value="0">Todos</option>


            <option value="1">11</option>
            <option value="2">12</option>
            <option value="3">13</option>
            </select>
        
        <div class="form-group">   
        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
        </div>
        
    </form>
    </p>
    <br>
    <?php
echo "algo";
    ?>
    
   
</div>

 <hr>   

<div class="cabeza">
    <form class="form-inline" action="">
       <label class="form-check-input position-static"><b>Marque lo que desea visualizar</b></label>
        <div class="form-check">
         <input class="form-check-input position-static" type="checkbox" id="campo1" value="campo1" checked>
         <label class="form-check-label" for="gridCheck">Legajo</label>
         <input class="form-check-input position-static" type="checkbox" id="campo2" value="campo2" checked>
         <label class="form-check-label" for="gridCheck">DNI</label>
         <input class="form-check-input position-static" type="checkbox" id="campo3" value="campo3" checked>
         <label class="form-check-label" for="gridCheck">Nombre</label>
         <input class="form-check-input position-static" type="checkbox" id="campo4" value="campo4" checked>
         <label class="form-check-label" for="gridCheck">Apellido</label>
         <input class="form-check-input position-static" type="checkbox" id="campo5" value="campo5" checked>
         <label class="form-check-label" for="gridCheck">Telefono</label>
         <input class="form-check-input position-static" type="checkbox" id="campo6" value="campo6" checked>
         <label class="form-check-label" for="gridCheck">Celular</label>
         <input class="form-check-input position-static" type="checkbox" id="campo7" value="campo7" checked>
         <label class="form-check-label" for="gridCheck">Direccion</label>
         <input class="form-check-input position-static" type="checkbox" id="campo8" value="campo8" checked>
         <label class="form-check-label" for="gridCheck">Email</label>
         <input class="form-check-input position-static" type="checkbox" id="campo9" value="campo9">
         <label class="form-check-label" for="gridCheck">Tutor</label>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Actualizar Vista </button>    
    </form>    

</div>

<h2>Listado de Alumnos</h2>
    <a href="nuevo_alumno.php" button type="button" class="btn btn-primary">Agregar Alumno</button></a>

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
    <tbody>
      <tr>
        <td>1</td>
        <td>40855055</td>
        <td>Perez</td>
        <td>Juan</td>
        <td>Peru 1558</td>
        <td></td>
        <td>345148588</td>
        <td>perez@hotmail.com</td>
        <td><form method='post' action='gestion_a.php'>  <input type="submit" class="btn btn-info btn-sm" name='ver' value="Ver Tutor"> <input type='submit' class="btn btn-primary btn-sm" value=' Actualizar '><input type='submit' class="btn btn-primary btn-sm" value=' Eliminar ' name ='eliminar'> <input type='submit' class="btn btn-secondary btn-sm" value=' Agregar Tutor '> </form> 
        
        <?php
                if (isset($_POST['ver'])) {
                    echo '<script type="text/javascript">';
                    echo 'window.open("listado_tutor.html" , "ventana1" , "width=600,height=160,scrollbars=NO");';
                    echo '</script>';
                    
                }   

                if (isset($_POST['eliminar'])) {
                    echo '<script type="text/javascript">';
                    echo 'var opcion = confirm("Esta seguro que desea eliminar al alumno:");';
                    echo 'if (opcion == true) {';
                    echo 'alert("Alumno Eliminado");';
                    echo '} else {';
                    echo 'alert ("Operacion Cancelada");';
                    echo '}';
                    echo '</script>';
                }
        ?>
          
      </tr>
    </tbody>
    <tbody>
      <tr>
        <td>2</td>
        <td>4185588</td>
        <td>Perez</td>
        <td>Sol</td>
        <td>Rivadavia 888</td>
        <td>34542255</td>
        <td>345140088</td>
        <td>solperez@hotmail.com</td>
        <td><form method='post' action='gestion_a.php'>  <input type="submit" class="btn btn-info btn-sm" name='ver' value="Ver Tutor"> <input type='submit' class="btn btn-primary btn-sm" value=' Actualizar '><input type='submit' class="btn btn-primary btn-sm" value=' Eliminar '> <input type='submit' class="btn btn-secondary btn-sm" value=' Agregar Tutor '> </form> 
        
        <?php
                if (isset($_POST['ver'])) {
                    echo '<script type="text/javascript">';
                    echo 'window.open("listado_tutor.html" , "ventana1" , "width=600,height=160,scrollbars=NO");';
                    echo '</script>';
                    
                }   
        ?>
          
      </tr>
    </tbody>
  </table>
</div>
  





</body>

<footer>
    <div class="usuario">
        <span class="icon-users"></span>Usuario: Anonimo
    </div>
</footer>    

</html>

