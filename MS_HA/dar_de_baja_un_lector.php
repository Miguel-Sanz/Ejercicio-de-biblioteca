<?php
require_once("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe
    $id_lector_baja = $_POST['id_lector_baja'];

    // Verificar si el lector no tiene libros en préstamo antes de dar de baja
    $sql_verificar_prestamos = "SELECT n_prestado FROM lectores WHERE id = $id_lector_baja";
    $resultado_verificacion_prestamos = mysqli_query($conexion, $sql_verificar_prestamos);
    $n_prestado_lector = mysqli_fetch_assoc($resultado_verificacion_prestamos)['n_prestado'];
    echo $n_prestado_lector;

    if ($n_prestado_lector == 0) {
        // Dar de baja al lector
        mysqli_query($conexion, "UPDATE lectores SET estado = 'baja' WHERE id = $id_lector_baja");

        echo "Lector dado de baja con éxito";
    } else {
        echo "El lector tiene libros en préstamo y no puede ser dado de baja";
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
    <title>Dar de baja un lector</title>
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
        <h1>Dar de baja un lector</h1>
    </header>
    <!-- Creación del formulario -->
    <form action="" method="post">
        <label for="id_lector_baja">ID del lector:</label>
        <input type="text" name="id_lector_baja" required>

        <input type="submit" value="Dar de baja">
    </form>

    <footer>
        <p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p>
    </footer>
</body>

</html>