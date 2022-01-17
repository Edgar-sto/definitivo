<?php
// $docuname="prueba.xls";
// header('Content-type: application/vnd.ms-excel');
// header('Content-Disposition: attachment; filename='.$docuname);
// header('Pragma: no-cache');
// header('Expires: 0');

$servidores = array("5", "6", "8", "9", "11", "14", "15", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
$tamanio_array = count($servidores);
for ($x = 0; $x < $tamanio_array; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar

    echo '<table class="table table-hover table-bordered table-light">';
    echo '<thead class="text-center position-static text-light" style="background: #595959;">';
    echo '<tr>';
    echo '<th colspan="5"><strong>Servidor ' . $reporte . '</strong></th>';
    echo '</tr>';
    $total_campania="SELECT DISTINCT campania
        FROM consumo_diario_raptor
        WHERE fecha_inicio>='{$fecha_inicio} 00:00:00'
        AND fecha_fin<='{$fecha_termino} 23:59:59'
        AND reporte='10.9.2.{$reporte}'";
    $res_total_campania=mysqli_query($conexion,$total_campania);
    while ($imp_total_campania=mysqli_fetch_assoc($res_total_campania)) {
        $campania=$imp_total_campania['campania'];
    
    echo '<tr style="background: #808080;" class="text-light">';
    echo '<th rowspan="2">ID Campaña</th>
          <th rowspan="2">Sucursal</th>
          <th rowspan="2">Grupo</th>
          <th>Total</th>
          <th>Suma Total</th>';
    echo '</tr>';
    echo '<tr style="background: #808080;" class="text-light">';
    echo '<th>';
    $total_raptor = "SELECT SUM(total_raptor) AS total
        FROM consumo_diario_raptor
        WHERE fecha_inicio>='{$fecha_inicio} 00:00:00'
        AND fecha_fin<='{$fecha_termino} 23:59:59'
        AND campania= '{$campania}'
        AND reporte='10.9.2.{$reporte}'";
    $res_total_raptor = mysqli_query($conexion, $total_raptor);
    while ($imp_total = mysqli_fetch_assoc($res_total_raptor)) {
        echo $total = number_format($imp_total['total']);
    }
    echo '</th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $consultar_campania_grupo = "SELECT DISTINCT grupos
        FROM consumo_grupos_raptor
        WHERE fecha_inicio>='{$fecha_inicio} 00:00:00'
        AND fecha_fin<='{$fecha_termino} 23:59:59'
        AND campania= '{$campania}'
        AND reporte='10.9.2.{$reporte}'
        ORDER BY campania";
    $res_cons_camp_grupo = mysqli_query($conexion, $consultar_campania_grupo);
    while ($imp_camp_grupo = mysqli_fetch_assoc($res_cons_camp_grupo)) {
        echo '<tr>';
        echo "<td>'" . $campania . "</td>";
        echo '<td></td>';
        echo '<td>' . $imp_camp_grupo['grupos'] . '</td>';
        echo '<td colspan="2"></td>';
        echo '</tr>';
    }
    }
    echo '</tbody>';
    echo '</table>';
}
