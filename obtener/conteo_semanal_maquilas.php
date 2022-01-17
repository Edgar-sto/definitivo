<?php
/* Variables enviadas de formulario*/
$servidor   =   $_POST['servidor_maquilas'];
$tipo       =   $_POST['tipo_busqueda_semanal'];
$fe_inicio    =   $_POST['fecha_inicio_semanal'];
$fe_termino     =   $_POST['fecha_termino_semanal'];
/**
 * Variables para conexion
 */
$servername =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "telefonia";
$conexion   =   mysqli_connect($servername, $user, $password, $database);

if (!$conexion) {
    die("!Servidor no encontrado !" . mysqli_connect_error());
} else {
    /*echo"conexion exitosa";
    echo"<br>";
    echo"$servidor";*/
}
?>

<table class="table table-bordered">
    <?php
    if ($tipo == "Movil & fijo") {
    ?>
        <thead class="mdb-illuminating  text-center sticky-top">
            <tr>
                <th>Campaña</th>
                <th>Total</th>
                <th>Consumo movil</th>
                <th>Consumo fijo</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            <?php
            /*$servidores = array(5,6,8,11,22,27,28,29,34,35,36,37,38,39,40,41,42,43,44,45,46,47,201);
                $tamanio_array = count($servidores);
                for($x = 0; $x < $tamanio_array; $x++)
                {*/
            echo "<tr class='bg-danger '>";
            #$reporte = $servidores[$x];
            echo "<td id='fila_numero_de_reporte' colspan='5'><strong>Servidor " . $servidor . "</strong></td>";
            echo "</tr>";
            $consultar_campania = "SELECT DISTINCT (campania)
                    FROM consumo_diario
                    WHERE fecha_inicio>='$fe_inicio 00:00:00'
                    AND fecha_fin<='$fe_termino 23:59:59'
                    AND reporte='10.9.2.$servidor'
                    ORDER BY campania";
            $resultado_campania =   mysqli_query($conexion, $consultar_campania);
            while ($mostrar_campania   =   mysqli_fetch_assoc($resultado_campania)) {
                $campaign   =   $mostrar_campania['campania'];
                //var_dump($reporte);
                if (empty($campaign)) {
                    //espacio vacio
                } else {
                    echo "<tr class='text-right'>";
                    echo "<td id='celda_campania' class='mdb-ultimate-gray  celda_contenido text-left'>" . $campaign . "</td>";
                    $consulta_consumo_semanal_total = "SELECT SUM(total_dia) AS TOTAL
                                FROM consumo_diario
                                WHERE fecha_inicio>='$fe_inicio 00:00:00'
                                AND fecha_fin<='$fe_termino 23:59:59'
                                AND reporte='10.9.2.$servidor'
                                AND campania='$campaign'";
                    $resultado_total =   mysqli_query($conexion, $consulta_consumo_semanal_total);
                    $mostrar_total   =   mysqli_fetch_assoc($resultado_total);
                    $monto_total_    =   $mostrar_total['TOTAL'];
                    $monto_total     =   number_format($monto_total_);
                    if (empty($monto_total)) {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>0</strong></td>";
                    } else {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>" . $monto_total . "</strong></td>";
                    }

                    $consulta_consumo_semanal_movil = "SELECT SUM(movil_dia) AS MOVIL
                                FROM consumo_diario
                                WHERE fecha_inicio>='$fe_inicio 00:00:00'
                                AND fecha_fin<='$fe_termino 23:59:59'
                                AND reporte='10.9.2.$servidor'
                                AND campania='$campaign'";
                    $resultado_movil =   mysqli_query($conexion, $consulta_consumo_semanal_movil);
                    $mostrar_movil   =   mysqli_fetch_assoc($resultado_movil);
                    $monto_movil_    =   $mostrar_movil['MOVIL'];
                    $monto_movil     =   number_format($monto_movil_);
                    if (empty($monto_movil)) {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>0</strong></td>";
                    } else {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>" . $monto_movil . "</strong></td>";
                    }

                    $consulta_consumo_semanal_fijo = "SELECT SUM(fijo_dia) AS FIJO
                                FROM consumo_diario
                                WHERE fecha_inicio>='$fe_inicio 00:00:00'
                                AND fecha_fin<='$fe_termino 23:59:59'
                                AND reporte='10.9.2.$servidor'
                                AND campania='$campaign'";
                    $resultado_fijo =   mysqli_query($conexion, $consulta_consumo_semanal_fijo);
                    $mostrar_fijo   =   mysqli_fetch_assoc($resultado_fijo);
                    $monto_fijo_    =   $mostrar_fijo['FIJO'];
                    $monto_fijo     =   number_format($monto_fijo_);
                    if (empty($monto_fijo)) {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>0</strong></td>";
                    } else {
                        echo "<td class='mdb-ultimate-gray-medio'><strong>" . $monto_fijo . "</strong></td>";
                    }
                }
                echo "</tr>";
            }
            //}
            mysqli_free_result($resultado_campania); // Liberamos los registros
            mysqli_close($conexion);
            ?>
        </tbody>
    <?php
    }
    #Inico de busqueda RAPTOR
    else {
    ?>
        <thead class="mdb-illuminating  text-center sticky-top">
            <tr>
                <th>Campaña</th>
                <th>Total RAPTOR</th>
            </tr>
        </thead>
        <tbody class="table-striped">
        <?php
        /*$servidores = array(5,6,8,11,22,27,28,29,34,35,36,37,38,39,40,41,42,43,44,45,46,201);
                $tamanio_array = count($servidores);
                for($x = 0; $x < $tamanio_array; $x++)
                {*/
        echo "<tr class='bg-danger'>";
        //$reporte = $servidores[$x];
        echo "<td id='fila_numero_de_reporte' colspan='5'><strong>Servidor  " . $servidor . "</strong></td>";
        echo "</tr>";
        $consultar_campania = "SELECT DISTINCT (campania)
                    FROM consumo_diario_raptor
                    WHERE fecha_inicio>='$fe_inicio 00:00:00'
                    AND fecha_fin<='$fe_termino 23:59:59'
                    AND reporte='10.9.2.$servidor'
                    ORDER BY campania";
        $resultado_campania =   mysqli_query($conexion, $consultar_campania);
        while ($mostrar_campania   =   mysqli_fetch_assoc($resultado_campania)) {
            $campaign           =   $mostrar_campania['campania'];
            //var_dump($campaign);
            if (empty($campaign)) {
                //espacio vacio
            } else {
                echo "<tr class=''>";
                echo "<td id='celda_campania' class='mdb-ultimate-gray '>" . $campaign . "</td>";
                $consulta_raptor = "SELECT SUM(total_raptor) AS RAPTOR
                                FROM consumo_diario_raptor
                                WHERE fecha_inicio>='$fe_inicio 00:00:00'
                                AND fecha_fin<='$fe_termino 23:59:59'
                                AND reporte='10.9.2.$servidor'
                                AND campania IN ('$campaign')";
                $resultado_raptor =   mysqli_query($conexion, $consulta_raptor);
                $mostrar_raptor   =   mysqli_fetch_assoc($resultado_raptor);
                $monto_raptor_    =   $mostrar_raptor['RAPTOR'];
                $monto_raptor     =   number_format($monto_raptor_);
                if (empty($monto_raptor)) {
                    echo "<td class='mdb-ultimate-gray-medio'><strong>0</strong></td>";
                } else {
                    echo "<td class='mdb-ultimate-gray-medio'><strong>" . $monto_raptor . "</strong></td>";
                }

                echo "</tr>";
            }
        }
        //}
    }
        ?>
        </tbody>
</table>