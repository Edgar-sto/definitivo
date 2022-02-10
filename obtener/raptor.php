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
$servidores = array("22", "27", "28", "41", "57");
$start_date="2022-01-01";
$end_date="2022-01-31";
?>
<table class='table table-sm table-dark'>
    <thead>
        <tr>
            <th>Campaña</th>
            <th>Grupo</th>
            <th>Sucursal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
<?php
foreach ($servidores as $reporte) {
    $query_uno="SELECT DISTINCT d_campaign_id, d_user_group
        FROM reporte_{$reporte}
        WHERE u_start_time>='{$start_date} 00:00:00'
        AND  u_start_time<='{$end_date} 23:59:59'
        AND c_dialstatus IN ('ANSWER')
        AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
        ORDER BY d_campaign_id;";
        echo "<tr>";
            echo "<td colspan='4'>Reporte".$reporte."</td>
        </tr>";
            $answer_query_uno = $conexion->query($query_uno);
            while ($row_uno = $answer_query_uno->fetch_object()) {
                $row_uno->d_campaign_id;
                $row_uno->d_user_group;
                if (empty($row_uno->d_campaign_id) || empty($row_uno->d_user_group)) {
                    //espacio vacio no hace nada 
                } else {
                    echo "<tr>";
                    echo "<td>".$row_uno->d_campaign_id."</td>";
                    echo "<td>".$row_uno->d_user_group."</td>";
                    echo "<td></td>";
                    $query_dos="SELECT COUNT(*)AS consumo
                    FROM reporte_{$reporte}
                    WHERE u_start_time>='{$start_date} 00:00:00'
                    AND  u_start_time<='{$end_date} 23:59:59'
                    AND d_carrier_prefix IN ('888', '999', '777', '444', '555')
                    AND c_hangup_cause='21'
                    AND c_sip_hangup_cause in('603', '0')
                    AND d_campaign_id='{$row_uno->d_campaign_id}'";
                $answer_query_dos = $conexion->query($query_dos);
                while ($row_dos = $answer_query_dos->fetch_object()){
                    $row_dos->consumo;
                    if (empty($row_dos->consumo)) {
                        echo "<td>0</td>"; 
                    } else {
                        echo "<td>".$row_dos->consumo."</td>";
                    }
                }
                echo "</tr>";
                }
                echo "<tr>
                    <td colspan='4'></td>
                </tr>";
            }
}
?>
</tbody>
</table>