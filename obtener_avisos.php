<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$sql = "
SELECT *
FROM tuto.avisos
ORDER BY fecha DESC
";

$resultado = pg_query($conexion, $sql);

$avisos = [];

while($fila = pg_fetch_assoc($resultado)){

    $avisos[] = $fila;

}

echo json_encode($avisos);

?>