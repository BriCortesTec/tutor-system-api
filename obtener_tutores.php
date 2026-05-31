<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$sql = "
SELECT *
FROM tuto.tutores
";

$resultado = pg_query($conexion, $sql);

$tutores = [];

while($fila = pg_fetch_assoc($resultado)) {

    $tutores[] = $fila;

}

echo json_encode($tutores);

?>