<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $id_lector_devolucion = $_POST['id_lector_devolucion'];
    $id_libro_devolucion = $_POST['id_libro_devolucion'];

    // Marcar el libro como disponible
    mysqli_query($conexion, "UPDATE libros SET n_disponibles = n_disponibles + 1 WHERE id = $id_libro_devolucion");

    // Eliminar la entrada de la tabla de préstamos
    mysqli_query($conexion, "DELETE FROM prestamo WHERE id_lector = $id_lector_devolucion AND id_libro = $id_libro_devolucion");

    // Decrementar el número de libros prestados del lector
    mysqli_query($conexion, "UPDATE lectores SET n_prestado = n_prestado - 1 WHERE id = $id_lector_devolucion");

    echo "Devolución realizada con éxito";
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolver un préstamo</title>
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
        .boton-regreso {
            position: fixed;
            bottom: 10px; 
            left: 10px; 
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px; 
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); 
        }

        .boton-regreso:hover {
            background-color: #45a049;}
    </style>
</head>

<body>
    <header>
        <h1>Devolver un préstamo</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="id_lector_devolucion">ID del lector:</label>
        <input type="text" name="id_lector_devolucion" required>

        <label for="id_libro_devolucion">ID del libro:</label>
        <input type="text" name="id_libro_devolucion" required>

        <input type="submit" value="Devolver préstamo">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
    </footer>
    <a href="index.html" class="boton-regreso">Volver a Inicio</a>
</body>

</html>