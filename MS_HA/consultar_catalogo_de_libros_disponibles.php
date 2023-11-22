<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar catálogo de libros disponibles</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
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
    <?php
    require_once("conecta.php");

    
    $sql_catalogo_libros = "SELECT nombre, n_disponibles, n_totales FROM libros";
    
    
    $resultado_catalogo_libros = mysqli_query($conexion, $sql_catalogo_libros);

    
    if ($resultado_catalogo_libros) {
        echo "<header><h1>Consultar catálogo de libros disponibles</h1></header>";

        
        if (mysqli_num_rows($resultado_catalogo_libros) > 0) {
            
            echo "<table border='1'>";
            echo "<tr><th>Nombre</th><th>Disponibles</th><th>Total</th></tr>";

            
            while ($libro = mysqli_fetch_assoc($resultado_catalogo_libros)) {
                echo "<tr>";
                echo "<td>{$libro['nombre']}</td>";
                echo "<td>{$libro['n_disponibles']}</td>";
                echo "<td>{$libro['n_totales']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay libros disponibles en este momento.</p>";
        }

        
        mysqli_close($conexion);

        echo "<footer><p>Integrantes del grupo: Hugo Antón, Miguel Sanz</p></footer>";
    } else {
        echo "<p>Error al consultar el catálogo de libros: " . mysqli_error($conexion) . "</p>";
    }
    ?>
</body>
</html>
