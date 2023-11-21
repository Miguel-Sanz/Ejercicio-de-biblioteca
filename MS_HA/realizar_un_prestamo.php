<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $id_lector_prestamo = $_POST['id_lector_prestamo'];
    $id_libro_prestamo = $_POST['id_libro_prestamo'];

    // Verificar si el lector está dado de baja antes de realizar el préstamo
    $sql_verificar_estado = "SELECT estado FROM lectores WHERE id = $id_lector_prestamo";
    $resultado_verificacion = mysqli_query($conexion, $sql_verificar_estado);
    $estado_lector_prestamo = mysqli_fetch_assoc($resultado_verificacion)['estado'];

    if ($estado_lector_prestamo === 'alta') {
        // Marcar el libro como no disponible
        mysqli_query($conexion, "UPDATE libros SET n_disponibles = n_disponibles - 1 WHERE id = $id_libro_prestamo");

        // Registrar el préstamo
        mysqli_query($conexion, "INSERT INTO prestamo (id_lector, id_libro) VALUES ($id_lector_prestamo, $id_libro_prestamo)");

        // Incrementar el número de libros prestados del lector
        mysqli_query($conexion, "UPDATE lectores SET n_prestado = n_prestado + 1 WHERE id = $id_lector_prestamo");
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar un préstamo</title>
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
        <h1>Realizar un préstamo</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="id_lector_prestamo">ID del lector:</label>
        <input type="text" name="id_lector_prestamo" required>

        <label for="id_libro_prestamo">ID del libro:</label>
        <input type="text" name="id_libro_prestamo" required>

        <input type="submit" value="Realizar préstamo">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
    </footer>
</body>

</html>