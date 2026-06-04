<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$idAviso = $_POST["id_aviso"];

$sql = "
UPDATE tuto.avisos_tutores
SET leido = true
WHERE id_aviso = '$idAviso'
";

$resultado = pg_query($conexion, $sql);

echo json_encode([
    "success" => $resultado ? true : false
]);

?>