<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $nombre_lector = $_POST['nombre_lector'];
    $dni_lector = $_POST['dni_lector'];

    // Crear la consulta SQL
    $sql_registro_lector = "INSERT INTO lectores (lector, DNI) VALUES ('$nombre_lector', '$dni_lector')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql_registro_lector)) {
        echo "Lector registrado con éxito";
    } else {
        echo "Error al registrar el lector: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un nuevo lector</title>
    <!-- Implantancion de los stilos css a la pagina -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <h1>Registrar un nuevo lector</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="nombre_lector">Nombre del lector:</label>
        <input type="text" name="nombre_lector" required>

        <label for="dni_lector">DNI:</label>
        <input type="text" name="dni_lector" required>

        <input type="submit" value="Registrar lector">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
        <a href="index.html">Volver al Inicio</a>
    </footer>
</body>

</html>
