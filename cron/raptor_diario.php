<?php
require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
$date="2021-08-26";
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
echo "Busqueda del dia $date con RAPTOR \n";
echo "\n";
$servidores = array(/*"5","6","8", "9", "11", "15","22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", */"43", "44", "45", "46", "47", "48", "201");
$tamanio_servidores = count($servidores);
for ($x = 0; $x < $tamanio_servidores; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar
    echo "Reporte $reporte \n";
    echo "\n";
    $obtener_campania_raptor = "SELECT DISTINCT d_campaign_id, d_user_group
        FROM reporte_$reporte
        WHERE u_start_time>='$date 00:00:00'  AND  u_start_time<='$date 23:59:59'
        AND c_dialstatus IN ('ANSWER')
        AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
        ORDER BY d_campaign_id";
    $resultado_query_campania =   mysqli_query($conexion, $obtener_campania_raptor);
    while ($mostrar_query_campania   =   mysqli_fetch_assoc($resultado_query_campania)) {
        $campaing   =   $mostrar_query_campania['d_campaign_id']; //Resultado de la campaña
        $group      =   $mostrar_query_campania['d_user_group'];
        if (empty($campaing) || empty($group)) {
            //espacio vacio no hace nada
        } else {
            //echo "$campaing" . "  " . "$group";
            //echo "\n";
            $insertar   =   "INSERT INTO `consumo_grupos_raptor` (`id_grupos_raptor`, `reporte`, `campania`, `grupos`, `fecha_inicio`, `fecha_fin`)
                            VALUES (NULL, '10.9.2.{$reporte}', '{$campaing}', '{$group}', '{$date} 00:00:00', '{$date} 23:59:59')";
            if ($insertar_ = mysqli_query($conexionlocal, $insertar)) {
                echo "Record saved successfully";
                echo "\n";
            } else {
                echo "El registro de la fecha {$date} del Reporte {$reporte} no se guardo en la Base";
                echo "\n";
            }
        }
    }
    $obtener_campania_raptor2 = "SELECT DISTINCT d_campaign_id
        FROM reporte_$reporte
        WHERE u_start_time>='$date 00:00:00'  AND  u_start_time<='$date 23:59:59'
        AND c_dialstatus IN ('ANSWER')
        AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
        ORDER BY d_campaign_id";
    $resultado_query_campania2 =   mysqli_query($conexion, $obtener_campania_raptor2);
    while ($mostrar_query_campania2   =   mysqli_fetch_assoc($resultado_query_campania2)) {
        $campaing   =   $mostrar_query_campania2['d_campaign_id']; //Resultado de la campaña
        if (empty($campaing) || empty($group)) {
            //espacio vacio no hace nada
        } else {
            // echo "$campaing" . "  " . "$group";
            // echo "\n";
            // echo "\n";

            $obtener_conteo_por_campania = "SELECT COUNT(*) AS consummo
            FROM reporte_$reporte
            WHERE u_start_time>='$date 00:00:00'  AND  u_start_time<='$date 23:59:59'
            AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
            AND c_hangup_cause='21'
            AND c_sip_hangup_cause in('603', '0')
            AND d_campaign_id='$campaing'";
            $res_consumo_por_campania   =   mysqli_query($conexion, $obtener_conteo_por_campania);
            while ($mostrar_consumpo = mysqli_fetch_assoc($res_consumo_por_campania)) {
                $total_consumido    =   $mostrar_consumpo['consummo'];
                //echo "$campaing" . " ---- " . "$total_consumido";
                //echo "\n";
                $insertar_consumo_raptor = "INSERT INTO `consumo_diario_raptor` (`unique_id`, `reporte`, `campania`, `total_raptor`, `fecha_inicio`, `fecha_fin`)
                VALUES (NULL, '10.9.2.{$reporte}', '{$campaing}', '{$total_consumido}', '{$date} 00:00:00', '{$date} 23:59:59')";
                if ($insertar_consumo_raptor_ = mysqli_query($conexionlocal, $insertar_consumo_raptor)) {
                    echo "Count saved successfully";
                    echo "\n";
                } else {
                    echo "El registro de la fecha {$date} del Reporte {$reporte} no se guardo en la Base";
                    echo "\n";
                }
            }
        }
    }
}
