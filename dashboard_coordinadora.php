<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$sqlEstudiantes = "
SELECT COUNT(*) AS total
FROM tuto.alumnos
";

$sqlTutores = "
SELECT COUNT(*) AS total
FROM tuto.tutores
";

$resultadoEstudiantes = pg_query($conexion, $sqlEstudiantes);
$resultadoTutores = pg_query($conexion, $sqlTutores);

$totalEstudiantes = pg_fetch_assoc($resultadoEstudiantes)['total'];
$totalTutores = pg_fetch_assoc($resultadoTutores)['total'];

echo json_encode([

    "totalEstudiantes" => $totalEstudiantes,

    "tutoresActivos" => $totalTutores,

    "reportes" => 24,

    "riesgo" => 7,

    "riesgoAlto" => 7,
    "riesgoMedio" => 15,
    "riesgoBajo" => 32,
    "sinRiesgo" => 40,

    "tutorias" => [
        ["mes" => "Oct", "cantidad" => 30],
        ["mes" => "Nov", "cantidad" => 42],
        ["mes" => "Dic", "cantidad" => 35],
        ["mes" => "Ene", "cantidad" => 50],
        ["mes" => "Feb", "cantidad" => 61],
        ["mes" => "Mar", "cantidad" => 70]
    ]

]);

?>