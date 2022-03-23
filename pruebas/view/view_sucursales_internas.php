<?php
require '../class/conexion.php';
include '../class/SucursalesInternas.php';
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
<label for="floatingInputValue">Datos por centro Interno</label>
<div class="row ">
    <div class="col col-3 text-center">
        <div >
            <div class="row bg-primary text-center text-white">
                <p><h4 class="h4" type="button" data-bs-toggle="collapse" data-bs-target="#datosEscorza" aria-expanded="false" aria-controls="datosEscorza">ESCORZA <svg class="icon icon-tabler icon-tabler-hand-click" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                    <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                    <path d="M5 3l-1 -1" />
                    <path d="M4 7h-1" />
                    <path d="M14 3l1 -1" />
                    <path d="M15 6h1" /></h4>
                    </svg>
                </p>
            </div>
        </div>

        <div >
            <div class="row bg-primary text-center text-white">
                <p><h4 class="h4" type="button" data-bs-toggle="collapse" data-bs-target="#datosRevolucion" aria-expanded="false" aria-controls="datosRevolucion">REVOLUCIÓN<svg class="icon icon-tabler icon-tabler-hand-click" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                    <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                    <path d="M5 3l-1 -1" />
                    <path d="M4 7h-1" />
                    <path d="M14 3l1 -1" />
                    <path d="M15 6h1" /></h4>
                </p>
            </div>

        </div>
                    
        <div >
            <div class="row bg-primary text-center text-white">
                <p><h4 class="h4" type="button" data-bs-toggle="collapse" data-bs-target="#datosTlajomulco" aria-expanded="false" aria-controls="datosTlajomulco">TLAJOMULCO <svg class="icon icon-tabler icon-tabler-hand-click" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5" />
                    <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5" />
                    <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5" />
                    <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                    <path d="M5 3l-1 -1" />
                    <path d="M4 7h-1" />
                    <path d="M14 3l1 -1" />
                    <path d="M15 6h1" /></h4>
                </p>
            </div>

        </div>

        <div>
            <span class="badge bg-info">Dar Click en Nombre para abrir y cerrar.</span>
        </div>
    </div>
    <div class="col col-9">
        <div class="row p-2 collapse " id="datosEscorza">
        <span class="badge bg-warning">Escorza</span>
        <hr>
            <?php
                $escorza    =   new SucursalesInternas($conexion,$fecha_inicio,$fecha_termino);
                $escorza    ->  consumoEscorza();
            ?>
        </div>
            
        <div class="row p-2 collapse " id="datosRevolucion">
        <span class="badge bg-warning">Revolución</span>
        <hr>
        
            <?php
                $revolucion    =   new SucursalesInternas($conexion,$fecha_inicio,$fecha_termino);
                $revolucion    ->  consumoRevolucion();
            ?>
        </div>
            
        <div class="row p-2 collapse " id="datosTlajomulco">
        <span class="badge bg-warning">Tlajomulco</span>
        <hr>
            <?php
                $tlajomulco    =   new SucursalesInternas($conexion,$fecha_inicio,$fecha_termino);
                $tlajomulco    ->  consumoTlajomulco();
            ?>
        </div>
    </div>
</div>