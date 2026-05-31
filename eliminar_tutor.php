<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$id_tutor = $_POST['id_tutor'];

$sqlBuscar = "
SELECT id_usuario
FROM tuto.tutores
WHERE id_tutor = '$id_tutor'
";

$resultado = pg_query($conexion, $sqlBuscar);

$tutor = pg_fetch_assoc($resultado);

$id_usuario = $tutor['id_usuario'];

$sqlTutor = "
DELETE FROM tuto.tutores
WHERE id_tutor = '$id_tutor'
";

pg_query($conexion, $sqlTutor);

$sqlUsuario = "
DELETE FROM tuto.usuarios
WHERE id_usuario = '$id_usuario'
";

pg_query($conexion, $sqlUsuario);

echo json_encode([
  "success" => true
]);

?>