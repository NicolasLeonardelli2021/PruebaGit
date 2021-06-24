<?php
  include("procesar.php");
  session_start();
    include("grabar_curso.php");

	if(!$_SESSION["acceso"]){
		$_SESSION["url"] = "nuevo_curso.php";
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


<h2> Nuevo Curso</h2>

<div class="formulario">
<form method = "post">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label  for="menu">Selecciona el Preceptor a cargo:</label>
                <select name="preceptor" class="form-control">
                <option value="0">
                    <?php
                        if(isset($_SESSION['apellido'])){
                            $apellido = $_SESSION['apellido'];
                            unset($_SESSION['apellido']);
                            echo $apellido;
                        }else{
                            echo "seliccionar";
                        }
                    ?>
                </option>
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
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="nombre">Nombre del nuevo Curso</label>
        <input type="text" name ="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del curso"
        value="<?php 
            if(isset($_SESSION['denominacion'])){
                $denominacion = $_SESSION['denominacion'];
                unset($_SESSION['denominacion']);
                echo $denominacion;          
            }
            ?>">
        </div>
    </div>   

    <button type="submit" name ="register" class="btn btn-primary">Agregar</button>
<button href="#" button type="button" class="btn btn-danger">Cancelar</button>
<br>
    </form>
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
