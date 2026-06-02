<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Content-Type: application/json");

include("conexion.php");

// =======================================
// TOTAL REPORTES
// =======================================

$queryReportes = "

SELECT COUNT(*) AS total

FROM tuto.reportes

";

$resultadoReportes = pg_query(
  $conexion,
  $queryReportes
);

$totalReportes = pg_fetch_assoc(
  $resultadoReportes
);

// =======================================
// REPORTES PENDIENTES
// =======================================

$queryPendientes = "

SELECT COUNT(*) AS pendientes

FROM tuto.reportes

WHERE estatus = 'Pendiente'

";

$resultadoPendientes = pg_query(
  $conexion,
  $queryPendientes
);

$pendientes = pg_fetch_assoc(
  $resultadoPendientes
);

// =======================================
// REPORTES COMPLETADOS
// =======================================

$queryCompletados = "

SELECT COUNT(*) AS completados

FROM tuto.reportes

WHERE estatus = 'Completado'

";

$resultadoCompletados = pg_query(
  $conexion,
  $queryCompletados
);

$completados = pg_fetch_assoc(
  $resultadoCompletados
);

// =======================================
// MOTIVOS
// =======================================

$queryMotivos = "

SELECT motivo, COUNT(*) AS total

FROM tuto.reportes

GROUP BY motivo

";

$resultadoMotivos = pg_query(
  $conexion,
  $queryMotivos
);

$motivos = [];

while ($fila = pg_fetch_assoc($resultadoMotivos)) {

  $motivos[] = $fila;

}
$queryMensual = "

SELECT

  EXTRACT(MONTH FROM fecha) AS mes,

  COUNT(*) AS total

FROM tuto.reportes

WHERE fecha >= CURRENT_DATE - INTERVAL '6 months'

GROUP BY mes

ORDER BY mes

";

$resultadoMensual = pg_query(
  $conexion,
  $queryMensual
);

$mensual = [];

while ($fila = pg_fetch_assoc($resultadoMensual)) {

  $mensual[] = $fila;

}

// =======================================

echo json_encode([

  "total_reportes" => $totalReportes["total"],

  "pendientes" => $pendientes["pendientes"],

  "completados" => $completados["completados"],

  "motivos" => $motivos,
  "mensual" => $mensual

]);