<?php
require 'conexion.php';
$prefijos    =   array("11", "14", "15", "28","444", "555", "777", "999");
$date = "2021-08-28";
date_default_timezone_set('America/Mexico_City');
// $date = new DateTime();
// $date->sub(new DateInterval('P1D'));
// $date     =   $date->format('Y-m-d'); //Datos a guardar date('Y-m-d')
if ($date) {
    //echo $date;
} else { // format failed
    echo "Unknown Time";
}
$conexion = conexion_tel_21('telefonia', '10.9.2.21');
$conexionlocal = conexion_db('telefonia', 'localhost');
$tamaño_prefijos = count($prefijos);
echo "Consumo del día $date\n";
$servidores = array(/*"5", "6", "8", "9", "11", */"14"/*,"15", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201"*/);
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte    =   $servidores[$x];
    for ($prefix = 0; $prefix < $tamaño_prefijos; $prefix++) {
        $prefijo = $prefijos[$prefix];
        echo "  Reporte $reporte con el prefijo $prefijo.       ";
        $consulta = "SELECT SUM(redondea_a_minutos) AS total FROM telefonia.reporte_$reporte
                        WHERE u_start_time>='$date 00:00:00' AND  u_start_time<='$date 23:59:59'
                        AND c_dialstatus IN ('ANSWER') AND d_carrier_prefix  IN  ('$prefijo')";
        $query  =   mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
        while ($row = mysqli_fetch_assoc($query)) {
            //var_dump($row['total']);
            if (empty($row['total'])) {
                //espacio vacio no hace nada
                echo " ! SIN REGISTROS ¡\n";
            } else {
                $insert = "INSERT INTO `consumo_diario_servidor` (`id_consumo_diario`,`reporte`,`prefijo`,`consumo_diario`,`fecha`)
                               VALUES (NULL, '10.9.2.{$reporte}','{$prefijo}','{$row['total']}','{$date} 23:59:59')";
                //echo "\n";
                //$insertar_ =   mysqli_query($conexionlocal, $insert);
                if ($insertar_ =   mysqli_query($conexionlocal, $insert)) {
                    echo "Record saved successfully";
                    echo "\n";
                } else {
                    echo "El registro de la fecha {$date} del Reporte {$reporte} no se guardo en la Base";
                    echo "\n";
                }
            }
        }
        echo "\n";
    }
}
