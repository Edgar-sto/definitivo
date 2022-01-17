<?php
/**
 * Variables para conexion
 */
$serverlocal     = "localhost";
$userlocal       = "root";
$passwordlocal   = "";
$databaselocal   = "telefonia";
$conexionlocal   = mysqli_connect($serverlocal, $userlocal, $passwordlocal, $databaselocal);
if (!$conexionlocal) {
    die("!Servidor no encontrado !" . mysqli_connect_error());
} else {
    /*echo"conexion exitosa";
        echo"<br>";*/
}

$consulta_marcatel   =   "SELECT
    (SELECT SUM(consumo_movil) FROM consumo_telefonia_mf
    WHERE fecha_inicio>='2021-01-01 00:00:00' AND fecha_fin<='2021-01-31 23:59:59'
    AND prefijo IN ('9','777')) AS movil_marcatel,
    
    (SELECT SUM(consumo_fijo) FROM consumo_telefonia_mf
    WHERE fecha_inicio>='2021-01-01 00:00:00' AND fecha_fin<='2021-01-31 23:59:59'
    AND prefijo IN ('9','777')) AS fijo_marcatel";
$res_consulta   =   mysqli_query($conexionlocal, $consulta_marcatel);
while ($mos_consulta    =   mysqli_fetch_assoc($res_consulta)) {
    $movil_marcatel  =   $mos_consulta['movil_marcatel'];
    $fijo_marcatel   =   $mos_consulta['fijo_marcatel'];
    $con_total_marcatel = $movil_marcatel + $fijo_marcatel;
}
