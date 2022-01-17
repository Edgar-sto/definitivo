<?php

// header('Content-type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename='.$docuname);
// header('Pragma: no-cache');
// header('Expires: 0');
// $docuname="pruba.xls";
$servidores = array("5", "6", "8", "9", "11", "14", "15", "22", "27", "28", "29", "30", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar
?>
    <table class='table table-secondary table-hover table-bordered'>
        <thead class="bg-danger text-center position-static">
            <tr>
                <th colspan='7'><strong>Servidor <?php echo "$reporte" ?></strong></th>
            </tr>
            <tr>
                <th>ID. Campaña</th>
                <th>Prefijo</th>
                <th>Sucursal</th>
                <th>Grupo</th>
                <th>COUNT</th>
                <th>Consumo. Movil</th>
                <th>Consumo. Fijo</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
            ?>
                            <tr>
                                <td><?php echo $campania ?> </td>
                                <td><?php echo $prefi ?></td>
                                <td></td>
                                <td><?php echo $grupo ?></td>
                                <td></td>
                                <td><?php echo $movil ?></td>
                                <td><?php echo $fijo ?></td>
                            </tr>
            <?php
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
                        echo "<tr style='background-color: rgb(245, 223,77)'>
                                <td>" . $campania . "</td>
                                <td>" . $prefi . "</td>
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
                        echo "<tr style='background-color: rgb(245, 223,77)'>
                                <td>" . $campania . "</td>
                                <td>" . $prefi . "</td>
                                <td> </td>
                                <td><strong>BUZÓN</strong></td>
                                <td></td>
                                <td>" . $buzon_movil . "</td>
                                <td>" . $buzon_fijo . "</td>
                            </tr>";
                        echo "<tr style='background-color: rgb(245, 223,77)'>
                            <td>" . $campania . "</td>
                            <td>" . $prefi . "</td>
                            <td> </td>
                            <td><strong>Campaña 0</strong></td>
                            <td></td>
                            <td>0</td>
                            <td>0</td>
                            </tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
<?php
}
?>