<?php
include '../clases/conexion.php';
include '../clases/searchReporte.php';
include '../clases/selecCarrier.php';
include '../clases/searchCampania.php';
include '../clases/searchGrupo.php';
include '../clases/searchConsumo.php';

$conexion = conexion_dc_centos("telefonia", "127.0.0.1");
$carrier = $_POST['carrier'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_termino = $_POST['fecha_termino'];

//INSTANCIA DE CLASE PARA DEFINIR PREFIJOS A USAR
$prefijo = new selecCarrier($carrier);
$pref = $prefijo->selecPrefijo();
foreach($pref  AS $prefix) {
//INSTANCIA PARA OBTENER LOS REPORTES CON EL PREFIJO SELECCIONADO
    $reporte = new searchReporte($conexion, $prefix, $fecha_inicio, $fecha_termino);
    $reporte->func_reporte();
    

/**FOREACH e los datosobtenidos de la clase buscar */
    foreach ($reporte->func_reporte() as $valuereporte) {
        $valuereporte;
    ?>
        <div class="table-responsive-lg">
            <table class="table table-sm table-light table-hover table-bordered border-dark align-middle caption-top">
                <thead class="table-dark">
                    <tr>
                        <th colspan="7" class="text-center"><?php echo $valuereporte; ?></th>
                    </tr>
                    <tr>
                        <th scope="col">ID.Campaña</th>
                        <th scope="col">Prefijos</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Consumo Movil</th>
                        <th scope="col">Consumo Fijo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //INSTANCIA DE CLASE PARA OBTENER LAS CAMPAÑAS
                    $campania = new searchCampania($conexion, $fecha_inicio, $fecha_termino, $prefix, $valuereporte);
                    $campania->busquedaCamapania();

                    foreach ($campania->busquedaCamapania() as $valuecampania) {
                        $valuecampania;
                        //INSTANCIA DE CLASE PARA OBTNER GRUPOS
                        $grupo = new searchGrupo($conexion, $fecha_inicio, $fecha_termino, $prefix, $valuereporte, $valuecampania);
                        $grupo->busquedaGrupos();


                        foreach ($grupo->busquedaGrupos() as $valuegrupos) {
                            $valuegrupos;
                            //INSTANCIA PARA OBTENER CONSUMO MOVIL-FIJO POR REPORTE
                            $consumo = new searchConsumo($conexion, $fecha_inicio, $fecha_termino, $prefix, $valuereporte, $valuecampania, $valuegrupos);

                            if ($valuegrupos != 'N/A') {
                                $consumo->consumoMovilFijo();
                    ?>
                                <tr>
                                    <td><?php echo $valuecampania; ?></td>
                                    <td><?php echo $prefix; ?></td>
                                    <td></td>
                                    <td><?php echo $valuegrupos; ?></td>
                                    <td></td>
                                    <?php foreach ($consumo->consumoMovilFijo() as $valueConsumoMF) { ?>
                                        <td><?php echo number_format($valueConsumoMF); ?></td>
                                    <?php } ?>
                                </tr>
                            <?php
                            } else if ($valuegrupos == "N/A") {
                                $consumo->consumoDmovilDfijo();
                            ?>
                                <tr class="table-warning">
                                    <td><?php echo $valuecampania; ?></td>
                                    <td><?php echo $prefix; ?></td>
                                    <td></td>
                                    <td>DROP</td>
                                    <td></td>
                                    <?php foreach ($consumo->consumoDmovilDfijo() as $valueConsumobuzonMF) { ?>
                                        <td><?php echo number_format($valueConsumobuzonMF); ?></td>
                                    <?php } ?>
                                </tr>
                                <?php
                                $consumo->consumoBmovilBfijo();
                                ?>
                                <tr class="table-warning">
                                    <td><?php echo $valuecampania; ?></td>
                                    <td><?php echo $prefix; ?></td>
                                    <td></td>
                                    <td>BUZON</td>
                                    <td></td>
                                    <?php foreach ($consumo->consumoBmovilBfijo() as $valueConsumobuzonMF) { ?>
                                        <td><?php echo number_format($valueConsumobuzonMF); ?></td>
                                    <?php } ?>
                                </tr>

                                <tr class="table-warning">
                                    <td><?php echo $valuecampania; ?></td>
                                    <td><?php echo $prefix; ?></td>
                                    <td></td>
                                    <td>CAMPAÑA0</td>
                                    <td></td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }

}
?>
<div class="container">
    <div class="row text-center">
        <a class="" role="button" href="http://10.9.2.147/definitivo/reporte_tel/excel/reporte_excel.php?fecha_inicio=<?php echo "{$fecha_inicio}"; ?>&&fecha_termino=<?php echo "{$fecha_termino}"; ?>&&carrier=<?php echo "{$carrier}"; ?>">
            <svg width="36" height="36" fill="currentColor" class="bi bi-file-earmark-spreadsheet" stroke="#d40078" viewBox="0 0 30 30">
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
            </svg>
        </a>
    </div>
</div>