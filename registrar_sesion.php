<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include("conexion.php");

$raw  = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data || empty($data["tema"]) || empty($data["fecha"]) || empty($data["id_tutor"])) {
    echo json_encode(["success" => false, "error" => "Faltan datos requeridos."]);
    exit();
}

$id_tutor  = pg_escape_string($conexion, $data["id_tutor"]);
$tema      = pg_escape_string($conexion, $data["tema"]);
$fecha     = pg_escape_string($conexion, $data["fecha"]);
$hora      = pg_escape_string($conexion, $data["hora"] ?? "");
$alumno    = pg_escape_string($conexion, $data["alumno"] ?? "");
$id_sesion = 'SES' . time();

// Concatenar hora al tema si viene
$tema_completo = $alumno ? "[$alumno] $tema" : $tema;

$query = "
    INSERT INTO tuto.sesiones (id_sesion, id_tutor, fecha, tema)
    VALUES ('$id_sesion', '$id_tutor', '$fecha', '$tema_completo')
";

$resultado = pg_query($conexion, $query);

if ($resultado) {
    echo json_encode(["success" => true, "id_sesion" => $id_sesion]);
} else {
    echo json_encode(["success" => false, "error" => pg_last_error($conexion)]);
}
?>
