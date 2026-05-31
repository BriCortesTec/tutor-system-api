<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$query = "SELECT * FROM tuto.alumnos";

$resultado = pg_query($conexion, $query);

$alumnos = [];

while ($fila = pg_fetch_assoc($resultado)) {

    $alumnos[] = $fila;

}

echo json_encode($alumnos);

?>