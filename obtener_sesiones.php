<?php
// obtener_sesiones.php
// Devuelve todas las sesiones con nombre completo del alumno.

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

include("conexion.php");

// JOIN con alumnos para traer el nombre sin requerir un segundo fetch en el frontend
$sql = "
    SELECT
        s.id_sesion,
        s.id_alumno,
        CONCAT(a.nombre, ' ', a.apellido) AS nombre_alumno,
        s.fecha::text,
        s.tema,
        s.notas,
        s.estatus
    FROM tuto.sesiones s
    JOIN tuto.alumnos a ON s.id_alumno = a.id_alumno
    ORDER BY s.fecha DESC
";

$resultado = pg_query($conexion, $sql);

$sesiones = [];
while ($fila = pg_fetch_assoc($resultado)) {
    $sesiones[] = $fila;
}

echo json_encode($sesiones);
?>
