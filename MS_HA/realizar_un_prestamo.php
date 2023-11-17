<?php

$id_lector_prestamo = 1;
$id_libro_prestamo = 1;

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
