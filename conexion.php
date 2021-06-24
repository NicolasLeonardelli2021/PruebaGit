<?php
function conectar(){
    echo "conectar";
    $user = "ottos_27613901";
    $pass ="";
    $server="sql101.tonohost.com";
    $db="ottos_27613901_sige";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("error al conectar".myql_error()); 
    
    
    return $con;
    
}


?>
