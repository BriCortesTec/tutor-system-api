<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$departamento = $_POST['departamento'];

$id_usuario = "USR" . rand(100,999);
$id_tutor = "TUT" . rand(100,999);
$sqlUsuario = "
INSERT INTO tuto.usuarios
VALUES (
    '$id_usuario',
    '$nombre',
    '$correo',
    '$password',
    'ROL2'
)
";

pg_query($conexion, $sqlUsuario);

$sqlTutor = "
INSERT INTO tuto.tutores
VALUES (
    '$id_tutor',
    '$nombre',
    '$departamento',
    '$id_usuario'
)
";

pg_query($conexion, $sqlTutor);

echo json_encode([
    "success" => true
]);

?>