<?php
function conectar2(){
    $user = "dbadmin";
    $pass =".admindb";
    $server="localhost";
    $db="grupo3_2020";
    $con=mysqli_connect($server,$user,$pass,$db) or die ("error al conectar".myql_error()); 
    

    return $con;
}


?>
