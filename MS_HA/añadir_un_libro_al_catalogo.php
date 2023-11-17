<?php

$nombre_libro = "Nuevo Libro";
$autor_libro = "Autor Desconocido";
$publicacion_libro = 2023;
$isbn_libro = 9876543210123;
$n_disponibles_libro = 5;
$n_totales_libro = 10;

$sql_registro_libro = "INSERT INTO libros (nombre, autor, publicacion, ISBN, n_disponibles, n_totales) VALUES ('$nombre_libro', '$autor_libro', $publicacion_libro, $isbn_libro, $n_disponibles_libro, $n_totales_libro)";
mysqli_query($conexion, $sql_registro_libro);
