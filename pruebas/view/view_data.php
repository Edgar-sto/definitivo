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
// $tipo = $_POST['internoExternoAll'];
// $sucursal = $_POST['sucursal'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_termino = $_POST['fecha_termino'];

?>
<label for="floatingInputValue">Datos por día</label>
<div class="row table-responsive table-responsive-lg">
    <table class="table table-bordered table-sm table-primary table-hover">
        <thead class="text-center align-middle">
            <tr class="table-primary ">
                <th scope="col" rowspan="2">Fechas</th>
                <th scope="col" colspan="2">Marcatel</th>
                <th scope="col" colspan="2">MCM</th>
                <th scope="col" colspan="2">Ipcom</th>
                <th scope="col" colspan="2">Haz</th>
            </tr>
            <tr class="table-primary">
                <th scope="col">Movil</th>
                <th scope="col">Fijo</th>
                <th scope="col">Movil</th>
                <th scope="col">Fijo</th>
                <th scope="col">Movil</th>
                <th scope="col">Fijo</th>
                <th scope="col">Movil</th>
                <th scope="col">Fijo</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $consumo= new Data($conexion,$fecha_inicio,$fecha_termino,prefijos_mcm);
                $consumo->totalConsumidoPorDia();
            ?>
        </tbody>
    </table>
</div>