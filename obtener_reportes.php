<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$sql = "
SELECT * FROM tuto.reportes
ORDER BY fecha DESC
";

$resultado = pg_query($conexion, $sql);

$reportes = [];

while ($fila = pg_fetch_assoc($resultado)) {

    $reportes[] = $fila;

}

echo json_encode($reportes);

?>