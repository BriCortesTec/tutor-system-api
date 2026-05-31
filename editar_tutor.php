<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$id_tutor = $_POST['id_tutor'];
$id_usuario = $_POST['id_usuario'];

$nombre = $_POST['nombre'];
$departamento = $_POST['departamento'];

$sqlTutor = "
UPDATE tuto.tutores
SET
  nombre = '$nombre',
  departamento = '$departamento'
WHERE id_tutor = '$id_tutor'
";

pg_query($conexion, $sqlTutor);

$sqlUsuario = "
UPDATE tuto.usuarios
SET
  nombre = '$nombre'
WHERE id_usuario = '$id_usuario'
";

pg_query($conexion, $sqlUsuario);

echo json_encode([
  "success" => true
]);

?>