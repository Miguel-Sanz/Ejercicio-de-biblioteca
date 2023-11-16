<?php

$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "usuarios";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


?>
