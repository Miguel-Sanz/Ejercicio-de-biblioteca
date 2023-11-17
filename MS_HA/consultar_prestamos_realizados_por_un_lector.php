<?php
// Supongamos que recibes los datos del lector a consultar mediante un formulario
$id_lector_consulta = 1;

$sql_prestamos_lector = "SELECT libros.nombre FROM prestamo JOIN libros ON prestamo.id_libro = libros.id WHERE prestamo.id_lector = $id_lector_consulta";
$resultado_prestamos_lector = mysqli_query($conexion, $sql_prestamos_lector);

// Verificar si el lector tiene ejemplares en el momento de la consulta
if (mysqli_num_rows($resultado_prestamos_lector) > 0) {
    // Iterar sobre los resultados y mostrar los préstamos
    while ($prestamo = mysqli_fetch_assoc($resultado_prestamos_lector)) {
        echo "Libro prestado: {$prestamo['nombre']}" . PHP_EOL;
    }
} else {
    echo "Este lector no tiene ningún libro prestado. ¡Anímale a la lectura!" . PHP_EOL;
}
