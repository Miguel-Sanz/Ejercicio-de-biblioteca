<?php


require_once("conecta.php");


$sql_libros = "CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    publicacion INT NOT NULL,
    ISBN BIGINT NOT NULL,
    sinopsis TEXT,
    n_disponibles INT NOT NULL,
    n_totales INT NOT NULL
)";

$sql_lectores = "CREATE TABLE IF NOT EXISTS lectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lector VARCHAR(255) NOT NULL,
    DNI VARCHAR(10) NOT NULL,
    estado ENUM('alta', 'baja') DEFAULT 'alta',
    n_prestado INT DEFAULT 0
)";

$sql_prestamo = "CREATE TABLE IF NOT EXISTS prestamo (
    id_lector INT,
    id_libro INT,
    FOREIGN KEY (id_lector) REFERENCES lectores(id),
    FOREIGN KEY (id_libro) REFERENCES libros(id)
)";


mysqli_query($conexion, $sql_libros);
mysqli_query($conexion, $sql_lectores);
mysqli_query($conexion, $sql_prestamo);


mysqli_query($conexion, "INSERT INTO libros (nombre, autor, publicacion, ISBN, n_disponibles, n_totales) VALUES ('Libro de Prueba', 'Autor de Prueba', 2022, 1234567890, 5, 10)");
mysqli_query($conexion, "INSERT INTO lectores (lector, DNI) VALUES ('Lector de Prueba', 'ABC123456')");
mysqli_query($conexion, "INSERT INTO prestamo (id_lector, id_libro) VALUES (1, 1)");


mysqli_close($conexion);
?>
