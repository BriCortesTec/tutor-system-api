<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$id = $_POST['id_aviso'];

$sql = "
DELETE FROM tuto.avisos
WHERE id_aviso = '$id'
";

$resultado = pg_query($conexion, $sql);

echo json_encode([
    "success" => $resultado
]);

?>