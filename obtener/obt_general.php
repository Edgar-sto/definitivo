<?php
//Datos recibidos de formulario:obt_campanias dashboard.php
$servidor   =   $_POST['servidor_gral'];
$carrier    =   $_POST['carrier_gral'];
$fe_inicio    =   $_POST['fecha_inicio_gral'];
$fe_termino     =   $_POST['fecha_termino_gral'];
/*date_default_timezone_set ('America/Mexico_City');
$fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
*/
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
    echo"$servidor"; 
    echo"$carrier";
    echo"$fe_inicio";
    echo"$fe_termino";*/
}
if ($carrier == "Directo") {
    $prefijos = array("209","210","222","223","888");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Hazz") {
    $prefijos = array("14","555");
    $tipo_suma = "u_length_in_sec";
} elseif ($carrier == "Ipcom") {
    $prefijos = array("444");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Marcatel") {
    $prefijos = array("9","15","777");
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Mcm") {
    $prefijos = array("11","999");   
    $tipo_suma = "redondea_a_minutos";
}


//se agrega id en tabla para exportar a excel
echo "<table id='export_to_excel' class='table table-bordered'>";
        echo "<thead class='mdb-illuminating text-dark text-center'>
            <tr>
                <th>Prefijos</th>
                <th>Campaña</th>
                <th>Grupo</th>
                <th>Movil</th>
                <th>Fijo</th>
            </tr>
        </thead>";
$tamaño_prefijos = count($prefijos);
for ($i=0; $i < $tamaño_prefijos; $i++)
{
    $prefijo = $prefijos[$i];
    //echo "$prefijo";    
    #Inicio de tabla con datos
    echo "<tbody class=' table-striped'>";
    $query_campaña = "SELECT DISTINCT d_campaign_id AS campaing
    FROM reporte_$servidor
    WHERE u_start_time>='$fe_inicio 00:00:00'
    AND  u_start_time<='$fe_termino 23:59:59'
    AND c_dialstatus IN ('ANSWER')
    AND d_carrier_prefix ='$prefijo'
    ORDER BY d_campaign_id";
        echo "<tr>";
            echo "<td class='bg-danger text-white text-center' colspan='5'><strong>10.9.2.".$servidor."</strong></td>";
        echo "</tr>";
    $resultado_query_campaña =   mysqli_query($conexion, $query_campaña);
    while ($mostrar_query_campaña   =   mysqli_fetch_assoc($resultado_query_campaña))
    {
        $campaing   =   $mostrar_query_campaña['campaing'];
        $query_grupo = "SELECT DISTINCT (d_user_group)
        FROM telefonia.reporte_$servidor
        WHERE u_start_time>='$fe_inicio 00:00:00'
        AND  u_start_time<='$fe_termino 23:59:59'
        AND c_dialstatus in ('ANSWER')
        AND d_campaign_id ='$campaing'
        AND d_carrier_prefix ='$prefijo'
        ORDER BY d_user_group";
        
        $resultado_query_grupo  = mysqli_query($conexion,$query_grupo);
        while ($mostrar_res_query_grupo = mysqli_fetch_assoc($resultado_query_grupo))
        {
            $grupo = $mostrar_res_query_grupo['d_user_group'];
            
            $query_sum_mf ="SELECT
            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='$grupo' AND d_tipo_numero='movil') AS MOVIL,

            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='$grupo' AND d_tipo_numero='fijo') AS FIJO";

            $resultado_query_sum_mf =   mysqli_query($conexion,$query_sum_mf);
            while ($mostrar_query_sum_mf = mysqli_fetch_assoc($resultado_query_sum_mf))
            {
                $movil  =   $mostrar_query_sum_mf['MOVIL'];
                $fijo   =   $mostrar_query_sum_mf['FIJO'];
                echo "<tr class='rgba-black-slight'>";
                    echo "<td>".$prefijo."</td>";
                    echo "<td>".$campaing."</td>";
                    echo "<td>".$grupo."</td>";
                    echo "<td>".$movil."</td>";
                    echo "<td>".$fijo."</td>";
                echo"</tr>";
            }
            //Fin MOVIL Y FIJO
        }
            //Inicio DROP
            $query_sum_drop_buzon ="SELECT
            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilDROPS, 
            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='' AND d_status NOT IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijoDROPS,
            -- Fin DR
            -- Inicio BUZON
            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='movil') AS movilbuzon,
            (SELECT SUM($tipo_suma) FROM telefonia.reporte_$servidor
            where u_start_time>='$fe_inicio 00:00:00'  and  u_start_time<='$fe_termino 23:59:59'
            AND c_dialstatus IN ('ANSWER') AND d_campaign_id='$campaing' AND d_carrier_prefix IN  ('$prefijo')
            AND d_user_group='' AND d_status IN ('NA', 'AA') AND d_tipo_numero='fijo') AS fijobuzon";

            $resultado_query_sum_drop_buzon    =   mysqli_query($conexion,$query_sum_drop_buzon);
            while ($mostrar_query_sum_drop_buzon   =   mysqli_fetch_assoc($resultado_query_sum_drop_buzon))
            {
                
                $m_drop =   $mostrar_query_sum_drop_buzon['movilDROPS'];
                $f_drop =   $mostrar_query_sum_drop_buzon['fijoDROPS'];
                $m_buzon=   $mostrar_query_sum_drop_buzon['movilbuzon'];
                $f_buzon=   $mostrar_query_sum_drop_buzon['fijobuzon'];

                echo"<tr class='mdb-illuminating'>
                    <td>".$prefijo."</td>
                    <td>".$campaing."</td>
                    <td>DROP</td>
                    <td id='celda_campania'>".$m_drop."</td>         
                    <td id='celda_campania'>".$f_drop."</td>
                </tr>";
                echo"<tr class='mdb-illuminating'>
                    <td>".$prefijo."</td>
                    <td>".$campaing."</td>
                    <td>BUZON</td>
                    <td id='celda_campania'>".$m_buzon."</td>
                    <td id='celda_campania'>".$f_buzon."</td>
                </tr>";
            }
    }
}
        echo "</tbody>";
    echo "</table>";