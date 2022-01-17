<?php
require 'conexion.php';
date_default_timezone_set('America/Mexico_City');
//2021-06-$date[$i] = new DateTime();
//2021-06-$date[$i]->sub(new DateInterval('P27D'));
//2021-06-$date[$i]     =   2021-06-$date[$i]->format('Y-m-d'); //Datos a guardar date('Y-m-d')
//if (2021-06-$date[$i]) {
//    //echo 2021-06-$date[$i];
//} else { // format failed
//    echo "Unknown Time";
//}
$conexion = conexion_tel_21('telefonia', '10.9.2.21');
$conexionlocal = conexion_db('telefonia', 'localhost');
$date = array(/*"01","02","03","04","05","06","07","08",*/"09"/*,"10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"*/);
$tam_fechas = count($date);
for ($i=0; $i < $tam_fechas ; $i++)
{
    echo "Busqueda del dia 2021-07-$date[$i] con RAPTOR \n";
    echo "\n";
$servidores = array(/*"5","6","8", "9", "11", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44",*/ "45"/*, "46", "47", "48", "201"*/);
    $tamanio_servidores = count($servidores);
    for ($x = 0; $x < $tamanio_servidores; $x++) {
        $reporte = $servidores[$x]; //Dato a guardar
        echo "Reporte $reporte \n";
        echo "\n";
        $obtener_campania_raptor = "SELECT DISTINCT d_campaign_id, d_user_group
            FROM reporte_$reporte
            WHERE u_start_time>='2021-07-$date[$i] 00:00:00'  AND  u_start_time<='2021-07-$date[$i] 23:59:59'
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
                echo $insertar   =   "INSERT INTO `consumo_grupos_raptor` (`id_grupos_raptor`, `reporte`, `campania`, `grupos`, `fecha_inicio`, `fecha_fin`)
                                VALUES (NULL, '10.9.2.{$reporte}', '{$campaing}', '{$group}', '2021-07-{$date[$i]} 00:00:00', '2021-07-{$date[$i]} 23:59:59')";
                echo "\n";
                if ($insertar_ = mysqli_query($conexionlocal, $insertar)) {
                    echo "Record saved successfully";
                    echo "\n";
                } else {
                    echo "El registro de la fecha 2021-07-{$date[$i]} del Reporte {$reporte} no se guardo en la Base";
                    echo "\n";
                }
            }
        }
        $obtener_campania_raptor2 = "SELECT DISTINCT d_campaign_id
            FROM reporte_$reporte
            WHERE u_start_time>='2021-07-$date[$i] 00:00:00'  AND  u_start_time<='2021-07-$date[$i] 23:59:59'
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
                WHERE u_start_time>='2021-07-$date[$i] 00:00:00'  AND  u_start_time<='2021-07-$date[$i] 23:59:59'
                AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
                AND c_hangup_cause='21'
                AND c_sip_hangup_cause in('603', '0')
                AND d_campaign_id='$campaing'";
                $res_consumo_por_campania   =   mysqli_query($conexion, $obtener_conteo_por_campania);
                while ($mostrar_consumpo = mysqli_fetch_assoc($res_consumo_por_campania)) {
                    $total_consumido    =   $mostrar_consumpo['consummo'];
                    //echo "$campaing" . " ---- " . "$total_consumido";
                    //echo "\n";
                    echo $insertar_consumo_raptor = "INSERT INTO `consumo_diario_raptor` (`unique_id`, `reporte`, `campania`, `total_raptor`, `fecha_inicio`, `fecha_fin`)
                    VALUES (NULL, '10.9.2.{$reporte}', '{$campaing}', '{$total_consumido}', '2021-07-{$date[$i]} 00:00:00', '2021-07-{$date[$i]} 23:59:59')";
                    echo "\n";
                    if ($insertar_consumo_raptor_ = mysqli_query($conexionlocal, $insertar_consumo_raptor)) {
                        echo "Count saved successfully";
                        echo "\n";
                    } else {
                        echo "El registro de la fecha 2021-07-{$date[$i]} del Reporte {$reporte} no se guardo en la Base";
                        echo "\n";
                    }
                }
            }
        }
    }
}