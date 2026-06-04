<?php
// agregar_evento.php
// Registra un evento asociado a un alumno específico.
// Recibe JSON: { id_alumno, titulo, descripcion, fecha }

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Content-Type: application/json");

// Responder preflight de CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

include("conexion.php");

// Leer body JSON
$data = json_decode(file_get_contents("php://input"), true);

// Validar campos obligatorios
if (
    empty($data["id_alumno"]) ||
    empty($data["titulo"])    ||
    empty($data["fecha"])
) {
    echo json_encode([
        "success" => false,
        "mensaje" => "id_alumno, titulo y fecha son obligatorios."
    ]);
    exit;
}

$id_alumno   = pg_escape_string($conexion, $data["id_alumno"]);
$titulo      = pg_escape_string($conexion, $data["titulo"]);
$descripcion = pg_escape_string($conexion, $data["descripcion"] ?? "");
$fecha       = pg_escape_string($conexion, $data["fecha"]);

// Generar ID autoincrementado con prefijo EVT
$sqlId = "SELECT COUNT(*) AS total FROM tuto.eventos";
$resId = pg_query($conexion, $sqlId);
$filaId = pg_fetch_assoc($resId);
$nuevoId = "EVT" . ($filaId["total"] + 1);

// Insertar
$sql = "
    INSERT INTO tuto.eventos
        (id_evento, id_alumno, titulo, descripcion, fecha, fecha_creacion)
    VALUES
        ('$nuevoId', '$id_alumno', '$titulo', '$descripcion', '$fecha', NOW())
";

$resultado = pg_query($conexion, $sql);

echo json_encode([
    "success"   => (bool) $resultado,
    "id_evento" => $nuevoId,
    "mensaje"   => $resultado ? "Evento registrado." : pg_last_error($conexion),
]);
?>
