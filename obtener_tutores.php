<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");



$sql = "
SELECT
    id_tutor,
    nombre
FROM tuto.tutores
ORDER BY nombre
";

$resultado = pg_query($conexion, $sql);

$tutores = [];

while($fila = pg_fetch_assoc($resultado)){

    $tutores[] = $fila;

}

echo json_encode($tutores);

?>