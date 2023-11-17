<?php

$servername = "localhost";
$username = "root";
$password = "";

$conexion = mysqli_connect($servername, $username, $password);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
    echo "Conectado";
    //Creamos la BD
    $sql = "CREATE DATABASE biblioteca";
    if (mysqli_query($conexion, $sql)) { // Lanzar BD contra el servidor
        echo "Base de datos creada con éxito";
    } else {
        echo "Error al crear la base de datos";
        mysqli_error($conexion); //Muestra el código de error
    }
}
