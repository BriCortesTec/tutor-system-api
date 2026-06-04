<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$idTutor = $_GET["id_tutor"];

$sql = "
SELECT *
FROM tuto.avisos_tutores
WHERE id_tutor = '$idTutor'
ORDER BY fecha DESC
";

$resultado = pg_query($conexion, $sql);

$avisos = [];

while($fila = pg_fetch_assoc($resultado)){

    $avisos[] = $fila;

}

echo json_encode($avisos);

?>