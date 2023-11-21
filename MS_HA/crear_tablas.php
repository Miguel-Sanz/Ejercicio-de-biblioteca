<?php
//Conexión a la base de datos
require_once("conecta.php");
$conexion = conecta();
$base_datos = 'biblioteca';
$conexion->select_db($base_datos);
//Creación de las tablas 
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
    id_lector INT NOT NULL,
    id_libro INT NOT NULL,
    CONSTRAINT fk_lector FOREIGN KEY (id_lector) REFERENCES lectores(id),
    CONSTRAINT fk_libro FOREIGN KEY (id_libro) REFERENCES libros(id)
)";

mysqli_query($conexion, $sql_libros);
mysqli_query($conexion, $sql_lectores);
mysqli_query($conexion, $sql_prestamo);

$sql = "SELECT lector FROM lectores";
$resultado = mysqli_query($conexion, $sql) or die("Error al comprobar los datos");

if (mysqli_num_rows($resultado) == 0) {
    $libro1 = "INSERT INTO libros (nombre, autor, publicacion, ISBN, n_disponibles, n_totales) VALUES ('Harry Potter y el prisionero de Azkaban', 'JK Rowling', 1999, 1234567890123, 5, 10)";
    mysqli_query($conexion, $libro1);
    //Realización de los INSERT INTO para añadir datos en las tablas
    mysqli_query($conexion, "INSERT INTO libros (nombre, autor, publicacion, ISBN, n_disponibles, n_totales) VALUES ('Boulevard', 'Flor M. Salvador', 2020, 9789807909068, 7, 10)");
    mysqli_query($conexion, "INSERT INTO lectores (lector, DNI) VALUES ('Fernando Alonso Diaz', '12335678A')");
    mysqli_query($conexion, "INSERT INTO lectores (lector, DNI) VALUES ('Carlos Sainz Vazquez', '12345578N')");
    mysqli_query($conexion, "INSERT INTO prestamo (id_lector, id_libro) VALUES (1, 1)");
    mysqli_query($conexion, "INSERT INTO prestamo (id_lector, id_libro) VALUES (2, 1)");
}

mysqli_close($conexion);
