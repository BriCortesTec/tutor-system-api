<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
error_reporting(E_ALL);

ini_set('display_errors', 1);
include("conexion.php");

require("fpdf/fpdf.php");

$id = $_GET["id"];

// ==========================
// CONSULTAR REPORTE
// ==========================

$query = "

SELECT *

FROM tuto.reportes

WHERE id_reporte = '$id'

";

$resultado = pg_query($conexion, $query);

$reporte = pg_fetch_assoc($resultado);

// ==========================
// CREAR PDF
// ==========================

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);

$pdf->Cell(
  190,
  10,
    mb_convert_encoding(
  'Reporte de Tutoría',
  'ISO-8859-1',
  'UTF-8'
),
  0,
  1,
  'C'
);

$pdf->Ln(10);

// ==========================
// DATOS
// ==========================

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'Estudiante:', 0, 0);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(
  100,
  10,
  mb_convert_encoding(
  $reporte["estudiante"],
  'ISO-8859-1',
  'UTF-8'
),
  0,
  1
);

// --------------------------

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'Tutor:', 0, 0);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(
  100,
  10,
  mb_convert_encoding(
  $reporte["tutor"],
  'ISO-8859-1',
  'UTF-8'
),
  0,
  1
);

// --------------------------

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'Fecha:', 0, 0);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(
  100,
  10,
  $reporte["fecha"],
  0,
  1
);

// --------------------------

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'Estatus:', 0, 0);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(
  100,
  10,
  mb_convert_encoding(
  $reporte["estatus"],
  'ISO-8859-1',
  'UTF-8'
),
  0,
  1
);

// --------------------------

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(50, 10, 'Motivo:', 0, 1);

$pdf->SetFont('Arial', '', 12);

$pdf->MultiCell(
  180,
  10,
  mb_convert_encoding(
  $reporte["motivo"],
  'ISO-8859-1',
  'UTF-8'
)
);

// ==========================
// GUARDAR PDF
// ==========================

$ruta_pdf = "reportes_pdf/" . $id . ".pdf";

$pdf->Output(
  'F',
  $ruta_pdf
);

$queryActualizar = "

UPDATE tuto.reportes

SET estatus = 'Completado'

WHERE id_reporte = '$id'

";

pg_query(
  $conexion,
  $queryActualizar
);

header("Location: $ruta_pdf");

exit;

// ==========================
// GUARDAR RUTA EN POSTGRESQL
// ==========================

$update = "

UPDATE tuto.reportes

SET ruta_pdf = '$ruta_pdf'

WHERE id_reporte = '$id'

";

pg_query($conexion, $update);

// ==========================
// RESPUESTA
// ==========================

echo json_encode([

  "success" => true,

  "ruta_pdf" => $ruta_pdf

]);

?>