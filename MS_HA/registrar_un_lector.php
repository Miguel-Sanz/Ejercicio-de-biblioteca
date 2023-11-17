<?php
$nombre_lector = "Nuevo Lector";
$dni_lector = "123456789X";

$sql_registro_lector = "INSERT INTO lectores (lector, DNI) VALUES ('$nombre_lector', '$dni_lector')";
mysqli_query($conexion, $sql_registro_lector);

