<?php
$carrier    =   "Mcm";
$date = new DateTime();
$date->sub(new DateInterval('P1D'));
$date->format('Y-m-d') . "\n";

$servername =   "10.9.2.21";
$user       =   "root";
$password   =   "@l**pbx++t3l3";
$database   =   "telefonia";
$conexion   =   mysqli_connect($servername, $user, $password, $database);
if (!$conexion) {
    die("!Servidor no encontrado !" . mysqli_connect_error());
} else {
    /*echo"conexion exitosa";
    echo"<br>";*/
}
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
if ($carrier == "Directo") {
    $prefijos = array("209", "210", "222", "223", "888");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Hazz") {
    $prefijos = array("14", "555");
    $tipo_suma = "u_length_in_sec";
} elseif ($carrier == "Ipcom") {
    $prefijos = array("444");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Marcatel") {
    $prefijos = array(/*"9", */"15", "777");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Mcm") {
    $prefijos = array("11", "999");
    $tipo_suma = "redondea_a_minutos";
}
$tamaño_prefijos = count($prefijos);

$fechas = array(/*"01","02","03","04","05","06","07","08","09","10","11","12","13","14",*/"15","16","17","18","19","20"/*,"21","22","23","24","25","26","27","28","29","30","31"*/);
$tam_fechas = count($fechas);
for ($i = 0; $i < $tam_fechas; $i++) {
    echo "*****    Busqueda del dia 2021-11-$fechas[$i] con $carrier    *****\n";
    $servidores = array("5","6","8","9","11","14","15","22","27","28","29","30","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","57","201");
    $tamanio_array = count($servidores);
    for ($x = 0; $x < $tamanio_array; $x++) {
        $reporte = $servidores[$x]; //Dato a guardar
        for ($p = 0; $p < $tamaño_prefijos; $p++) {
            $prefijo = $prefijos[$p];
            echo "Reporte $reporte con el  Prefijo: $prefijo\n";
            $query_campaña = "SELECT DISTINCT d_campaign_id AS campaing
            FROM reporte_$reporte
            WHERE u_start_time>='2021-11-$fechas[$i] 00:00:00'
            AND  u_start_time<='2021-11-$fechas[$i] 23:59:59'
            AND c_dialstatus IN ('ANSWER')
            AND d_carrier_prefix ='$prefijo'
            ORDER BY d_campaign_id";
            $resultado_query_campaña =   mysqli_query($conexion, $query_campaña);
            while ($mostrar_query_campaña   =   mysqli_fetch_assoc($resultado_query_campaña)) {
                $campaing   =   $mostrar_query_campaña['campaing']; //Resultado de la campaña
                if (empty($campaing)) {
                    //espacio vacio no hace nada 
                } else {
                    $query_grupo = "SELECT DISTINCT (d_user_group)
                    FROM telefonia.reporte_$reporte
                    WHERE u_start_time>='2021-11-$fechas[$i] 00:00:00'
                    AND  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                    AND c_dialstatus in ('ANSWER')
                    AND d_campaign_id ='$campaing'
                    AND d_carrier_prefix ='$prefijo'
                    ORDER BY d_user_group";
                    $resultado_query_grupo  = mysqli_query($conexion, $query_grupo);
                    while ($mostrar_res_query_grupo = mysqli_fetch_assoc($resultado_query_grupo)) {
                        $grupo = $mostrar_res_query_grupo['d_user_group']; //Resultado del grupo
                        if (empty($grupo)) {
                            //espacio vacio no hace nada 
                        } else {
                            $query_sum_mf = "SELECT
                            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                            where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                            AND d_user_group='$grupo' AND d_tipo_numero='movil') AS MOVIL,

                            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                            where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
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
                                VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$grupo','$movil','$fijo','2021-11-$fechas[$i] 00:00:00','2021-11-$fechas[$i] 23:59:59')";
                                $insertar_mf =   mysqli_query($conexionlocal, $insertar);
                                //echo "\n";
                                /*if (mysqli_query($conexionlocal, $insertar)) {
                                    echo "New record created successfully";
                                }
                                else
                                {
                                    echo "Error: " . $insertar . "<br>" . mysqli_error($conexionlocal);
                                }*/
                            }
                        }
                        //Fin MOVIL Y FIJO
                    }
                    //Inicio DROP
                    $query_sum_drop_buzon = "SELECT
                    (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                    where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilDROPS, 
                    (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                    where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijoDROPS,
                    -- Fin DR
                    -- Inicio BUZON
                    (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                    where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilbuzon,
                    (SELECT SUM($tipo_suma) FROM telefonia.reporte_$reporte
                    where u_start_time>='2021-11-$fechas[$i] 00:00:00'  and  u_start_time<='2021-11-$fechas[$i] 23:59:59'
                    AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
                    AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijobuzon ";

                    $resultado_query_sum_drop_buzon    =   mysqli_query($conexion, $query_sum_drop_buzon);
                    while ($mostrar_query_sum_drop_buzon   =   mysqli_fetch_assoc($resultado_query_sum_drop_buzon)) {

                        $m_drop =   $mostrar_query_sum_drop_buzon['movilDROPS'];
                        $f_drop =   $mostrar_query_sum_drop_buzon['fijoDROPS'];
                        $m_buzon =   $mostrar_query_sum_drop_buzon['movilbuzon'];
                        $f_buzon =   $mostrar_query_sum_drop_buzon['fijobuzon'];

                        $insertar_drop = "INSERT INTO `consumo_telefonia_drop` (`unique_id`,`reporte`, `prefijo`, `campania`, `consumo_drop_movil`, `consumo_drop_fijo`, `fecha_inicio`,`fecha_fin`)
                        VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$m_drop','$f_drop','2021-11-$fechas[$i] 00:00:00','2021-11-$fechas[$i] 23:59:59')";
                        $insertar_drop =   mysqli_query($conexionlocal, $insertar_drop);
                        //echo "\n";
                        /*if (mysqli_query($conexionlocal, $insertar)) {
                            echo "New record created successfully";
                        }
                        else
                        {
                            echo "Error: " . $insertar . "<br>" . mysqli_error($conexionlocal);
                        }*/
                        $insertar_buzon = "INSERT INTO `consumo_telefonia_buzon` (`unique_id`,`reporte`, `prefijo`, `campania`, `consumo_buzon_movil`, `consumo_buzon_fijo`, `fecha_inicio`,`fecha_fin`)
                        VALUES ('','10.9.2.$reporte','$prefijo','$campaing','$m_buzon','$f_buzon','2021-11-$fechas[$i] 00:00:00','2021-11-$fechas[$i] 23:59:59')";
                        $insertar_buzon =   mysqli_query($conexionlocal, $insertar_buzon);
                        /*if (mysqli_query($conexionlocal, $insertar)) {
                            echo "New record created successfully";
                        }
                        else
                        {
                            echo "Error: " . $insertar . "<br>" . mysqli_error($conexionlocal);
                        }*/
                        echo "\n";
                        echo "\n";
                        //echo "\n";
                    }
                }
            }
        }
    }
}
