<?php
/* Variables enviadas de formulario*/
$servidor   =   $_POST['servidor_maquilas'];
$tipo       =   $_POST['tipo_busqueda_semanal'];
$fe_inicio    =   $_POST['fecha_inicio_semanal'];
$fe_termino     =   $_POST['fecha_termino_semanal'];
/**
 * Variables para conexion
 */
require 'conexion.php';
$conexion = conexion_db('telefonia', 'localhost');
?>

<table class="table table-bordered">
    <?php
    if ($tipo == "Movil & fijo") {
    ?>
        <thead class="text-center">
            <tr class="edg-red text-white">
                <th colspan="4">
                    <strong>Servidor <?php echo $servidor; ?></strong>
                </th>
            </tr>
            <tr class="edg-blue-sky">
                <th>Campaña</th>
                <th>Total</th>
                <th>Móvil</th>
                <th>Fijo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con_campania = "SELECT distinct(campania)
                             FROM consumo_diario
                             WHERE fecha_inicio>='$fe_inicio 00:00:00' AND fecha_fin<='$fe_termino 23:59:59'
                             AND reporte='10.9.2.$servidor'
                             ORDER BY campania";
                $res_campania = mysqli_query($conexion,$con_campania);
                while ($mostrar = mysqli_fetch_assoc($res_campania)) {
                    $campania   =   $mostrar['campania'];
                    $con_montos = "SELECT SUM(total_dia) AS total, SUM(movil_dia) AS movil, SUM(fijo_dia) AS fijo
                                   FROM consumo_diario
                                   WHERE fecha_inicio>='$fe_inicio 00:00:00' AND fecha_fin<='$fe_termino 23:59:59'
                                   AND reporte='10.9.2.$servidor'
                                   AND campania='$campania'
                                   ORDER BY campania";
                    $res_montos = mysqli_query($conexion,$con_montos);
                    while ($mostrar_montos = mysqli_fetch_assoc($res_montos)) {
                        $total_ =   $mostrar_montos['total'];
                        $total  =   number_format($total_);

                        $movil_ =   $mostrar_montos['movil'];
                        $movil  =   number_format($movil_);

                        $fijo_  =   $mostrar_montos['fijo'];
                        $fijo   =   number_format($fijo_);
                        echo "<tr>
                            <td class='edg-blue text-white'><strong>".$campania."</strong></td>
                            <td>".$total."</td>
                            <td>".$movil."</td>
                            <td>".$fijo."</td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    <?php
    }
    #Inico de busqueda RAPTOR
    else {
    ?>
        <thead class="text-center">
            <tr class="edg-red text-white">
                <th colspan="3">
                    <strong>Servidor <?php echo $servidor; ?></strong>
                </th>
            </tr>
            <tr class="edg-blue-sky">
                <th>Campaña</th>
                <th>Total RAPTOR</th>
            </tr>
        </thead>
        <tbody class="table-striped">
        <?php
            $con_campania = "SELECT distinct(campania)
            FROM consumo_diario_raptor
            WHERE fecha_inicio>='$fe_inicio 00:00:00' AND fecha_fin<='$fe_termino 23:59:59'
            AND reporte='10.9.2.$servidor'
            ORDER BY campania";
            $res_campania = mysqli_query($conexion,$con_campania);
            while ($mostrar = mysqli_fetch_assoc($res_campania)) {
                $campania   =   $mostrar['campania'];
                $con_montos_raptor = "SELECT SUM(total_raptor) AS total_raptor
                                FROM consumo_diario_raptor
                                WHERE fecha_inicio>='$fe_inicio 00:00:00' AND fecha_fin<='$fe_termino 23:59:59'
                                AND reporte='10.9.2.$servidor'
                                AND campania='$campania'
                                ORDER BY campania";
                $res_montos_raptor = mysqli_query($conexion,$con_montos_raptor);
                while ($mostrar_montos = mysqli_fetch_assoc($res_montos_raptor)) {
                    $total_raptor_  =   $mostrar_montos['total_raptor'];
                    $total_raptor   =   number_format($total_raptor_);
                    echo "<tr>
                        <td class='edg-blue text-white'><strong>".$campania."</strong></td>
                        <td>".$total_raptor."</td>
                    </tr>";
                }

            }
        ?>
    <?php
    }
    ?>
        </tbody>
</table>