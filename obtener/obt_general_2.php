<?php
require 'conexion.php';
$prefijos = array(
    "Directo"   => array("209", "210", "222", "223", "888"),
    "Hazz"      => array("14","555"),
    "Ipcom"     => array("444"),
    "Marcatel"  => array("15", "777"),
    "Mcm"       => array("11", "999")
);
$conexion = conexion_db('telefonia', 'localhost');
$servidor   =   $_POST['servidor_telefonia_mensual'];
$carrier    =   $_POST['carrier_telefonia_mensual'];
$fecha_inicio    =   $_POST['fecha_inicio_telefonia'];
$fecha_fin     =   $_POST['fecha_termino_telefonia'];
$prefijos[$carrier][0];
?>
<table class='table table-info table-hover table-bordered'>
    <thead class="bg-danger text-center position-static">
        <tr>
            <th colspan='6'><strong>Servidor <?php echo "$servidor" ?></strong></th>
        </tr>
        <tr>
            <th>ID. Campaña</th>
            <th>Sucursal</th>
            <th>Grupo</th>
            <th>COUNT</th>
            <th>Consumo. Movil</th>
            <th>Consumo. Fijo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tamaño_prefijos = count($prefijos[$carrier]);
        for ($i = 0; $i < $tamaño_prefijos; $i++) {
            $prefijo = $prefijos[$carrier][$i];
            $consultar_campania   =   "SELECT DISTINCT(campania) AS campania
                                    FROM consumo_telefonia_mf
                                    WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_fin 23:59:59'
                                    AND servidor='10.9.2.$servidor'
                                    AND prefijo='$prefijo'
                                    ORDER BY prefijo";
            $obtener_campania   =   mysqli_query($conexion, $consultar_campania);
            while ($mostrar_campania =   mysqli_fetch_assoc($obtener_campania)) {
                $campania  =   $mostrar_campania['campania'];
                $consultar_grupo   =   "SELECT DISTINCT(grupo) AS grupo
                                                 FROM consumo_telefonia_mf
                                                 WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_fin 23:59:59'
                                                 AND servidor='10.9.2.$servidor'
                                                 AND prefijo='$prefijo'
                                                 AND campania='$campania'";
                $obtener_grupos =   mysqli_query($conexion, $consultar_grupo);
                while ($mostrar_grupos  =   mysqli_fetch_assoc($obtener_grupos)) {
                    $grupo  =   $mostrar_grupos['grupo'];
                    $consultar_consumo_mf   =   "SELECT SUM(consumo_movil) AS movil, SUM(consumo_fijo) AS fijo
                                                 FROM consumo_telefonia_mf
                                                 WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_fin 23:59:59'
                                                 AND servidor='10.9.2.$servidor'
                                                 AND prefijo='$prefijo'
                                                 AND campania='$campania'
                                                 AND grupo='$grupo'";
                    $obtener_consumo_mf     =   mysqli_query($conexion, $consultar_consumo_mf);
                    while ($mostrar_consumo_mf  =   mysqli_fetch_assoc($obtener_consumo_mf)) {
                        $MOVIL  =   $mostrar_consumo_mf['movil'];
                        $movil  =   number_format($MOVIL);
                        $FIJO   =   $mostrar_consumo_mf['fijo'];
                        $fijo   =   number_format($FIJO);
                        echo "<tr>
                                <td>" . $campania . "</td>
                                <td>" . $prefijo . "</td>
                                <td>" . $grupo . "</td>
                                <td></td>
                                <td>" . $movil . "</td>
                                <td>" . $fijo . "</td>
                            </tr>";
                    }
                }
                $consultar_drop  =   "SELECT SUM(consumo_drop_movil) AS drop_movil, SUM(consumo_drop_fijo) AS drop_fijo
                                         FROM consumo_telefonia_drop
                                         WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_fin 23:59:59'
                                         AND reporte='10.9.2.$servidor'
                                         AND prefijo='$prefijo'
                                         AND campania='$campania'";
                $obtener_consumo_drop   =   mysqli_query($conexion, $consultar_drop);
                while ($mostrar_drop = mysqli_fetch_assoc($obtener_consumo_drop)) {
                    $DROP_M   =   $mostrar_drop['drop_movil'];
                    $drop_movil   =   number_format($DROP_M);
                    $DROP_F  =   $mostrar_drop['drop_fijo'];
                    $drop_fijo  =   number_format($DROP_F);
                    echo "<tr class='bg-warning'>
                            <td>" . $campania . "</td>
                            <td> </td>
                            <td><strong>DROP</strong></td>
                            <td></td>
                            <td>" . $drop_movil . "</td>
                            <td>" . $drop_fijo . "</td>
                        </tr>";
                }
                $consultar_buzon  =   "SELECT SUM(consumo_buzon_movil) AS buzon_movil, SUM(consumo_buzon_fijo) AS buzon_fijo
                                         FROM consumo_telefonia_buzon
                                         WHERE fecha_inicio>='$fecha_inicio 00:00:00' AND fecha_fin<='$fecha_fin 23:59:59'
                                         AND reporte='10.9.2.$servidor'
                                         AND prefijo='$prefijo'
                                         AND campania='$campania'";
                $obtener_consumo_buzon   =   mysqli_query($conexion, $consultar_buzon);
                while ($mostrar_buzon = mysqli_fetch_assoc($obtener_consumo_buzon)) {
                    $BUZON_M   =   $mostrar_buzon['buzon_movil'];
                    $buzon_movil   =   number_format($BUZON_M);
                    $BUZON_F  =   $mostrar_buzon['buzon_fijo'];
                    $buzon_fijo  =   number_format($BUZON_F);
                    echo "<tr class='bg-warning'>
                            <td>" . $campania . "</td>
                            <td> </td>
                            <td><strong>BUZÓN</strong></td>
                            <td></td>
                            <td>" . $buzon_movil . "</td>
                            <td>" . $buzon_fijo . "</td>
                        </tr>";
                    echo "<tr class='bg-warning'>
                        <td>" . $campania . "</td>
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