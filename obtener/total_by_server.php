<?php
// require_once '../clases/Conexion.php';
// $conexion = new Conexion();
//Datos recibidos de formulario:obt_campanias dashboard.php
//$servidor   =   $_POST['servidor_gral'];
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
$user       =   "root";
$password   =   "@l**pbx++t3l3";
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
    $prefijolocal = ('209,210,222,223');
    $prefijoraptor = ('888');
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Hazz") {
    $prefijolocal = ("14");
    $prefijoraptor = ('555');
    $tipo_suma = "u_length_in_sec";
} elseif ($carrier == "Ipcom") {
    $prefijolocal = ("444");
    $prefijoraptor = ('0');
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Marcatel") {
    $prefijolocal = ('15');
    $prefijoraptor = ('777');   
    $tipo_suma = "redondea_a_minutos";
} elseif ($carrier == "Mcm") {
    $prefijolocal = ('11');
    $prefijoraptor = ('999');
    $tipo_suma = "redondea_a_minutos";
}
echo "<table class='table table-bordered'>";
        echo "<thead class='mdb-illuminating text-center'>
            <tr>
                <th>Servidor</th>
                <th>Total consumido</th>
            </tr>
        </thead>
        <tbody class='mdb-ultimate-gray'>";
            $servidores = array("5","6","8","9","11","22","27","28","29","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","201");
            $tamanio_array = count($servidores);
            for($x = 0; $x < $tamanio_array; $x++)
            {
                $con_total_server = "SELECT SUM($tipo_suma) AS total
                FROM telefonia.reporte_$servidores[$x]
                WHERE u_start_time>='$fe_inicio 00:00:00'
                AND  u_start_time<='$fe_termino 23:59:59'
                AND c_dialstatus in ('ANSWER') 
                AND d_carrier_prefix  in ('$prefijolocal','$prefijoraptor')";
                $resultado = mysqli_query($conexion,$con_total_server);
                $total = mysqli_fetch_assoc($resultado);
                $total_server = $total['total'];
                if (empty($total_server)){
                    //espacio vacio no hace nada 
                }
                else
                {
                    echo "<tr class='rgba-black-slight text-center'>
                        <td><strong>".$servidores[$x]."</strong></td>
                        <td>".$total_server."</td>";
                    echo "</tr>";
                }
            }
echo "</tbody>
</table>";
?>