<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$correo   = $_POST['correo'];
$password = $_POST['password'];

$sql = "
SELECT u.*, r.nombre_rol, t.id_tutor
FROM tuto.usuarios u
JOIN tuto.roles r ON u.id_rol = r.id_rol
LEFT JOIN tuto.tutores t ON t.id_usuario = u.id_usuario
WHERE u.correo = '$correo'
AND u.password = '$password'
";

$resultado = pg_query($conexion, $sql);

if (pg_num_rows($resultado) > 0) {

    $usuario = pg_fetch_assoc($resultado);

    echo json_encode([
        "success"  => true,
        "rol"      => $usuario['nombre_rol'],
        "nombre"   => $usuario['nombre'],
        "id_tutor" => $usuario['id_tutor'] ?? null
    ]);

} else {

    echo json_encode([
        "success" => false
    ]);

}
?>
