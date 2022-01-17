<?php
require_once '../obtener/conexion.php';
$conexion       =   conexion_db('telefonia', 'localhost');
$carrier        =   $_POST['carrier'];
$fecha_inicio   =   $_POST['fecha_inicio'];
$fecha_termino  =   $_POST['fecha_termino'];
?>
<main id="consulta_<?php echo $carrier ?>" class="container-fluid">
    <div class="container-fluid">
        <header class="text-center">
            <h1>
                <img src="../img/logos/btn-<?php echo $carrier ?>.png" alt="<?php echo $carrier ?>">
                <a class="" role="button" href="./excel_raptor.php?fecha_inicio=<?php echo "{$fecha_inicio}";?>&&fecha_termino=<?php echo "{$fecha_termino}";?>">
                    <svg alt="Descargar Excel" class="icon icon-tabler icon-tabler-file-download" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                        <line x1="12" y1="11" x2="12" y2="17" />
                        <polyline points="9 14 12 17 15 14" />
                    </svg>
                </a>
            </h1>
        </header>
        <div class="row">
            <section class="container-fluid">
                <?php
                require './fact_raptor.php';
                ?>
            </section>
        </div>
    </div>
</main>