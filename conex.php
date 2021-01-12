<?php

$serverName = "localhost";

$cnInfo = array("Database" => "lacteos", "Characterset" => "UTF-8");
$cn = sqlsrv_connect($serverName, $cnInfo);

if ($cn) {
    echo "conexion exitosa inice secion!<br>";
} else {
    echo "No hay conexion <br>";
    die(print_r(sqlsrv_errors(), true));
}
?>
