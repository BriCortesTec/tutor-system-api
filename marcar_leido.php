<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$id = $_POST['id_aviso'];

$sql = "
UPDATE tuto.avisos
SET leido = true
WHERE id_aviso = '$id'
";

$resultado = pg_query($conexion, $sql);

echo json_encode([
    "success" => $resultado
]);

$sqlAviso = "
INSERT INTO tuto.avisos
VALUES
(
    'AVI' || FLOOR(RANDOM()*10000),
    'Nuevo tutor registrado',
    'Se agregó un nuevo tutor al sistema',
    'Normal',
    NOW(),
    false
)
";

pg_query($conexion, $sqlAviso);

?>