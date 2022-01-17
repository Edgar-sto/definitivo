<?php
require_once '../../../obtener/conexion.php';
require_once '../../../reporte_tel/clases/searchCampania.php';
require_once '../../../reporte_tel/clases/searchGrupo.php';
require_once '../../../reporte_tel/clases/searchConsumo.php';
$conexion = conexion_centos("telefonia", "10.9.2.144");
$fecha_inicio = $_GET['fecha_inicio'];
$fecha_termino = $_GET['fecha_fin'];
$prefix = $_GET['carrier'];
$reporte = $_GET['reporte'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/augmented-ui@2/augmented-ui.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row table-responsible">
                <table class="table table-lg table-hover">
                    <thead class="table-dark text-center text-white">
                        <tr>
                            <th><?php echo $reporte ?></th>
                        </tr>
                        <tr>
                            <th>Campaña</th>
                            <th>Grupo</th>
                            <th>Consumo Movil</th>
                            <th>Consumo Fijo</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php
                        $campania = new searchCampania($conexion, $fecha_inicio, $fecha_termino, $prefix, $reporte);
                        $campania->busquedaCamapania();
                        foreach ($campania->busquedaCamapania() as $campania) {
                            //echo $campania;
                            $grupo = new searchGrupo($conexion, $fecha_inicio, $fecha_termino, $prefix, $reporte, $campania);
                            $grupo->busquedaGrupos();

                            foreach ($grupo->busquedaGrupos() as $grupos) {
                                //echo $grupos;
                                $consumo_ = new searchConsumo($conexion, $fecha_inicio, $fecha_termino, $prefix, $reporte, $campania, $grupos);
                                $consumo_->consumoMovil();
                                $consumo_->consumoFijo();
                                $consumo_->consumoDropMovil();
                                $consumo_->consumoDropfijo();
                                $consumo_->consumoBuzonmovil();
                                $consumo_->consumoBuzonfijo();

                                foreach ($consumo_->consumoMovil() as $consumo_movil) {
                                    echo $consumo_movil;
                                    echo "<td>$consumo_movil</td>";
                                }
                                foreach ($consumo_->consumoFijo() as $consumo_fijo) {
                                    echo $consumo_fijo;
                                }

                                foreach ($consumo_->consumoDropMovil() as $consumo_Drop_movil) {
                                    echo $consumo_Drop_movil;
                                }
                                foreach ($consumo_->consumoDropfijo() as $consumo_Drop_fijo) {
                                    echo $consumo_Drop_fijo;
                                }

                                foreach ($consumo_->consumoBuzonmovil() as $consumo_Buzon_movil) {
                                    echo $consumo_Buzon_movil;
                                }

                                foreach ($consumo_->consumoBuzonfijo() as $consumo_Buzon_fijo) {
                                    echo $consumo_Buzon_fijo;
                                }
                            }
                        }
                        ?> </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>