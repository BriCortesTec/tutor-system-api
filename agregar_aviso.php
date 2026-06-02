<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$prioridad = $_POST['prioridad'];

$sqlId = "
SELECT COUNT(*) AS total
FROM tuto.avisos
";

$resultadoId = pg_query($conexion, $sqlId);

$fila = pg_fetch_assoc($resultadoId);

$nuevoId = "AVI" . ($fila['total'] + 1);

$sql = "
INSERT INTO tuto.avisos
VALUES
(
    '$nuevoId',
    '$titulo',
    '$descripcion',
    '$prioridad',
    NOW(),
    false
)
";

$resultado = pg_query($conexion, $sql);

echo json_encode([
    "success" => $resultado
]);

?>