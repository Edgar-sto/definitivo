<?php
require 'conexion.php';
$prefijos    =   array("14", "555");
date_default_timezone_set('America/Mexico_City');
//$date="2021-09-16";
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
$tamaño_prefijos = count($prefijos);
echo "Busqueda del dia $date con HAZZ \n";
echo "\n";
$servidores = array(/*"5", "6", "8", "9", "11", "14", */"15", "22", "27", "28", "29", "30", "34", "35", "36", "37", "38", "39", "40", "41",
    "42", "43", "44", "45", "46", "47", "48", "201");
//$servidores = array("5","29","35","41","42");
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar
    for ($p = 0; $p < $tamaño_prefijos; $p++) {
        $prefijo = $prefijos[$p];
        echo " - Reporte $reporte \n";
        echo "\n";
        $query_campaña = "SELECT DISTINCT d_campaign_id AS campaing FROM reporte_$reporte
            WHERE u_start_time>='$date 00:00:00' AND  u_start_time<='$date 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_carrier_prefix ='$prefijo'
            ORDER BY d_campaign_id";
        $resultado_query_campaña =   mysqli_query($conexion, $query_campaña);
        while ($mostrar_query_campaña   =   mysqli_fetch_assoc($resultado_query_campaña)) {
            $campaing   =   $mostrar_query_campaña['campaing']; //Resultado de la campaña
            if (empty($campaing)) {
                //espacio vacio no hace nada 
            } else {
                $query_grupo = "SELECT DISTINCT (d_user_group) FROM telefonia.reporte_$reporte
                    WHERE u_start_time>='$date 00:00:00' AND  u_start_time<='$date 23:59:59'
                    AND c_dialstatus in ('ANSWER') AND d_campaign_id ='$campaing' AND d_carrier_prefix ='$prefijo'
                    ORDER BY d_user_group";
                $resultado_query_grupo  = mysqli_query($conexion, $query_grupo);
                while ($mostrar_res_query_grupo = mysqli_fetch_assoc($resultado_query_grupo)) {
                    $grupo = $mostrar_res_query_grupo['d_user_group']; //Resultado del grupo
                    if (empty($grupo)) {
                        //espacio vacio no hace nada 
                    } else {
                        $query_sum_mf = "SELECT
                            (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                            where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                            AND d_user_group='$grupo' AND d_tipo_numero='movil') AS MOVIL,

                            (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                            where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                            AND d_user_group='$grupo' AND d_tipo_numero='fijo') AS FIJO ";
                        $resultado_query_sum_mf =   mysqli_query($conexion, $query_sum_mf);
                        while ($mostrar_query_sum_mf = mysqli_fetch_assoc($resultado_query_sum_mf)) {
                            $movil  =   $mostrar_query_sum_mf['MOVIL'];
                            $fijo   =   $mostrar_query_sum_mf['FIJO'];
                            if (empty($movil)) {
                                $movil == 0;
                            }
                            if (empty($fijo)) {
                                $fijo == 0;
                            }
                            $insertar = "INSERT INTO `consumo_telefonia_mf` (`unique_id`,`servidor`, `prefijo`, `campania`, `grupo`, `consumo_movil`, `consumo_fijo`, `fecha_inicio`,`fecha_fin`)
                                VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$grupo','$movil','$fijo','$date 00:00:00','$date 23:59:59')";
                            //$insertar_mf =   mysqli_query($conexionlocal, $insertar);
                            if (mysqli_query($conexionlocal, $insertar)) {
                                echo "Consumo Movil y Fijo del {$reporte} y campaña {$campaing} agregado con exito";
                                echo "\n";
                            } else {
                                echo "Error: " . $insertar . "<br>" . mysqli_error($conexionlocal);
                                echo "\n";
                            }
                            // echo "Consumo M-F agregado con exito";
                            // echo "\n";
                        }
                    }
                    //Fin MOVIL Y FIJO
                }
                //Inicio DROP-BUZON
                $query_sum_drop_buzon = "SELECT
                    (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                    where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilDROPS,
                    (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                    where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijoDROPS,

                    (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                    where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilbuzon,
                    (SELECT SUM(u_length_in_sec) FROM telefonia.reporte_$reporte
                    where u_start_time>='$date 00:00:00'  and  u_start_time<='$date 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijobuzon ";
                //Fin DROP-BUZON
                $resultado_query_sum_drop_buzon    =   mysqli_query($conexion, $query_sum_drop_buzon);
                while ($mostrar_query_sum_drop_buzon   =   mysqli_fetch_assoc($resultado_query_sum_drop_buzon)) {
                    $m_drop =   $mostrar_query_sum_drop_buzon['movilDROPS'];
                    $f_drop =   $mostrar_query_sum_drop_buzon['fijoDROPS'];
                    $m_buzon =   $mostrar_query_sum_drop_buzon['movilbuzon'];
                    $f_buzon =   $mostrar_query_sum_drop_buzon['fijobuzon'];
                    $insertar_drop = "INSERT INTO `consumo_telefonia_drop` (`unique_id`,`reporte`, `prefijo`, `campania`, `consumo_drop_movil`, `consumo_drop_fijo`, `fecha_inicio`,`fecha_fin`)
                        VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$m_drop','$f_drop','$date 00:00:00','$date 23:59:59')";
                    //$insertar_drop =   mysqli_query($conexionlocal, $insertar_drop);
                    if (mysqli_query($conexionlocal, $insertar_drop)) {
                        echo "Drop Movil y Fijo del {$reporte} y campaña {$campaing} agregado con exito";
                        echo "\n";
                    } else {
                        echo "Error: " . $insertar_drop . "<br>" . mysqli_error($conexionlocal);
                    }
                    // echo "Consumo DM-DF agregado con exito";
                    // echo "\n";
                    $insertar_buzon = "INSERT INTO `consumo_telefonia_buzon` (`unique_id`,`reporte`, `prefijo`, `campania`, `consumo_buzon_movil`, `consumo_buzon_fijo`, `fecha_inicio`,`fecha_fin`)
                        VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$m_buzon','$f_buzon','$date 00:00:00','$date 23:59:59')";
                    //$insertar_buzon =   mysqli_query($conexionlocal, $insertar_buzon);
                    if (mysqli_query($conexionlocal, $insertar_buzon)) {
                        echo "Buzón Movil y Fijo del {$reporte} y campaña {$campaing} agregado con exito";
                        echo "\n";
                    } else {
                        echo "Error: " . $insertar_buzon . "<br>" . mysqli_error($conexionlocal);
                    }
                    // echo "Consumo BM-BF agregado con exito";
                    // echo "\n";
                }
            }
        }
    }
}
