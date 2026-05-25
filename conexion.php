<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = pg_connect("
    host=localhost
    port=5432
    dbname=tuto
    user=postgres
    password=bakarimasta26
");

if(!$conn){
    die("Error de conexión pipipip");
}


