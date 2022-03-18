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
<label for="floatingInputValue">Datos desglosados por carrier</label>
<div class="col-lg-3 p-2">
    <div class="row table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm">
            <thead class="text-center align-middle">
                <tr class="table-primary ">
                    <th scope="col" colspan="2"><h4>Marcatel</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Movil</strong></td>
                    <td scope="col"><strong>Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->MovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Drop Movil</strong></td>
                    <td scope="col"><strong>Drop Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->dropMovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Buzon Movil</strong></td>
                    <td scope="col"><strong>Buzon Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_marcatel);
                        $consumo->buzonMovilFijoPorCarrier();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-3 p-2">
    <div class="row table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm">
            <thead class="text-center align-middle">
                <tr class="table-primary ">
                    <th scope="col" colspan="2"><h4>MCM</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Movil</strong></td>
                    <td scope="col"><strong>Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_mcm);
                        $consumo->MovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Drop Movil</strong></td>
                    <td scope="col"><strong>Drop Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_mcm);
                        $consumo->dropMovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Buzon Movil</strong></td>
                    <td scope="col"><strong>Buzon Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_mcm);
                        $consumo->buzonMovilFijoPorCarrier();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-3 p-2">
    <div class="row table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm">
            <thead class="text-center align-middle">
                <tr class="table-primary ">
                    <th scope="col" colspan="2"><h4>Ipcom</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Movil</strong></td>
                    <td scope="col"><strong>Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_ipcom);
                        $consumo->MovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Drop Movil</strong></td>
                    <td scope="col"><strong>Drop Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_ipcom);
                        $consumo->dropMovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Buzon Movil</strong></td>
                    <td scope="col"><strong>Buzon Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_ipcom);
                        $consumo->buzonMovilFijoPorCarrier();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-3 p-2">
    <div class="row table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm">
            <thead class="text-center align-middle">
                <tr class="table-primary ">
                    <th scope="col" colspan="2"><h4>Haz</h4></th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Movil</strong></td>
                    <td scope="col"><strong>Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_haz);
                        $consumo->MovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Drop Movil</strong></td>
                    <td scope="col"><strong>Drop Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_haz);
                        $consumo->dropMovilFijoPorCarrier();
                    ?>
                </tr>
                <tr class="table-primary text-center align-middle">
                    <td scope="col"><strong>Buzon Movil</strong></td>
                    <td scope="col"><strong>Buzon Fijo</strong></td>
                </tr>
                <tr class="table-light">                
                    <?php 
                        $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_haz);
                        $consumo->buzonMovilFijoPorCarrier();
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>