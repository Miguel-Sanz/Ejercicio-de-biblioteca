<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $id_lector_consulta = $_POST['id_lector_consulta'];

    // Supongamos que recibes los datos del lector a consultar mediante un formulario
    $sql_prestamos_lector = "SELECT libros.nombre FROM prestamo JOIN libros ON prestamo.id_libro = libros.id WHERE prestamo.id_lector = $id_lector_consulta";
    $resultado_prestamos_lector = mysqli_query($conexion, $sql_prestamos_lector);

    // Verificar si el lector tiene ejemplares en el momento de la consulta
    if (mysqli_num_rows($resultado_prestamos_lector) > 0) {
        echo "<h1>Préstamos realizados por el lector</h1>";

        // Iterar sobre los resultados y mostrar los préstamos
        while ($prestamo = mysqli_fetch_assoc($resultado_prestamos_lector)) {
            echo "<p>Libro prestado: {$prestamo['nombre']}</p>";
        }
    } else {
        echo "<p>Este lector no tiene ningún libro prestado. ¡Anímale a la lectura!</p>";
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
    <title>Consultar préstamos realizados por un lector</title>
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
        <h1>Consultar préstamos realizados por un lector</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="id_lector_consulta">ID del lector:</label>
        <input type="text" name="id_lector_consulta" required>

        <input type="submit" value="Consultar préstamos">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
    </footer>
</body>

</html>