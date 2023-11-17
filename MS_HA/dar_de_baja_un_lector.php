<?php

$id_lector_baja = 1;

// Verificar si el lector no tiene libros en préstamo antes de dar de baja
$sql_verificar_prestamos = "SELECT n_prestado FROM lectores WHERE id = $id_lector_baja";
$resultado_verificacion_prestamos = mysqli_query($conexion, $sql_verificar_prestamos);
$n_prestado_lector = mysqli_fetch_assoc($resultado_verificacion_prestamos)['n_prestado'];

if ($n_prestado_lector === 0) {
    // Dar de baja al lector
    mysqli_query($conexion, "UPDATE lectores SET estado = 'baja' WHERE id = $id_lector_baja");
}
