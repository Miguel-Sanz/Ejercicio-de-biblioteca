<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $nombre_libro = $_POST['nombre_libro'];
    $autor_libro = $_POST['autor_libro'];
    $publicacion_libro = $_POST['publicacion_libro'];
    $isbn_libro = $_POST['isbn_libro'];
    $n_disponibles_libro = $_POST['n_disponibles_libro'];
    $n_totales_libro = $_POST['n_totales_libro'];

    // Crear la consulta SQL
    $sql_registro_libro = "INSERT INTO libros (nombre, autor, publicacion, ISBN, n_disponibles, n_totales) VALUES ('$nombre_libro', '$autor_libro', $publicacion_libro, $isbn_libro, $n_disponibles_libro, $n_totales_libro)";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql_registro_libro)) {
        echo "Libro añadido con éxito";
    } else {
        echo "Error al añadir el libro: " . mysqli_error($conexion);
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
    <title>Añadir un libro al catálogo</title>
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
        <h1>Añadir un libro al catálogo</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="nombre_libro">Nombre del libro:</label>
        <input type="text" name="nombre_libro" required>

        <label for="autor_libro">Autor:</label>
        <input type="text" name="autor_libro" required>

        <label for="publicacion_libro">Año de publicación:</label>
        <input type="number" name="publicacion_libro" required>

        <label for="isbn_libro">ISBN:</label>
        <input type="text" name="isbn_libro" required>

        <label for="n_disponibles_libro">Número de ejemplares disponibles:</label>
        <input type="number" name="n_disponibles_libro" required>

        <label for="n_totales_libro">Número total de ejemplares:</label>
        <input type="number" name="n_totales_libro" required>

        <input type="submit" value="Añadir libro">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
    </footer>
</body>

</html>