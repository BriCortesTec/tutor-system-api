<?php

$conexion = pg_connect("
host=localhost
port=5432
dbname=tuto
user=postgres
password=23161146
");

if(!$conexion){

    echo "Error de conexión";

}

?>