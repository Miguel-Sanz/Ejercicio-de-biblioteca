<?php
$sql_catalogo_libros = "SELECT * FROM libros WHERE n_disponibles > 0";
$resultado_catalogo_libros = mysqli_query($conexion, $sql_catalogo_libros);

// Iterar sobre los resultados y mostrar el catálogo
while ($libro = mysqli_fetch_assoc($resultado_catalogo_libros)) {
    echo "Nombre: {$libro['nombre']}, Autor: {$libro['autor']}, Disponibles: {$libro['n_disponibles']}" . PHP_EOL;
}
