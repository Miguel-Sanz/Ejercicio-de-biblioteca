<?php

$id_lector_devolucion = 1;
$id_libro_devolucion = 1;

// Marcar el libro como disponible
mysqli_query($conexion, "UPDATE libros SET n_disponibles = n_disponibles + 1 WHERE id = $id_libro_devolucion");

// Eliminar la entrada de la tabla de préstamos
mysqli_query($conexion, "DELETE FROM prestamo WHERE id_lector = $id_lector_devolucion AND id_libro = $id_libro_devolucion");

// Decrementar el número de libros prestados del lector
mysqli_query($conexion, "UPDATE lectores SET n_prestado = n_prestado - 1 WHERE id = $id_lector_devolucion");
