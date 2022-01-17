<?php
/* Variables enviadas de formulario*/
#$servidor       =   $_POST['servidor'];
#$tipo           =   $_POST['tipo'];
#$fecha       =   "2020-09-01";//Datos a guardar
date_default_timezone_set('America/Mexico_City');
$fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
/**
 * Variables para conexion a base telefinia
 */
$servername =   "10.9.2.21";
$user       =   "EdgarTele";
$password   =   "**tele++fonia2";
$database   =   "telefonia";
$conexion   =   mysqli_connect($servername, $user, $password, $database);




if (!$conexion) {
    die("!Servidor no encontrado !" . mysqli_connect_error());
} else {
    /*echo"conexion exitosa";
    echo"<br>";
    echo"$servidor";*/
}

$fechas = array(/*"01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28",*/"29", "30"/*,"31"*/);
$tam_fechas = count($fechas);
for ($i = 0; $i < $tam_fechas; $i++) {

    //$f= $fechas[$i];
    $servidores = array(/*"5","6","8","9","11","22","27","28","29","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48",*/"57"/*,"201"*/);    
    //$servidores = array(/*"5","6","8","9","11","22","27","28",*/"29"/*,"34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","57","201"*/);
    $tamanio_array = count($servidores);
    for ($x = 0; $x < $tamanio_array; $x++) {
        $reporte = $servidores[$x]; //Dato a guardar                   
        $consultar_campania = "SELECT DISTINCT d_campaign_id
        FROM reporte_{$reporte}
        WHERE u_start_time>='2021-12-01  00:00:00'
        AND  u_start_time<='2021-12-31 23:59:59'
        AND c_dialstatus in ('ANSWER')
        ORDER BY d_campaign_id";
        $resultado_campania =   mysqli_query($conexion, $consultar_campania);
        while ($mostrar_campania   =   mysqli_fetch_assoc($resultado_campania)) {
            $campaign   =   $mostrar_campania['d_campaign_id']; //Dato a guardar
            //$grupo      =   $mostrar_campania['d_user_group'];
            //var_dump($reporte);
            if (empty($campaign) || empty($grupo)) {
                //espacio vacio no hace nada
            } else {
?>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2"><?php echo $reporte ?> </th>
                        </tr>
                        <tr>
                            <th>
                                CAMPAÑA
                            </th>
                            <th>
                                GRUPO
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $consulta_raptor = "SELECT count(*) AS RAPTOR
                FROM reporte_{$reporte}
                WHERE u_start_time>='2021-12-01  00:00:00'
                AND  u_start_time<='2021-12-31 23:59:59'
                AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
                AND c_hangup_cause='21'
                AND c_sip_hangup_cause IN('603','0')
                AND d_campaign_id='$campaign'";
                        $resultado_raptor = $conexion->query($consulta_raptor);
                        while ($row = $resultado_raptor->fetch_object()) {
                            $row->RAPTOR;

                            if (empty($row->RAPTOR)) {
                                $row->RAPTOR == 0;
                            }
                        ?>
                            <tr>
                                <td><?php echo $campaign; ?></td>
                                <td><?php echo $row->RAPTOR; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
<?php
            }
        }
        $consultar_campania = "SELECT DISTINCT d_user_group
        FROM reporte_{$reporte}
        WHERE u_start_time>='2021-12-01  00:00:00'
        AND  u_start_time<='2021-12-31 23:59:59'
        AND c_dialstatus in ('ANSWER')
        ORDER BY d_campaign_id";
        $resultado_campania =   mysqli_query($conexion, $consultar_campania);
        while ($mostrar_campania   =   mysqli_fetch_assoc($resultado_campania)) {
            
            echo $grupo      =   $mostrar_campania['d_user_group'];
            echo "<br>";
        }
    }
}
