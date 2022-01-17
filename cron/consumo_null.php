<?php
//require 'conexion.php';
require '../cron/conexion.php';
$prefijos    =   array("11", "999", "14", "555", "15", "777", "444");
//$prefijos   =   array("14","555");
//$date = "2021-06-27";
date_default_timezone_set('America/Mexico_City');
$date = new DateTime();
$date->sub(new DateInterval('P1D'));
$date     =   $date->format('Y-m-d'); //Datos a guardar date('Y-m-d')
if ($date) {
    //echo $date;
} else { // format failed
    echo "Unknown Time";
}
$conexion = conexion_tel_21('telefonia', '10.9.2.21');
$conexionlocal = conexion_db('telefonia', 'localhost');
$servidores = array("5", "6", "8", "9", "11", "15", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte    =   $servidores[$x];
    $tamaño_prefijos = count($prefijos);
    for ($p = 0; $p < $tamaño_prefijos; $p++) {
        $prefijo = $prefijos[$p];
        if ($prefijo == '14' || $prefijo == '555') {
            echo "Consumo del $date\n";
            echo " Reporte $reporte  con $prefijo\n";
            echo $consulta = "SELECT SUM(u_length_in_sec) AS consumo FROM telefonia.reporte_{$reporte}
                            WHERE u_start_time>='{$date} 00:00:00'  
                            AND  u_start_time<='{$date} 23:00:00' 
                            AND c_dialstatus IN ('ANSWER') 
                            AND d_user_group ='' 
                            AND d_carrier_prefix IN ('{$prefijo}')";
            echo "\n";
            $query  =   mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            while ($row = mysqli_fetch_assoc($query)) {
                //var_dump($row['total']);
                if (empty($row['consumo'])) {
                    //espacio vacio no hace nada
                } else {
                    echo $insert = "INSERT INTO `consumo_null` (`id_consumo_null`,`reporte`,`prefijo`,`consumo_null`,`fecha_inicio`,`fecha_fin`) 
                    VALUES (NULL, '10.9.2.{$reporte}','{$prefijo}','{$row['consumo']}','{$date} 00:00:00','{$date} 23:59:59')";

                    if ($insertar_ =   mysqli_query($conexionlocal, $insert) or die(mysqli_error($conexion))) {
                        echo "Record saved successfully";
                        echo "\n";
                    } else {
                        echo "El registro de la fecha {$date} del Reporte {$reporte} no se guardo en la Base";
                        echo "\n";
                    }
                }
            }
            echo "\n";
        } else {
            echo "Consumo del $date\n";
            echo " Reporte $reporte  con $prefijo\n";
            echo $consulta = "SELECT SUM(redondea_a_minutos) AS consumo FROM telefonia.reporte_{$reporte}
                            WHERE u_start_time>='{$date} 00:00:00'  
                            AND  u_start_time<='{$date} 23:00:00' 
                            AND c_dialstatus IN ('ANSWER') 
                            AND d_user_group ='' 
                            AND d_carrier_prefix IN ('{$prefijo}')";
            //echo "\n";
            $query  =   mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            while ($row = mysqli_fetch_assoc($query)) {
                //var_dump($row['total']);
                if (empty($row['consumo'])) {
                    //espacio vacio no hace nada
                } else {
                    echo $insert = "INSERT INTO `consumo_null` (`id_consumo_null`,`reporte`,`prefijo`,`consumo_null`,`fecha_inicio`,`fecha_fin`) 
                    VALUES (NULL, '10.9.2.{$reporte}','{$prefijo}','{$row['consumo']}','{$date} 00:00:00','{$date} 23:59:59')";

                    if ($insertar_ =   mysqli_query($conexionlocal, $insert) or die(mysqli_error($conexion))) {
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
}
