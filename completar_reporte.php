<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id_reporte"];

$query = "

UPDATE tuto.reportes

SET estatus = 'Completado'

WHERE id_reporte = $id

";

$resultado = pg_query($conexion, $query);

echo json_encode([
  "success" => $resultado
]);

?>