<?php
$host = "localhost";
$db= "sercam";
$user="root";
$pass="";

try {
    $conexion= new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        // if($conexion){ 
        //     echo "Conectado a la base de datos...."; 
        // }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>