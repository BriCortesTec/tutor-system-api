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

    echo json_encode([
        "success" => true,
        "rol" => $usuario['nombre_rol']
    ]);

}else{

    echo json_encode([
        "success" => false
    ]);

}
?>