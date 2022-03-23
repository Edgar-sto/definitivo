<?php
class SucursalesInternas
{

    public function __construct($conexion, $f_inicio, $f_termino)
    {
        $this->conexion =   $conexion;
        $this->f_inicio =   $f_inicio;
        $this->f_termino =   $f_termino;
        // $this->prefijo  =   $prefijo;
    }

    public function consumoEscorza()
    {
        /****campañas y grupos****/
        $campañas_grupos_escorza = array(
            "HSBC BT"  => "LAB-BT','STO_BALANCE_TRASNFER','HSBC-STO-ESCORZA-BT','ADMIN-ESPECIALSUPERV','ADMIN-ESPECIALBALANC','HSBC-STO-ESCOR-LOWBT','HSBC-STO-ESCOR-MEDBT','HSBC-STO-ESCOR-TOPBT",
            "HSBC LEC" => "HSBC-STO-ESCORZA-LEC",
            "HSBC MA"  => "HSBC-GERENTES','HSBC-STO-ESCORZA-MA','HSBC-STO-LABESCO-MA','ADMIN','VALIDACION','HSBC-STO-ESCORZA-M','ESPECIAL-CAMPAA','STO-FORMALIZACION",
            "HSBC PPM" => "LAB-PPM','HSBC-PPM','ADMIN-ESPECIALPPM",
            "HSBC SG"  => "HSBC-SEGUROS','STO-STO-ESC-LABSEGUR",
            "HSBC CONS" => "n/a",
            "HSBC GA"  => "n/a",
            "HSBC AC"  => "n/a",
            "HSBC COM" => "n/a",

            "Santander MA" => "LAB-ESC-SANT','SANTADER-STO-ESC-LAB','SANTANDER-STO-ESCORZ','SANTAN-FORMALIZACION",

            "INVEX CE" => "n/a",
            "INVEX MA" => "n/a"
        );
        $all_prefijos      =   array(
            'Marcatel'    =>  "15','777",
            'MCM'         =>  "11','999",
            'Ipcom'       =>  "28','444",
            'Haz'         =>  "14','555"
        );
        ?>
        <div class="row">
        <?php


        foreach ($all_prefijos as $carrier => $prefijo) {
?>

            <div class="col-md-6 table-responsive" id="multiCollapseExampleEscorza<?php echo $carrier; ?>">
                <table class="table table-responsive table-hover border-secondary">
                    <thead class="thead-inverse table-primary">
                        <tr>
                            <th class="fs-5 text-center" colspan="4"><?php echo $carrier; ?></th>
                        </tr>
                        <tr>
                            <th><strong>Campaña</strong></th>
                            <th><strong>Movil</strong></th>
                            <th><strong>Fijo</strong></th>
                            <th><strong>Total</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <label class="fs-5 text-center d-block text-white"><?php echo $carrier; ?></label>
                    <div class="row bg-light border-bottom border-dark text-black text-center">
                        <div class="col-sm-3 border-end border-dark"><strong>Campaña</strong></div>
                        <div class="col-sm-3"><strong>Movil</strong></div>
                        <div class="col-sm-3"><strong>Fijo</strong></div>
                        <div class="col-sm-3"><strong>Total</strong></div>
                    </div> -->
                        <?php
                        foreach ($campañas_grupos_escorza as $campanias => $grupos) {
                            switch ($prefijo) {
                                case "15','777":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "28','444":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "11','999":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.05;
                                    break;

                                case "14','555":
                                    $costo_movil = 0.09 / 60;
                                    $costo_fijo = 0.04 / 60;
                                    break;
                            }
                            if ($campanias == "HSBC BT" || $campanias == "HSBC LEC" || $campanias == "HSBC MA" || $campanias == "HSBC PPM" || $campanias == "HSBC SG" || $campanias == "HSBC CONS" || $campanias == "HSBC GA" || $campanias == "HSBC AC" || $campanias == "HSBC COM") {
                                $fondobg = "bg-danger";
                            } elseif ($campanias == "Santander MA") {
                                $fondobg = "bg-warning";
                            } else {
                                $fondobg = "bg-success";
                            }

                            $query_escorza_hsbc =
                                "SELECT
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='movil' AND prefijo IN ('{$prefijo}')) AS movil,
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='fijo' AND prefijo IN ('{$prefijo}')) AS fijo;";

                            $resultado_esc_hsbc = $this->conexion->query($query_escorza_hsbc);
                            while ($row_esc_hsbc = $resultado_esc_hsbc->fetch_object()) {
                                $consumo_movil = $row_esc_hsbc->movil;
                                $consumo_fijo = $row_esc_hsbc->fijo;

                                $con_movil = $consumo_movil * $costo_movil;
                                $con_fijo = $consumo_fijo * $costo_fijo;
                                $total_con = $con_movil + $con_fijo;
                        ?>

                                <tr>
                                    <td class="<?php echo $fondobg; ?>"><?php echo $campanias ?></td>
                                    <td><?php echo "$" . number_format($con_movil, 2); ?></td>
                                    <td><?php echo "$" . number_format($con_fijo, 2); ?></td>
                                    <td scope="row"><?php echo "$" . number_format($total_con, 2); ?></td>
                                </tr>


                                <!-- <div class="row bg-light border-bottom border-dark text-black">
                                <div class="col-sm-3 border-end border-dark fs-6 <?php echo $fondobg; ?>"><label><?php echo $campanias ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_movil, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_fijo, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($total_con, 2); ?></label></div>
                            </div> -->
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
        <?php
    }

    public function consumoRevolucion()
    {
        /****campañas y grupos****/
        $campañas_grupos_revolucion = array(
            "HSBC BT"  => "BALANCE_TRASNFER_REV','HSBC-STO-REVO-BT",
            "HSBC LEC" => "n/a",
            "HSBC MA"  => "HSBC-REVOLUCION",
            "HSBC PPM" => "n/a",
            "HSBC SG"  => "HSBC-STO-REVO-SEGURO",
            "HSBC CONS" => "LAB-CONSUMOS','HSBC-STO-REV-CON-VAL','HSBC-STO-LABREV-COS','HSBC-STO-REV-CONSUMO','ADMIN-ESPECIALSUPERV','ADMIN-ESPECIALCONSUM','HSBC-CONSUMOS",
            "HSBC GA"  => "HSBC-STO-LABREV-GA','HSBC-STO-REV-GA','LAB-G4",
            "HSBC AC"  => "n/a",
            "HSBC COM" => "n/a",

            "Santander MA" => "SANTANDER-STO-REVO','SANTADER-STO-REV-LAB",

            "INVEX CE" => "Camp_Especiales','STO-ACELERADOR2','STO-PROCERO','STO-ACELERADOR','STO-INDIGO",
            "INVEX MA" => "STO-MO','STO-LAB','01800','STO-VALDA"
        );
        $all_prefijos      =   array(
            'Marcatel'    =>  "15','777",
            'MCM'         =>  "11','999",
            'Ipcom'       =>  "28','444",
            'Haz'         =>  "14','555"
        );
        ?>
        <div class="row">
        <?php


        foreach ($all_prefijos as $carrier => $prefijo) {
        ?>
            <div class="col-md-6" id="multiCollapseExampleRevolucion<?php echo $carrier; ?>">
                <table class="table table-responsive table-hover border-secondary">
                    <thead class="thead-inverse table-primary">
                        <tr>
                            <th class="fs-5 text-center" colspan="4"><?php echo $carrier; ?></th>
                        </tr>
                        <tr>
                            <th><strong>Campaña</strong></th>
                            <th><strong>Movil</strong></th>
                            <th><strong>Fijo</strong></th>
                            <th><strong>Total</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($campañas_grupos_revolucion as $campanias => $grupos) {
                            switch ($prefijo) {
                                case "15','777":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "28','444":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "11','999":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "14','555":
                                    $costo_movil = 0.09 / 60;
                                    $costo_fijo = 0.04 / 60;
                                    break;
                            }
                            if ($campanias == "HSBC BT" || $campanias == "HSBC LEC" || $campanias == "HSBC MA" || $campanias == "HSBC PPM" || $campanias == "HSBC SG" || $campanias == "HSBC CONS" || $campanias == "HSBC GA" || $campanias == "HSBC AC" || $campanias == "HSBC COM") {
                                $fondobg = "bg-danger";
                            } elseif ($campanias == "Santander MA") {
                                $fondobg = "bg-warning";
                            } else {
                                $fondobg = "bg-success";
                            }

                            $query_revolucion_hsbc =
                                "SELECT
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='movil' AND prefijo IN ('{$prefijo}')) AS movil,
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='fijo' AND prefijo IN ('{$prefijo}')) AS fijo;";

                            $resultado_rev_hsbc = $this->conexion->query($query_revolucion_hsbc);
                            while ($row_rev_hsbc = $resultado_rev_hsbc->fetch_object()) {
                                $consumo_movil = $row_rev_hsbc->movil;
                                $consumo_fijo = $row_rev_hsbc->fijo;

                                $con_movil = $consumo_movil * $costo_movil;
                                $con_fijo = $consumo_fijo * $costo_fijo;
                                $total_con = $con_movil + $con_fijo;
                        ?>
                                <tr>
                                    <td class="<?php echo $fondobg; ?>"><?php echo $campanias ?></td>
                                    <td><?php echo "$" . number_format($con_movil, 2); ?></td>
                                    <td><?php echo "$" . number_format($con_fijo, 2); ?></td>
                                    <td scope="row"><?php echo "$" . number_format($total_con, 2); ?></td>
                                </tr>


                                <!-- <div class="row bg-light border-bottom border-dark text-black">
                                <div class="col-sm-3 border-end border-dark fs-6 <?php echo $fondobg; ?>"><label><?php echo $campanias ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_movil, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_fijo, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($total_con, 2); ?></label></div>
                            </div> -->
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
        <?php
    }

    public function consumoTlajomulco()
    {
        /****campañas y grupos****/
        $campañas_grupos_tlajomulco = array(
            "HSBC BT"  => "HSBC-STO-TLALAB-BT','BALANCE_TRANSFER_TLA','HSBC-STO-TLAJO-TOPBT','HSBC-STO-TLA-BT','HSBC-STO-TLAJO-MEDBT','HSBC-STO-TLAJO-LOWBT",
            "HSBC LEC" => "n/a",
            "HSBC MA"  => "HSBC-TLAJOMULCO','HSBC-STO-LABTLA-MA','ADMIN-ESPECIAL-SUPER','HSBC_TLAJOMULCO",
            "HSBC PPM" => "n/a",
            "HSBC SG"  => "",
            "HSBC CONS" => "",
            "HSBC GA"  => "ADMIN-ESPECIAL-GA','LAB-G4','HSBC-STO-TLA-GA-VAL','HSBC-STO-TLAJO-GA",
            "HSBC AC"  => "HSBC-STO-TLAJO-ACTIV','HSBC-STO-TLAJO-ACT",
            "HSBC COM" => "HSBC-COM",

            "Santander MA" => "SANTANDER-STO-TLAJO",

            "INVEX CE" => "n/a",
            "INVEX MA" => "n/a"
        );
        $all_prefijos      =   array(
            'Marcatel'    =>  "15','777",
            'MCM'         =>  "11','999",
            'Ipcom'       =>  "28','444",
            'Haz'         =>  "14','555"
        );
        ?>
        <div class="row">
        <?php

        foreach ($all_prefijos as $carrier => $prefijo) {
        ?>
            <div class="col-md-6" id="multiCollapseExampleTlajomulco<?php echo $carrier; ?>">
                <table class="table table-responsive table-hover border-secondary">
                    <thead class="thead-inverse table-primary">
                        <tr>
                            <th class="fs-5 text-center" colspan="4"><?php echo $carrier; ?></th>
                        </tr>
                        <tr>
                            <th><strong>Campaña</strong></th>
                            <th><strong>Movil</strong></th>
                            <th><strong>Fijo</strong></th>
                            <th><strong>Total</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($campañas_grupos_tlajomulco as $campanias => $grupos) {
                            switch ($prefijo) {
                                case "15','777":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "28','444":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "11','999":
                                    $costo_movil = 0.11;
                                    $costo_fijo = 0.04;
                                    break;

                                case "14','555":
                                    $costo_movil = 0.09 / 60;
                                    $costo_fijo = 0.04 / 60;
                                    break;
                            }
                            if ($campanias == "HSBC BT" || $campanias == "HSBC LEC" || $campanias == "HSBC MA" || $campanias == "HSBC PPM" || $campanias == "HSBC SG" || $campanias == "HSBC CONS" || $campanias == "HSBC GA" || $campanias == "HSBC AC" || $campanias == "HSBC COM") {
                                $fondobg = "bg-danger";
                            } elseif ($campanias == "Santander MA") {
                                $fondobg = "bg-warning";
                            } else {
                                $fondobg = "bg-success";
                            }

                            $query_tlajomulco_hsbc =
                                "SELECT
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='movil' AND prefijo IN ('{$prefijo}')) AS movil,
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='fijo' AND prefijo IN ('{$prefijo}')) AS fijo;";

                            $resultado_tla_hsbc = $this->conexion->query($query_tlajomulco_hsbc);
                            while ($row_tla_hsbc = $resultado_tla_hsbc->fetch_object()) {
                                $consumo_movil = $row_tla_hsbc->movil;
                                $consumo_fijo = $row_tla_hsbc->fijo;

                                $con_movil = $consumo_movil * $costo_movil;
                                $con_fijo = $consumo_fijo * $costo_fijo;
                                $total_con = $con_movil + $con_fijo;
                        ?>
                                <tr>
                                    <td class="<?php echo $fondobg; ?>"><?php echo $campanias ?></td>
                                    <td><?php echo "$" . number_format($con_movil, 2); ?></td>
                                    <td><?php echo "$" . number_format($con_fijo, 2); ?></td>
                                    <td scope="row"><?php echo "$" . number_format($total_con, 2); ?></td>
                                </tr>


                                <!-- <div class="row bg-light border-bottom border-dark text-black">
                                <div class="col-sm-3 border-end border-dark fs-6 <?php echo $fondobg; ?>"><label><?php echo $campanias ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_movil, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_fijo, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($total_con, 2); ?></label></div>
                            </div> -->
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
        <?php
    }
}