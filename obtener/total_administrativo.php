<?php
// require_once '../clases/Conexion.php';
//$conexion = new Conexion();
//Datos recibidos de formulario:obt_campanias dashboard.php
//$servidor   =   $_POST['servidor_gral'];
$carrier    =   $_POST['carrier-administrativo']; 
$fe_inicio    =   $_POST['fecha-inicio-administrativo'];
$fe_termino     =   $_POST['fecha-termino-administrativo'];
/*date_default_timezone_set ('America/Mexico_City');
    $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
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
    echo"<br>";*/
}
if ($carrier == "Directo") {
    $prefijo = ("directo");
} elseif ($carrier == "Hazz") {
    $prefijo = ("hazz");
} elseif ($carrier == "Ipcom") {
    $prefijo = ("ipcom");
} elseif ($carrier == "Marcatel") {
    $prefijo = ("marcatel");
} elseif ($carrier == "Mcm") {
    $prefijo = ("mcm");
}
echo "<table class='table table-bordered'>";
        echo "<thead class='mdb-illuminating text-center'>
            <tr>
                <th colspan=2>Consumo administrativo</th>
            </tr>
            <tr>
                <th>Movil</th>
                <th>Fijo</th>
            </tr>
        </thead>
        <tbody class='mdb-ultimate-gray'>";
            $selec_admi = "SELECT
            (select sum(minutos) as minutos from telefonia.pbxData
            where fecha_llamada BETWEEN '$fe_inicio' and '$fe_termino'
            and carrier like '%$prefijo%'
            and estatus='ANSWERED'  and tipo='celular') as celular,
            (select sum(minutos) as minutos from telefonia.pbxData
            where fecha_llamada BETWEEN '$fe_inicio' and '$fe_termino '
            and carrier like '%$prefijo%'
            and estatus='ANSWERED'  and tipo='fijo') as fijo ";
            $resultado = mysqli_query($conexion,$selec_admi);
            $total = mysqli_fetch_array($resultado);
            $total_movil = $total['celular'];
            $total_fijo = $total['fijo'];
            echo "<tr class='rgba-black-slight text-center'>
                        <td><strong>".$total_movil."</strong></td>
                        <td><strong>".$total_fijo."</strong></td>";
            echo "</tr>";
echo "</tbody>
</table";

?>