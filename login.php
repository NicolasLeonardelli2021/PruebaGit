<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/login.css">
     <!-- Los iconos tipo Solid de Fontawesome-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
     <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

 
    <title>Grupo 3</title>
</head>
<body>

 <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="images/user.png">
                </div>
                <form method = "post">
                <div class=col-12>       
                      <label form="dni">DNI</label>
                      <input  type="text" name="dni" class="form-control" id="dni"  method="post" placeholder="Ingrese DNI" value="" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el DNI.</div>    
                </div>
                
                    <div class=col-12>                   
                      <label form ="password">Contraseña</label>
                          <input name="password" method="post"  type="text"  class="form-control" id="Pass" placeholder="Password" value="" required>
                          <div class="valid-feedback">¡Ok válido!</div>
                          <div class="invalid-feedback">Escriba la contraseña.</div>

                <form id="form" action="procesar.php" method="post" class="needs-validation" novalidate>
                    <button type="submit" name="ingresar" class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i> Ingresar </button>
                </form>
                <br>
                    <form action="recordar_contraseña.php"  method="post" class="needs-validation" novalidate>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Recordar Contraseña</button>
                    </form>
                <br>
                
                <div class = "w3-container w3-white w3-left" id="nuevo">
                <form action="nuevo_preceptor.php"  method="post">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-user-plus" value="Soy Nuevo"></i></button>
                    </form>
                </div>
            </div>
        </div>
     </div>
<?php  
            
            
            include("procesar.php");
            if(isset($_POST["dni"]) and  isset($_POST["password"])){
            $_SESSION["dni"] = $_POST["dni"];
            $_SESSION["password"] = $_POST["password"];
                validar();
            }  
?>



<!-- JS, Popper.js, and jQuery -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

  
   	
   	
    <script src="codigo.js"></script> 	
</body>
</html>
