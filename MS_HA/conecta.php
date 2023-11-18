<?php
function conecta()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conexion = mysqli_connect($servername, $username, $password);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    } else {
        echo "Conectado";
        //Creamos la BD
        $sql = "CREATE DATABASE IF NOT EXISTS biblioteca";
        if (mysqli_query($conexion, $sql)) { // Lanzar BD contra el servidor
            echo "Base de datos creada con éxito";

            // Seleccionar la base de datos
            $base_datos = 'biblioteca';
            $conexion->select_db($base_datos);

            // No cerrar la conexión aquí
            return $conexion;
        } else {
            echo "Error al crear la base de datos";
            mysqli_error($conexion); //Muestra el código de error
        }
    }
}

$conexion = conecta();

?>
