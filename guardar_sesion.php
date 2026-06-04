<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$id_alumno = $_POST['id_alumno'];
$id_tutor = $_POST['id_tutor'];
$tema = $_POST['tema'];
$fecha = $_POST['fecha'];
$modalidad = $_POST['modalidad'];
$lugar = $_POST['lugar'];


// ======================
// GUARDAR SESIÓN
// ======================

$sql = "
INSERT INTO tuto.sesiones
(
    id_alumno,
    id_tutor,
    tema,
    fecha,
    modalidad,
    lugar,
    estado
)
VALUES
(
    '$id_alumno',
    '$id_tutor',
    '$tema',
    '$fecha',
    '$modalidad',
    '$lugar',
    'Pendiente'
)
RETURNING id_sesion
";

$resultado = pg_query($conexion, $sql);

if(!$resultado){

    echo json_encode([
        "success" => false,
        "mensaje" => "Error al guardar la sesión"
    ]);

    exit;

}

$fila = pg_fetch_assoc($resultado);

$idSesion = $fila['id_sesion'];


// ======================
// OBTENER NOMBRE ALUMNO
// ======================

$sqlAlumno = "
SELECT nombre
FROM tuto.alumnos
WHERE id_alumno = '$id_alumno'
";

$resAlumno = pg_query($conexion, $sqlAlumno);

$alumno = pg_fetch_assoc($resAlumno);

$nombreAlumno = $alumno['nombre'];


// ======================
// CREAR AVISO AL TUTOR
// ======================

$sqlAviso = "
INSERT INTO tuto.avisos_tutores
(
    id_tutor,
    titulo,
    descripcion,
    categoria,
    prioridad,
    fecha,
    leido,
    id_creador,
    id_sesion
)
VALUES
(
    '$id_tutor',
    'Nueva solicitud de tutoría',
    '$nombreAlumno solicitó una tutoría sobre $tema.',
    'Tutorías',
    'Normal',
    NOW(),
    false,
    '$id_alumno',
    '$idSesion'
)
";

pg_query($conexion, $sqlAviso);


// ======================
// RESPUESTA
// ======================

echo json_encode([
    "success" => true,
    "id_sesion" => $idSesion
]);

?>