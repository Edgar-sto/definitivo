<?php
require_once '../obtener/conexion.php';
$conexion       =   conexion_db('telefonia', 'localhost');

$fecha_inicio   =   $_GET['fecha_inicio'];
$fecha_termino  =   $_GET['fecha_termino'];
$carrier        =   $_GET['carrier'];
//Seccion para exportar a excel debe estar activa si o si
$docuname="TELEFONIA.xls";
header('Content-type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment; filename='.$docuname);
header('Pragma: no-cache');
header('Expires: 0');

if ($carrier == "Hazz") {
    $prefijos = ("14','555");
    $prefijo    =   array("14","555");
} elseif ($carrier == "Ipcom") {
    $prefijos = ("444");
    $prefijo    =   array("444");
} elseif ($carrier == "Marcatel") {
    $prefijos = ("15','777");
    $prefijo    =   array("15", "777");
} elseif ($carrier == "MCM") {
    $prefijos = ("11','999");
    $prefijo    =   array("11", "999");
}
$servidores = array("5", "6", "8", "9", "11", "14","15", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar

    echo "<table class='table table-secondary table-hover table-bordered'>";
        echo "<thead classd='bg-danger text-center position-static'>";
            echo "<tr style='background:rgb(220, 53, 69);'>";
                echo "<th colspan='6'><strong>Servidor $reporte</strong></th>";
            echo "</tr>";
            echo "<tr style='background:rgb(147, 149, 151); border: 1px solid #000000;'>";
                echo "<th>ID. Campania</th>";
                echo "<th>Sucursal</th>";
                echo "<th>Grupo</th>";
                echo "<th>COUNT</th>";
                echo "<th>Consumo. Movil</th>";
                echo "<th>Consumo. Fijo</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            
            $tam_prefi = count($prefijo);
            for ($i = 0; $i < $tam_prefi; $i++) {
                $prefi  = $prefijo[$i];
                $consultar_campania   =   "SELECT DISTINCT(campania) AS campania
                                        FROM consumo_telefonia_mf
                                        WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_termino 23:59:59'
                                        AND servidor='10.9.2.$reporte'
                                        AND prefijo='$prefi'
                                        ORDER BY prefijo";
                $obtener_campania   =   mysqli_query($conexion, $consultar_campania);
                while ($mostrar_campania =   mysqli_fetch_assoc($obtener_campania)) {
                    $campania  =   $mostrar_campania['campania'];
                    $consultar_grupo   =   "SELECT DISTINCT(grupo) AS grupo
                                                    FROM consumo_telefonia_mf
                                                    WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_termino 23:59:59'
                                                    AND servidor='10.9.2.$reporte'
                                                    AND prefijo='$prefi'
                                                    AND campania='$campania'";
                    $obtener_grupos =   mysqli_query($conexion, $consultar_grupo);
                    while ($mostrar_grupos  =   mysqli_fetch_assoc($obtener_grupos)) {
                        $grupo  =   $mostrar_grupos['grupo'];
                        $consultar_consumo_mf   =   "SELECT SUM(consumo_movil) AS movil, SUM(consumo_fijo) AS fijo
                                                    FROM consumo_telefonia_mf
                                                    WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_termino 23:59:59'
                                                    AND servidor='10.9.2.$reporte'
                                                    AND prefijo='$prefi'
                                                    AND campania='$campania'
                                                    AND grupo='$grupo'";
                        $obtener_consumo_mf     =   mysqli_query($conexion, $consultar_consumo_mf);
                        while ($mostrar_consumo_mf  =   mysqli_fetch_assoc($obtener_consumo_mf)) {
                            $MOVIL  =   $mostrar_consumo_mf['movil'];
                            $movil  =   number_format($MOVIL);
                            $FIJO   =   $mostrar_consumo_mf['fijo'];
                            $fijo   =   number_format($FIJO);
            
                            echo "<tr style='border: 1px solid #000000;'";
                                echo "<td>'$campania</td>";
                                echo "<td>$prefi</td>";
                                echo "<td>$grupo</td>";
                                echo "<td></td>";
                                echo "<td>$movil</td>";
                                echo "<td>$fijo</td>";
                            echo "</tr>";
            
                        }
                    }
                    $consultar_drop  =   "SELECT SUM(consumo_drop_movil) AS drop_movil, SUM(consumo_drop_fijo) AS drop_fijo
                                            FROM consumo_telefonia_drop
                                            WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_termino 23:59:59'
                                            AND reporte='10.9.2.$reporte'
                                            AND prefijo='$prefi'
                                            AND campania='$campania'";
                    $obtener_consumo_drop   =   mysqli_query($conexion, $consultar_drop);
                    while ($mostrar_drop = mysqli_fetch_assoc($obtener_consumo_drop)) {
                        $DROP_M   =   $mostrar_drop['drop_movil'];
                        $drop_movil   =   number_format($DROP_M);
                        $DROP_F  =   $mostrar_drop['drop_fijo'];
                        $drop_fijo  =   number_format($DROP_F);
                        echo "<tr style='background:rgb(245,223,77); border: 1px solid #000000;'>
                                <td>'" . $campania . "</td>
                                <td> </td>
                                <td><strong>DROP</strong></td>
                                <td></td>
                                <td>" . $drop_movil . "</td>
                                <td>" . $drop_fijo . "</td>
                            </tr>";
                    }
                    $consultar_buzon  =   "SELECT SUM(consumo_buzon_movil) AS buzon_movil, SUM(consumo_buzon_fijo) AS buzon_fijo
                                            FROM consumo_telefonia_buzon
                                            WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_termino 23:59:59'
                                            AND reporte='10.9.2.$reporte'
                                            AND prefijo='$prefi'
                                            AND campania='$campania'";
                    $obtener_consumo_buzon   =   mysqli_query($conexion, $consultar_buzon);
                    while ($mostrar_buzon = mysqli_fetch_assoc($obtener_consumo_buzon)) {
                        $BUZON_M   =   $mostrar_buzon['buzon_movil'];
                        $buzon_movil   =   number_format($BUZON_M);
                        $BUZON_F  =   $mostrar_buzon['buzon_fijo'];
                        $buzon_fijo  =   number_format($BUZON_F);
                        echo "<tr style='background:rgb(245,223,77); border: 1px solid #000000;'>
                                <td>'" . $campania . "</td>
                                <td> </td>
                                <td><strong>BUZON</strong></td>
                                <td></td>
                                <td>" . $buzon_movil . "</td>
                                <td>" . $buzon_fijo . "</td>
                            </tr>";
                        echo "<tr style='background:rgb(245,223,77); border: 1px solid #000000;'>
                            <td>'" . $campania . "</td>
                            <td> </td>
                            <td><strong>Campania0</strong></td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            </tr>";
                    }
                }
            }
        echo "</tbody>
    </table>";

}
