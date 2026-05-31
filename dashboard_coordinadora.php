<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("conexion.php");

$estudiantes = pg_fetch_assoc(
    pg_query(
        $conexion,
        "SELECT COUNT(*) as total FROM tuto.alumnos"
    )
);

$tutores = pg_fetch_assoc(
    pg_query(
        $conexion,
        "SELECT COUNT(*) as total FROM tuto.tutores"
    )
);


echo json_encode([

    "totalEstudiantes" => $estudiantes['total'],
    "tutoresActivos" => $tutores['total'],
    "reportes" => 96,
    "riesgo" => 38,

    "riesgoAlto" => 200,
    "riesgoMedio" => 20,
    "riesgoBajo" => 10,
    "sinRiesgo" => 5

]);

"tutoriasMeses" => [

    ["mes" => "Oct", "tutorias" => 85],
    ["mes" => "Nov", "tutorias" => 92],
    ["mes" => "Dic", "tutorias" => 78],
    ["mes" => "Ene", "tutorias" => 95],
    ["mes" => "Feb", "tutorias" => 110],
    ["mes" => "Mar", "tutorias" => 118]

]

?>