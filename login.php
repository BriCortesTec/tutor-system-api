<?php

include("conexion.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "
SELECT u.*, r.nombre_rol
FROM tuto.usuarios u
JOIN tuto.roles r
ON u.id_rol = r.id_rol
WHERE correo='$correo'
AND password='$password'
";

$resultado = pg_query($conexion, $sql);

if(pg_num_rows($resultado) > 0){

    $usuario = pg_fetch_assoc($resultado);

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
    ]);

}else{

    echo json_encode([
        "success" => false
    ]);

}

?>