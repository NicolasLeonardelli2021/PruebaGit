<?php
  include("procesar.php");
  include("grabar_alumno.php");
    include("conexion2.php");
//  session_start();
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

    <h2>Agregar/Actualizar Alumno</h2>
    <?php
    
        
        $con = conectar2();
        
        if(isset($_SESSION["legajo"])){
        $legajo = $_SESSION["legajo"];
        
        
        //unset($_SESSION["legajo"]);
        //$_SESSION['legajo'] = $legajo;
        

        //busca en la base de datos el registro para llenar los campos para ACTUALIZAR
    
          $query = "SELECT * FROM Alumno WHERE legajo = $legajo"; 
          $resultado = mysqli_query($con,$query);           
          $mostrar=mysqli_fetch_array($resultado);
            
                //consulta para poner en el select el curso del Alumno para actualizarlo
         $curso = $_SESSION['curso2'];
         //unset($_SESSION['curso2']);
          $query3 = "SELECT denominacion FROM Curso JOIN Alumno on Alumno.idCurso = Curso.id WHERE Curso.id = $curso";
           $resultado3 = mysqli_query($con,$query3);
            $mostrar3=mysqli_fetch_array($resultado3);
            

           // $legajo=null;
        }
    ?>
    <div class="formulario">
        <form method="post" >
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="menu">Selecciona el Curso:</label>
                    <select name="menu">
                        <option value="0">
                    <?php 
                            if(isset($legajo)){
                                echo $mostrar3['denominacion'];
                            }else{
                                echo "Seleccionar"; 
                            }
                    ?>
                        </option>
                    <?php
                        $query2 = "SELECT denominacion FROM Curso"; 
                        $resultado2 = mysqli_query($con,$query2);
                         while($mostrar2=mysqli_fetch_array($resultado2)){                                        

                    ?>
                        <option><?php echo $mostrar2['denominacion']?></option>';

                    <?php
                         }
        
                    ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni_a" class="form-control" id="dni" placeholder="N° DNI" value="
            <?php
            if(isset($legajo)){
            echo $mostrar['dni'];}?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre"
                        value="<?php
        if(isset($legajo)){
        echo $mostrar['nombre'];}?>">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese apellido"
                        value="<?php
        if(isset($legajo)){
        echo $mostrar['apellido'];}?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="N° de telefono"
                        value="<?php
            if(isset($legajo)){
            echo $mostrar['telefono'];}?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" class="form-control" id="celular" placeholder="N° de Celular"
                        value="<?php
            if(isset($legajo)){
            echo $mostrar['celular'];}?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" name="domicilio" class="form-control" id="domicilio"
                        placeholder="Ingrese domicilio" value="<?php
            if(isset($legajo)){
            echo $mostrar['domicilio'];}?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="
            <?php
            if(isset($legajo)){
            echo $mostrar['email'];}?>">
                </div>
            </div>

            <button type="submit" name="register"
                class="btn btn-primary">Grabar</button>
                <a href="Javascript:window.close()" button type="button" class="btn btn-danger">Cancelar</button></a>

            <br></br>

            <br></br>
        </form>
    </div>
    <?php

//if(isset($_POST["register"])){  
   // $_SESSION['legajo2'] = $legajo;
    //echo registrar();
//}
?>
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