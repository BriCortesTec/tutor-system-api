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

<<<<<<< HEAD
    $idTutor = null;
    $idAlumno = null;

    // ===== TUTOR =====
    if($usuario['nombre_rol'] == 'Tutor'){

        $sqlTutor = "
        SELECT id_tutor
        FROM tuto.tutores
        WHERE id_usuario = '".$usuario['id_usuario']."'
        ";

        $resultadoTutor = pg_query($conexion, $sqlTutor);

        if(pg_num_rows($resultadoTutor) > 0){

            $tutor = pg_fetch_assoc($resultadoTutor);

            $idTutor = $tutor['id_tutor'];

        }

    }

    // ===== ESTUDIANTE =====
    if($usuario['nombre_rol'] == 'Estudiante'){

        $sqlAlumno = "
        SELECT id_alumno
        FROM tuto.alumnos
        WHERE id_usuario = '".$usuario['id_usuario']."'
        ";

        $resultadoAlumno = pg_query($conexion, $sqlAlumno);

        if(pg_num_rows($resultadoAlumno) > 0){

            $alumno = pg_fetch_assoc($resultadoAlumno);

            $idAlumno = $alumno['id_alumno'];

        }

    }

    echo json_encode([
        "success" => true,
        "rol" => $usuario['nombre_rol'],
        "nombre" => $usuario['nombre'],
        "id_tutor" => $idTutor,
        "id_alumno" => $idAlumno
=======
    echo json_encode([
        "success"  => true,
        "rol"      => $usuario['nombre_rol'],
        "nombre"   => $usuario['nombre'],
        "id_tutor" => $usuario['id_tutor'] ?? null
>>>>>>> dd1b07ada5a57780ce68bdccb6aecad4fd696f5e
    ]);

} else {

    echo json_encode([
        "success" => false
    ]);

}
<<<<<<< HEAD

?>
=======
?>
>>>>>>> dd1b07ada5a57780ce68bdccb6aecad4fd696f5e
