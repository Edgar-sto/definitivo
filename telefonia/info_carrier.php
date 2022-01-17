<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="Edgar Dueñas" content="telefonia">
    <meta name="keyword" content="">
    <title>Telefonía</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .tabla-consumo-anual {
            position: relative;
            height: 330px;
            overflow: auto;
            margin-top: auto;
            margin-left: auto;
        }

        .tabla-consumo-anual-scroll-y {
            display: inline-block;
            width: 100%;
        }

        thead,
        tbody {
            font-size: 10px;
        }

        .col-server {
            font-size: 13px;
            color: white;
            position: relative;
            height: 184px;
            overflow: auto;
            margin-top: auto;
            margin-left: auto;
        }

        .col-server-scroll-y {
            display: inline-block;
            width: 100%;
        }

        h3 {
            color: #ffffff;
            margin: 15px 0px 15px 15px;
        }

        .tabla_server {
            width: 100%;
            text-align: center;
        }

        #demotext {
            margin: auto;
            padding: auto;
            color: #d40078;

            text-shadow: 2px 2px 0px #2de2e6, 5px 4px 0px rgba(13, 2, 33, 0.15);
            color: #d40078;

            text-align: center;
            font-size: 42px;
        }

        .cabecera_telefonia {
            align-items: center;
            display: flex;
            flex-direction: row;
            width: 100%;
            
        }
    </style>
</head>

<body>
    <?php
    require_once '../obtener/conexion.php';
    $conexion       =   conexion_db('telefonia', 'localhost');
    $carrier        =   $_POST['carrier'];
    $fecha_inicio   =   $_POST['fecha_inicio'];
    $fecha_termino  =   $_POST['fecha_termino'];
    /*date_default_timezone_set ('America/Mexico_City');
    echo $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
    Variables para conexion a base telefinia
    */
    if ($carrier == "Hazz") {
        $prefijos = ("14','555");
        $prefijo    =   array("14", "555");
    } elseif ($carrier == "Ipcom") {
        $prefijos = ("28','444");
        $prefijo    =   array("28","444");
    } elseif ($carrier == "Marcatel") {
        $prefijos = ("15','777");
        $prefijo    =   array("15", "777");
    } elseif ($carrier == "MCM") {
        $prefijos = ("11','999");
        $prefijo    =   array("11", "999");
    }
    ?>
    <div id="consulta_<?php echo $carrier ?>" class="container-fluid">
        <div class="container-fluid">
            <?php
            if ($carrier == "Marcatel") {
                echo "<header class='text-center'>
                    <h1>
                        <img src='../img/logos/btn-$carrier.png' alt='$carrier' class='edg-black'>
                    </h1>
                </header>";
            } else {
                echo "<header class='text-center'>
                    <h1>
                        <img src='../img/logos/btn-$carrier.png' alt='$carrier'>
                    </h1>
                </header>";
            }

            ?>
        </div>
        <section id="consumo_por_servidor" class="row">
            <div class="cabecera_telefonia">
                <label id="demotext">TELEFONÍA</label>
                <div>
                    <a class="" role="button" href="./excel_telefonia.php?fecha_inicio=<?php echo "{$fecha_inicio}"; ?>&&fecha_termino=<?php echo "{$fecha_termino}"; ?>&&carrier=<?php echo "{$carrier}"; ?>">
                        <svg  class="icon icon-tabler icon-tabler-download" width="36" height="36" viewBox="0 0 30 30" stroke-width="1.5" stroke="#d40078" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <polyline points="7 11 12 16 17 11" />
                            <line x1="12" y1="4" x2="12" y2="16" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <?php
            require './fact_telefonia.php';
            ?>
        </section>
    </div>
    </div>
</body>
<script>
    /**Grafica pastel todos */
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "line",
        /*opciones de grafica "line, doughnut, pie, horizontalBar, bar"*/
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Consumo <?php echo $carrier ?>',
                data: [<?php echo "$total_ene"; ?>, <?php echo "$total_feb"; ?>,
                    <?php echo "$total_mar"; ?>, <?php echo "$total_abr"; ?>,
                    <?php echo "$total_may"; ?>, <?php echo "$total_jun"; ?>
                ],
                backgroundColor: [
                    'rgb(255, 255, 77)',
                    'rgb(255, 178, 60)',
                    'rgb(249, 117, 42)',
                    'rgb(218, 0, 19)',
                    'rgb(215, 15, 10)',
                    'rgb(139, 2, 92)',
                    'rgb(63, 15, 151)',
                    'rgb(1, 27, 164)',
                    'rgb(0, 88, 196)',
                    'rgb(0, 147, 190)',
                    'rgb(73, 168, 52)',
                    'rgb(205, 222, 154)'
                ],
                borderColor: [
                    'rgb(205, 222, 154)',
                    'rgb(73, 168, 52)',
                    'rgb(0, 147, 190)',
                    'rgb(0, 88, 196)',
                    'rgb(1, 27, 164)',
                    'rgb(63, 15, 151)',
                    'rgb(139, 2, 92)',
                    'rgb(221, 0, 18)',
                    'rgb(218, 0, 19)',
                    'rgb(249, 117, 42)',
                    'rgb(255, 178, 60)',
                    'rgb(255, 255, 77)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById("graf_consumo_movil").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "doughnut",
        /*opciones de grafica "line, doughnut, pie, horizontalBar, bar"*/
        data: {
            labels: ['Consumo Movil', 'Consumo Fijo'],
            datasets: [{
                label: 'Consumo Mensual',
                data: [<?php echo "$total_movil_a_graficar"; ?>, <?php echo "$total_fijo_a_graficar"; ?>],
                backgroundColor: [
                    'rgb( 29, 32, 32)',
                    'rgb(122, 135, 135, 0.6)'
                ]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</html>