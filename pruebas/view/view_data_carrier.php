<?php
require '../class/conexion.php';
include '../class/Data.php';
/*CONSTANTES*/
const prefijos_mcm      =   "11','999";
const prefijos_marcatel =   "15','777";
const prefijos_ipcom    =   "28','444";
const prefijos_haz      =   "14','555";
const all_prefijos      =   array(
    'Marcatel'    =>  "15','777",
    'MCM'         =>  "11','999",
    'Ipcom'       =>  "28','444",
    'Haz'         =>  "14','555"
);
$conexion = conexion_db_local("telefonia", "127.0.0.1");
/*VARIABLES OBTENIDOS MÉTODO POST*/
$tipo = $_POST['internoExternoAll'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_termino = $_POST['fecha_termino'];
$sucursal = $_POST['sucursal'];
?>
<div class="col-lg-3">
    <h4>
        Marcatel
    </h4>
    <div class="row table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm">
            <thead class="text-center align-middle">
                <tr class="table-primary ">
                    <th scope="col" colspan="2">Marcatel</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary">
                    <td scope="col">Movil</td>
                    <td scope="col">Fijo</td>
                </tr>
                <tr class="table-primary">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->MovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary">
                    <td scope="col">Drop Movil</td>
                    <td scope="col">Drop Fijo</td>
                </tr>
                <tr class="table-primary">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->dropMovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary">
                    <td scope="col">Buzon Movil</td>
                    <td scope="col">Buzon Fijo</td>
                </tr>
                <tr class="table-primary">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->buzonMovilFijoPorCarrier();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-3">
    <h4>
        MCM
    </h4>
</div>
<div class="col-lg-3">
    <h4>
        Ipcom
    </h4>
</div>
<div class="col-lg-3">
    <h4>
        Haz
    </h4>
</div>