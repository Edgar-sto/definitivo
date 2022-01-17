<?php
/* Variables enviadas de formulario*/
#$servidor       =   $_POST['servidor'];
#$tipo           =   $_POST['tipo'];
#$fecha       =   "2020-09-01";//Datos a guardar
date_default_timezone_set ('America/Mexico_City');
$fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
/**
 * Variables para conexion a base telefinia
 */
$servername =   "10.9.2.21";
$user       =   "EdgarTele";
$password   =   "**tele++fonia2";
$database   =   "telefonia";
$conexion   =   mysqli_connect($servername,$user,$password,$database);




if (!$conexion) {
    die("!Servidor no encontrado !".mysqli_connect_error());
}
else {
    /*echo"conexion exitosa";
    echo"<br>";
    echo"$servidor";*/
}
 
$fechas = array(/*"01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28",*/"29","30"/*,"31"*/);
$tam_fechas = count($fechas);
for ($i=0; $i < $tam_fechas ; $i++) { 

    //$f= $fechas[$i];
    //echo "<br>";
$servidores = array("5","6","8","9","11","22","27","28","29","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","201");
    $tamanio_array = count($servidores);
    for($x = 0; $x < $tamanio_array; $x++)
    {             
        $reporte = $servidores[$x]; //Dato a guardar                   
        echo $consultar_campania = "SELECT DISTINCT (d_campaign_id) AS campania
        FROM reporte_$reporte
        WHERE u_start_time>='2021-03-$fechas[$i]  00:00:00'
        AND  u_start_time<='2021-03-$fechas[$i] 23:59:59'
        AND c_dialstatus in ('ANSWER')
        ORDER BY d_campaign_id";
        $resultado_campania =   mysqli_query($conexion, $consultar_campania);
        while ($mostrar_campania   =   mysqli_fetch_assoc($resultado_campania))
        {
            $campaign   =   $mostrar_campania['campania'];//Dato a guardar
            //var_dump($reporte);
            if (empty($campaign)) {
                //espacio vacio no hace nada
            }
            else
            {
                $consulta_consumo_semanal_total="SELECT SUM(redondea_a_minutos) 
                AS TOTAL
                FROM reporte_$reporte
                WHERE u_start_time>='2021-03-$fechas[$i]  00:00:00' 
                AND  u_start_time<='2021-03-$fechas[$i] 23:59:59'
                AND c_dialstatus in ('ANSWER' )
                AND d_campaign_id='$campaign'";
                $resultado_total =   mysqli_query($conexion, $consulta_consumo_semanal_total);
                $mostrar_total   =   mysqli_fetch_assoc($resultado_total);
                $monto_total_    =   $mostrar_total['TOTAL'];//Dato a guardar
                //echo "$monto_total_<br>";
                //$monto_total     =   number_format($monto_total_);
                if (empty($monto_total_)){
                    $monto_total_ == 0;
                }
                $consulta_consumo_semanal_movil="SELECT SUM(redondea_a_minutos) 
                AS MOVIL
                FROM reporte_$reporte
                WHERE u_start_time>='2021-03-$fechas[$i]  00:00:00' 
                AND  u_start_time<='2021-03-$fechas[$i] 23:59:59'
                AND c_dialstatus in ('ANSWER')
                AND d_campaign_id='$campaign'
                AND d_tipo_numero='movil'";
                $resultado_movil =   mysqli_query($conexion, $consulta_consumo_semanal_movil);
                $mostrar_movil   =   mysqli_fetch_assoc($resultado_movil);
                $monto_movil_    =   $mostrar_movil['MOVIL'];;//Dato a guardar
                //echo "$monto_movil_<br>";
                //$monto_movil     =   number_format($monto_movil_);
                if (empty($monto_movil_)){
                    $monto_movil_ == 0;
                }
                $consulta_consumo_semanal_fijo="SELECT SUM(redondea_a_minutos) 
                AS FIJO
                FROM reporte_$reporte
                WHERE u_start_time>='2021-03-$fechas[$i]  00:00:00' 
                AND  u_start_time<='2021-03-$fechas[$i] 23:59:59'
                AND c_dialstatus in ('ANSWER')
                AND d_campaign_id='$campaign'
                AND d_tipo_numero='FIJO'";
                $resultado_fijo =   mysqli_query($conexion, $consulta_consumo_semanal_fijo);
                $mostrar_fijo   =   mysqli_fetch_assoc($resultado_fijo);
                $monto_fijo_    =   $mostrar_fijo['FIJO'];;//Dato a guardar
                //echo "$monto_fijo_";
                //$monto_fijo     =   number_format($monto_fijo_);
                if (empty($monto_fijo_)){
                    $monto_fijo_ == 0;
                }
                /**
                 * Variables para conexion
                 */
                $serverlocal     ="localhost";
                $userlocal       ="root";
                $passwordlocal   ="";
                $databaselocal   ="telefonia";
                $conexionlocal   =mysqli_connect($serverlocal,$userlocal,$passwordlocal,$databaselocal);
                if (!$conexionlocal) {
                    die("!Servidor no encontrado !".mysqli_connect_error());
                }
                else {
                    /*echo"conexion exitosa";
                    echo"<br>";
                    echo"$servidor";*/
                }

                echo $insertar = "INSERT INTO `consumo_diario` (`unique_id`,`reporte`, `campania`, `total_dia`, `movil_dia`, `fijo_dia`, `fecha_inicio`,`fecha_fin`)
                VALUES ('','10.9.2.$reporte','$campaign','$monto_total_','$monto_movil_','$monto_fijo_','2021-03-$fechas[$i] 00:00:00','2021-03-$fechas[$i] 23:59:59')";
                $insertar_consulta =   mysqli_query($conexionlocal, $insertar);
                /*if (mysqli_query($conexionlocal, $insertar)) {
                    echo "New record created successfully";
                }
                else
                {
                    echo "Error: " . $insertar . "<br>" . mysqli_error($conexionlocal);
                }*/
            }
        }           
    }
}
    mysqli_close($conexionlocal); 
    mysqli_free_result($resultado_campania); // Liberamos los registros
    mysqli_close($conexion);

