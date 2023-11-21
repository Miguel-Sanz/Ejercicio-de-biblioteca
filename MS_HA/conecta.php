<?php
//Realizamos la función conecta para despues implementarla en el resto de php
function conecta()
{
    //Indicamos a que servidor nos vamos a conectar, el usuario y la contraseña
    $servername = "localhost";
    $username = "root";
    $password = "";
    //Realizamos la conexion
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
