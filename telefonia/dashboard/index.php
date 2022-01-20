<?php
require_once '../../obtener/conexion.php';
$conexion = conexion_centos("telefonia", "localhost");
//START CONSUMO TOTAL ANUAL POR MES-DIA
$dias = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
$t_dias = count($dias);
for ($i = 0; $i < $t_dias; $i++) {
    $dia = $dias[$i];

    /****START ENERO ****/
    $consulta_ene = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-01-{$dia} 00:00:00' AND fecha_termino<='2021-01-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultar_ene = mysqli_query($conexion, $consulta_ene);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultar_ene)) {
        $enero[] = $a['total_dia'];
    }
    /****END ENERO ****/
    /****START FEBRERO ****/
    $consulta_feb = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-02-{$dia} 00:00:00' AND fecha_termino<='2021-02-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarfeb = mysqli_query($conexion, $consulta_feb);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarfeb)) {
        $febrero[] = $a['total_dia'];
    }
    /****END FEBRERO ****/
    /****START MARZO ****/
    $consulta_mar = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-03-{$dia} 00:00:00' AND fecha_termino<='2021-03-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarmar = mysqli_query($conexion, $consulta_mar);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarmar)) {
        $marzo[] = $a['total_dia'];
    }
    /****END MARZO ****/
    /****START ABRIL ****/
    $consulta_abr = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-04-{$dia} 00:00:00' AND fecha_termino<='2021-04-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarabr = mysqli_query($conexion, $consulta_abr);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarabr)) {
        $abril[] = $a['total_dia'];
    }
    /****END ABRIL ****/
    /****START MAYO ****/
    $consulta_MAY = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-05-{$dia} 00:00:00' AND fecha_termino<='2021-05-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarMAY = mysqli_query($conexion, $consulta_MAY);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarMAY)) {
        $mayo[] = $a['total_dia'];
    }
    /****END MAYO ****/
    /****START JUNIO  ****/
    $consulta_JUN = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-06-{$dia} 00:00:00' AND fecha_termino<='2021-06-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarJUN = mysqli_query($conexion, $consulta_JUN);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarJUN)) {
        $junio[] = $a['total_dia'];
    }
    /****END JUNIO ****/
    /****START JULIO  ****/
    $consulta_JUL = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-07-{$dia} 00:00:00' AND fecha_termino<='2021-07-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarJUL = mysqli_query($conexion, $consulta_JUL);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarJUL)) {
        $julio[] = $a['total_dia'];
    }
    /****END JULIO ****/
    /****START AGOSTO  ****/
    $consulta_AGO = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-08-{$dia} 00:00:00' AND fecha_termino<='2021-08-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarAGO = mysqli_query($conexion, $consulta_AGO);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarAGO)) {
        $agosto[] = $a['total_dia'];
    }
    /****END AGOSTO ****/
    /****START SEPTIEMBRE  ****/
    $consulta_SEP = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-09-{$dia} 00:00:00' AND fecha_termino<='2021-09-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarSEP = mysqli_query($conexion, $consulta_SEP);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarSEP)) {
        $septiembre[] = $a['total_dia'];
    }
    /****END SEPTIEMBRE ****/
    /****START OCTUBRE  ****/
    $consulta_OCT = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-10-{$dia} 00:00:00' AND fecha_termino<='2021-10-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarOCT = mysqli_query($conexion, $consulta_OCT);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarOCT)) {
        $octubre[] = $a['total_dia'];
    }
    /****END OCTUBRE ****/
    /****START NOVIEMBRE  ****/
    $consulta_NOV = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-11-{$dia} 00:00:00' AND fecha_termino<='2021-11-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarNOV = mysqli_query($conexion, $consulta_NOV);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarNOV)) {
        $noviembre[] = $a['total_dia'];
    }
    /****END NOVIEMBRE ****/
    /****START DICIEMBRE  ****/
    $consulta_DIC = "SELECT SUM(consumo) AS total_dia  FROM reporte_telefonia
        WHERE fecha_inicio>='2021-12-{$dia} 00:00:00' AND fecha_termino<='2021-12-{$dia} 23:59:59'
        AND prefijo IN ('11','14','15','28','777','999','444','555');";
    $consultarDIC = mysqli_query($conexion, $consulta_DIC);
    //$reporte = array();
    while ($a = mysqli_fetch_assoc($consultarDIC)) {
        $diciembre[] = $a['total_dia'];
    }
    /****END DICIEMBRE ****/
}
//END CONSUMO TOTAL ANUAL POR MES-DIA
//CONUSMO DIA ANTERIOR POR CARRIER
date_default_timezone_set('America/Mexico_City');
//$date="2021-09-16";
$dia = new DateTime();
$dia->sub(new DateInterval('P1D'));
$dia = $dia->format('Y-m-d'); //Datos a guardar date('Y-m-d')

if (
    $dia == "2022-01-09" ||
    $dia == "2022-01-16" ||
    $dia == "2022-01-23" ||
    $dia == "2022-01-30" ||
    $dia == "2022-02-06" ||
    $dia == "2022-02-13" ||
    $dia == "2022-02-20" ||
    $dia == "2022-02-27" ||
    $dia == "2022-03-06" ||
    $dia == "2022-03-13" ||
    $dia == "2022-03-20" ||
    $dia == "2022-03-27" ||
    $dia == "2022-04-03" ||
    $dia == "2022-04-10" ||
    $dia == "2022-04-17" ||
    $dia == "2022-04-24" ||
    $dia == "2022-05-01" ||
    $dia == "2022-05-08" ||
    $dia == "2022-05-15" ||
    $dia == "2022-05-22" ||
    $dia == "2022-05-29" 
) {
    $date = new DateTime();
    $date->sub(new DateInterval('P2D'));
    $date = $date->format('Y-m-d');
} else { // format failed
    $date = new DateTime();
    $date->sub(new DateInterval('P1D'));
    $date = $date->format('Y-m-d');
}
/****STAR IPCOM****/
$ipcom = "28','444";
$query_reportes_ipcom = "SELECT DISTINCT(reporte) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') ORDER BY reporte;";
//$reportes=array();
$reportes_ipcom = mysqli_query($conexion, $query_reportes_ipcom);
while ($resul_ipcom = mysqli_fetch_assoc($reportes_ipcom)) {
    $reportes[] = $resul_ipcom['reporte'];
}
$query_consumo_ipcom = "SELECT
    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='movil') AS movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='fijo') AS fijo,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='drop_movil') AS drop_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='drop_fijo') AS drop_fijo,


    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='buzon_movil') AS buzon_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$ipcom}') AND tipo='buzon_fijo') AS buzon_fijo;";
$consumo_ipcom = mysqli_query($conexion, $query_consumo_ipcom);
while ($r_consumo_ipcom = mysqli_fetch_assoc($consumo_ipcom)) {
    $movil_ipcom = $r_consumo_ipcom['movil'];
    $fijo_ipcom = $r_consumo_ipcom['fijo'];
    $dropM_ipcom = $r_consumo_ipcom['drop_movil'];
    $dropF_ipcom = $r_consumo_ipcom['drop_fijo'];
    $buzonM_ipcom = $r_consumo_ipcom['buzon_movil'];
    $buzonF_ipcom = $r_consumo_ipcom['buzon_fijo'];
}
/****END IPCOM****/
/****STAR MARCATEL****/
$marcatel = "15','777";
$query_reportes_marcatel = "SELECT DISTINCT(reporte) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') ORDER BY reporte;";
$reportes_marcatel = mysqli_query($conexion, $query_reportes_marcatel);
while ($resul_marcatel = mysqli_fetch_assoc($reportes_marcatel)) {
    $reportes_mtel[] = $resul_marcatel['reporte'];
}
$query_consumo_marcatel = "SELECT
    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='movil') AS movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='fijo') AS fijo,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='drop_movil') AS drop_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='drop_fijo') AS drop_fijo,


    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='buzon_movil') AS buzon_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$marcatel}') AND tipo='buzon_fijo') AS buzon_fijo;";
$consumo_marcatel = mysqli_query($conexion, $query_consumo_marcatel);
while ($r_consumo_marcatel = mysqli_fetch_assoc($consumo_marcatel)) {
    $movil_marcatel = $r_consumo_marcatel['movil'];
    $fijo_marcatel = $r_consumo_marcatel['fijo'];
    $dropM_marcatel = $r_consumo_marcatel['drop_movil'];
    $dropF_marcatel = $r_consumo_marcatel['drop_fijo'];
    $buzonM_marcatel = $r_consumo_marcatel['buzon_movil'];
    $buzonF_marcatel = $r_consumo_marcatel['buzon_fijo'];
}
/****END MARCATEL****/
/****STAR MCM****/
$mcm = "11','999";
$query_reportes_mcm = "SELECT DISTINCT(reporte) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') ORDER BY reporte;";
$reportes_mcm = mysqli_query($conexion, $query_reportes_mcm);
while ($resul_mcm = mysqli_fetch_assoc($reportes_mcm)) {
    $reportes_MCM[] = $resul_mcm['reporte'];
}
$query_consumo_mcm = "SELECT
    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='movil') AS movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='fijo') AS fijo,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='drop_movil') AS drop_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='drop_fijo') AS drop_fijo,


    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='buzon_movil') AS buzon_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$mcm}') AND tipo='buzon_fijo') AS buzon_fijo;";
$consumo_mcm = mysqli_query($conexion, $query_consumo_mcm);
while ($r_consumo_mcm = mysqli_fetch_assoc($consumo_mcm)) {
    $movil_mcm = $r_consumo_mcm['movil'];
    $fijo_mcm = $r_consumo_mcm['fijo'];
    $dropM_mcm = $r_consumo_mcm['drop_movil'];
    $dropF_mcm = $r_consumo_mcm['drop_fijo'];
    $buzonM_mcm = $r_consumo_mcm['buzon_movil'];
    $buzonF_mcm = $r_consumo_mcm['buzon_fijo'];
}
/****END MCM****/
/****STAR HAZ****/
$hazz = "14','555";
$query_reportes_hazz = "SELECT DISTINCT(reporte) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') ORDER BY reporte;";
$reportes_hazz = mysqli_query($conexion, $query_reportes_hazz);
while ($resul_hazz = mysqli_fetch_assoc($reportes_hazz)) {
    $reportes_HAZZ[] = $resul_hazz['reporte'];
}
$query_consumo_hazz = "SELECT
    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='movil') AS movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='fijo') AS fijo,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='drop_movil') AS drop_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='drop_fijo') AS drop_fijo,


    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='buzon_movil') AS buzon_movil,

    (SELECT SUM(consumo) FROM reporte_telefonia
    WHERE fecha_inicio>='{$date} 00:00:00' AND fecha_termino<='{$date} 23:59:59'
    AND prefijo IN ('{$hazz}') AND tipo='buzon_fijo') AS buzon_fijo;";
$consumo_hazz = mysqli_query($conexion, $query_consumo_hazz);
while ($r_consumo_hazz = mysqli_fetch_assoc($consumo_hazz)) {
    $movil_hazz = $r_consumo_hazz['movil'];
    $fijo_hazz = $r_consumo_hazz['fijo'];
    $dropM_hazz = $r_consumo_hazz['drop_movil'];
    $dropF_hazz = $r_consumo_hazz['drop_fijo'];
    $buzonM_hazz = $r_consumo_hazz['buzon_movil'];
    $buzonF_hazz = $r_consumo_hazz['buzon_fijo'];
}
/****END HAZ****/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="../../assets/favicons/dashboard.ico" rel="icon">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/augmented-ui@2/augmented-ui.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/flatlybootstrap.min.css">
    <style>
        .fakeimg {
            height: 230px;
            background: rgb(112, 128, 144, 0.2);
            overflow-y: scroll;
        }

        .row-carrier {
            height: 300px;
        }

        .consumo-carrier {
            height: 670px;
            overflow-y: scroll;
        }

        .respmenu a {
            color: inherit;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-bottom: 2px solid #456789;
            max-width: 200px;
            background: #234567;
            font-variant: small-caps;
            text-shadow: 1px 1px black;
        }

        .respmenu input[type="checkbox"],
        .respmenu .fa-bars,
        .respmenu .fa-times {
            position: absolute;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            right: 0;
            top: 0;
            width: 48px;
            height: 48px;
        }

        .respmenu .fa-bars,
        .respmenu .fa-times {
            font-size: 48px;
            pointer-events: none;
        }

        .respmenu input[type="checkbox"] {
            opacity: 0;
        }

        .respmenu {
            color: white;
            position: relative;
            background: #123456;
            min-height: 48px;
        }

        .respmenu nav {
            display: none;
        }

        .respmenu input:checked~nav {
            display: block;
        }

        .respmenu input:checked~.fa-bars {
            display: none;
        }

        .respmenu input:not(:checked)~.fa-times {
            display: none;
        }
    </style>
</head>

<body>
    <main class="container-fluid">
        <header class="container">
            <div class="row">
                <h1 class="h1">Dashboard Telefonia</h1>
                <div class="respmenu">
                    <input type="checkbox">
                    <!-- <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i> -->
                    <svg class="icon icon-tabler icon-tabler-menu-2 fa-bars fa-times" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                    </svg>
                    <nav>
                        <ul>
                            <li><a href="#">Item 1</a></li>
                            <li><a href="#">Item 2</a></li>
                            <li><a href="#">Item 3</a></li>
                            <li><a href="#">Item 4</a></li>
                            <li><a href="#">Item 5</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="row">
                <h2 class="h2">Consumo diario</h2>
                <!-- ENERO -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enero">
                        Enero
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="enero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enero</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartenero" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartenero').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
                                                datasets: [{
                                                    label: 'Consumo de Enero',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($enero as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)',
                                                        'rgba(210, 69, 44, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)',
                                                        'rgba(210, 69, 44, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FEBRERO -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#febrero">
                        Febrero
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="febrero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Febrero</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartfebrero" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartfebrero').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
                                                datasets: [{
                                                    label: 'Consumo de Febrero',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($febrero as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)',
                                                        'rgba(210, 119, 44, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)',
                                                        'rgba(210, 119, 44, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MARZO -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#marzo">
                        Marzo
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="marzo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Marzo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartmarzo" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartmarzo').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Marzo',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($marzo as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)',
                                                        'rgba(210, 168, 44, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)',
                                                        'rgba(210, 168, 44, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ABRIL -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#abril">
                        Abril
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="abril" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Abril</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartabril" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartabril').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
                                                datasets: [{
                                                    label: 'Consumo de Abril',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($abril as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)',
                                                        'rgba(202, 210, 44, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)',
                                                        'rgba(202, 210, 44, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAYO -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mayo">
                        Mayo
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="mayo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mayo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartmayo" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartmayo').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Mayo',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($mayo as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)',
                                                        'rgba(102, 210, 44, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)',
                                                        'rgba(102, 210, 44, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- JUNIO -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#junio">
                        Junio
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="junio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Junio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartjunio" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartjunio').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
                                                datasets: [{
                                                    label: 'Consumo de Junio',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($junio as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(52, 210, 44, 0.4)', //1
                                                        'rgba(52, 210, 44, 0.4)', //2
                                                        'rgba(52, 210, 44, 0.4)', //3
                                                        'rgba(52, 210, 44, 0.4)', //4
                                                        'rgba(52, 210, 44, 0.4)', //5
                                                        'rgba(52, 210, 44, 0.4)', //6
                                                        'rgba(52, 210, 44, 0.4)', //7
                                                        'rgba(52, 210, 44, 0.4)', //8
                                                        'rgba(52, 210, 44, 0.4)', //9
                                                        'rgba(52, 210, 44, 0.4)', //10
                                                        'rgba(52, 210, 44, 0.4)', //11
                                                        'rgba(52, 210, 44, 0.4)', //12
                                                        'rgba(52, 210, 44, 0.4)', //13
                                                        'rgba(52, 210, 44, 0.4)', //14
                                                        'rgba(52, 210, 44, 0.4)', //15
                                                        'rgba(52, 210, 44, 0.4)', //16
                                                        'rgba(52, 210, 44, 0.4)', //17
                                                        'rgba(52, 210, 44, 0.4)', //18
                                                        'rgba(52, 210, 44, 0.4)', //19
                                                        'rgba(52, 210, 44, 0.4)', //20
                                                        'rgba(52, 210, 44, 0.4)', //21
                                                        'rgba(52, 210, 44, 0.4)', //22
                                                        'rgba(52, 210, 44, 0.4)', //23
                                                        'rgba(52, 210, 44, 0.4)', //24
                                                        'rgba(52, 210, 44, 0.4)', //25
                                                        'rgba(52, 210, 44, 0.4)', //26
                                                        'rgba(52, 210, 44, 0.4)', //27
                                                        'rgba(52, 210, 44, 0.4)', //28
                                                        'rgba(52, 210, 44, 0.4)', //29
                                                        'rgba(52, 210, 44, 0.4)' //30
                                                    ],
                                                    borderColor: [
                                                        'rgba(52, 210, 44, 1)', //1
                                                        'rgba(52, 210, 44, 1)', //2
                                                        'rgba(52, 210, 44, 1)', //3
                                                        'rgba(52, 210, 44, 1)', //4
                                                        'rgba(52, 210, 44, 1)', //5
                                                        'rgba(52, 210, 44, 1)', //6
                                                        'rgba(52, 210, 44, 1)', //7
                                                        'rgba(52, 210, 44, 1)', //8
                                                        'rgba(52, 210, 44, 1)', //9
                                                        'rgba(52, 210, 44, 1)', //10
                                                        'rgba(52, 210, 44, 1)', //11
                                                        'rgba(52, 210, 44, 1)', //12
                                                        'rgba(52, 210, 44, 1)', //13
                                                        'rgba(52, 210, 44, 1)', //14
                                                        'rgba(52, 210, 44, 1)', //15
                                                        'rgba(52, 210, 44, 1)', //16
                                                        'rgba(52, 210, 44, 1)', //17
                                                        'rgba(52, 210, 44, 1)', //18
                                                        'rgba(52, 210, 44, 1)', //19
                                                        'rgba(52, 210, 44, 1)', //20
                                                        'rgba(52, 210, 44, 1)', //21
                                                        'rgba(52, 210, 44, 1)', //22
                                                        'rgba(52, 210, 44, 1)', //23
                                                        'rgba(52, 210, 44, 1)', //24
                                                        'rgba(52, 210, 44, 1)', //25
                                                        'rgba(52, 210, 44, 1)', //26
                                                        'rgba(52, 210, 44, 1)', //27
                                                        'rgba(52, 210, 44, 1)', //28
                                                        'rgba(52, 210, 44, 1)', //29
                                                        'rgba(52, 210, 44, 1)' //30
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- JULIO -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#julio">
                        Julio
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="julio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Julio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartjulio" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartjulio').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Julio',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($julio as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(44, 210, 86, 0.4)', //1
                                                        'rgba(44, 210, 86, 0.4)', //2
                                                        'rgba(44, 210, 86, 0.4)', //3
                                                        'rgba(44, 210, 86, 0.4)', //4
                                                        'rgba(44, 210, 86, 0.4)', //5
                                                        'rgba(44, 210, 86, 0.4)', //6
                                                        'rgba(44, 210, 86, 0.4)', //7
                                                        'rgba(44, 210, 86, 0.4)', //8
                                                        'rgba(44, 210, 86, 0.4)', //9
                                                        'rgba(44, 210, 86, 0.4)', //10
                                                        'rgba(44, 210, 86, 0.4)', //11
                                                        'rgba(44, 210, 86, 0.4)', //12
                                                        'rgba(44, 210, 86, 0.4)', //13
                                                        'rgba(44, 210, 86, 0.4)', //14
                                                        'rgba(44, 210, 86, 0.4)', //15
                                                        'rgba(44, 210, 86, 0.4)', //16
                                                        'rgba(44, 210, 86, 0.4)', //17
                                                        'rgba(44, 210, 86, 0.4)', //18
                                                        'rgba(44, 210, 86, 0.4)', //19
                                                        'rgba(44, 210, 86, 0.4)', //20
                                                        'rgba(44, 210, 86, 0.4)', //21
                                                        'rgba(44, 210, 86, 0.4)', //22
                                                        'rgba(44, 210, 86, 0.4)', //23
                                                        'rgba(44, 210, 86, 0.4)', //24
                                                        'rgba(44, 210, 86, 0.4)', //25
                                                        'rgba(44, 210, 86, 0.4)', //26
                                                        'rgba(44, 210, 86, 0.4)', //27
                                                        'rgba(44, 210, 86, 0.4)', //28
                                                        'rgba(44, 210, 86, 0.4)', //29
                                                        'rgba(44, 210, 86, 0.4)', //30
                                                        'rgba(44, 210, 86, 0.4)' //31
                                                    ],
                                                    borderColor: [
                                                        'rgba(44, 210, 86, 1)', //1
                                                        'rgba(44, 210, 86, 1)', //2
                                                        'rgba(44, 210, 86, 1)', //3
                                                        'rgba(44, 210, 86, 1)', //4
                                                        'rgba(44, 210, 86, 1)', //5
                                                        'rgba(44, 210, 86, 1)', //6
                                                        'rgba(44, 210, 86, 1)', //7
                                                        'rgba(44, 210, 86, 1)', //8
                                                        'rgba(44, 210, 86, 1)', //9
                                                        'rgba(44, 210, 86, 1)', //10
                                                        'rgba(44, 210, 86, 1)', //11
                                                        'rgba(44, 210, 86, 1)', //12
                                                        'rgba(44, 210, 86, 1)', //13
                                                        'rgba(44, 210, 86, 1)', //14
                                                        'rgba(44, 210, 86, 1)', //15
                                                        'rgba(44, 210, 86, 1)', //16
                                                        'rgba(44, 210, 86, 1)', //17
                                                        'rgba(44, 210, 86, 1)', //18
                                                        'rgba(44, 210, 86, 1)', //19
                                                        'rgba(44, 210, 86, 1)', //20
                                                        'rgba(44, 210, 86, 1)', //21
                                                        'rgba(44, 210, 86, 1)', //22
                                                        'rgba(44, 210, 86, 1)', //23
                                                        'rgba(44, 210, 86, 1)', //24
                                                        'rgba(44, 210, 86, 1)', //25
                                                        'rgba(44, 210, 86, 1)', //26
                                                        'rgba(44, 210, 86, 1)', //27
                                                        'rgba(44, 210, 86, 1)', //28
                                                        'rgba(44, 210, 86, 1)', //29
                                                        'rgba(44, 210, 86, 1)', //30
                                                        'rgba(44, 210, 86, 1)' //31
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- AGOSTO -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agosto">
                        Agosto
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="agosto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agosto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartagosto" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartagosto').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Agosto',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($agosto as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(44, 210, 135, 0.4)', //1
                                                        'rgba(44, 210, 135, 0.4)', //2
                                                        'rgba(44, 210, 135, 0.4)', //3
                                                        'rgba(44, 210, 135, 0.4)', //4
                                                        'rgba(44, 210, 135, 0.4)', //5
                                                        'rgba(44, 210, 135, 0.4)', //6
                                                        'rgba(44, 210, 135, 0.4)', //7
                                                        'rgba(44, 210, 135, 0.4)', //8
                                                        'rgba(44, 210, 135, 0.4)', //9
                                                        'rgba(44, 210, 135, 0.4)', //10
                                                        'rgba(44, 210, 135, 0.4)', //11
                                                        'rgba(44, 210, 135, 0.4)', //12
                                                        'rgba(44, 210, 135, 0.4)', //13
                                                        'rgba(44, 210, 135, 0.4)', //14
                                                        'rgba(44, 210, 135, 0.4)', //15
                                                        'rgba(44, 210, 135, 0.4)', //16
                                                        'rgba(44, 210, 135, 0.4)', //17
                                                        'rgba(44, 210, 135, 0.4)', //18
                                                        'rgba(44, 210, 135, 0.4)', //19
                                                        'rgba(44, 210, 135, 0.4)', //20
                                                        'rgba(44, 210, 135, 0.4)', //21
                                                        'rgba(44, 210, 135, 0.4)', //22
                                                        'rgba(44, 210, 135, 0.4)', //23
                                                        'rgba(44, 210, 135, 0.4)', //24
                                                        'rgba(44, 210, 135, 0.4)', //25
                                                        'rgba(44, 210, 135, 0.4)', //26
                                                        'rgba(44, 210, 135, 0.4)', //27
                                                        'rgba(44, 210, 135, 0.4)', //28
                                                        'rgba(44, 210, 135, 0.4)', //29
                                                        'rgba(44, 210, 135, 0.4)', //30
                                                        'rgba(44, 210, 135, 0.4)' //31
                                                    ],
                                                    borderColor: [
                                                        'rgba(44, 210, 135, 1)', //1
                                                        'rgba(44, 210, 135, 1)', //2
                                                        'rgba(44, 210, 135, 1)', //3
                                                        'rgba(44, 210, 135, 1)', //4
                                                        'rgba(44, 210, 135, 1)', //5
                                                        'rgba(44, 210, 135, 1)', //6
                                                        'rgba(44, 210, 135, 1)', //7
                                                        'rgba(44, 210, 135, 1)', //8
                                                        'rgba(44, 210, 135, 1)', //9
                                                        'rgba(44, 210, 135, 1)', //10
                                                        'rgba(44, 210, 135, 1)', //11
                                                        'rgba(44, 210, 135, 1)', //12
                                                        'rgba(44, 210, 135, 1)', //13
                                                        'rgba(44, 210, 135, 1)', //14
                                                        'rgba(44, 210, 135, 1)', //15
                                                        'rgba(44, 210, 135, 1)', //16
                                                        'rgba(44, 210, 135, 1)', //17
                                                        'rgba(44, 210, 135, 1)', //18
                                                        'rgba(44, 210, 135, 1)', //19
                                                        'rgba(44, 210, 135, 1)', //20
                                                        'rgba(44, 210, 135, 1)', //21
                                                        'rgba(44, 210, 135, 1)', //22
                                                        'rgba(44, 210, 135, 1)', //23
                                                        'rgba(44, 210, 135, 1)', //24
                                                        'rgba(44, 210, 135, 1)', //25
                                                        'rgba(44, 210, 135, 1)', //26
                                                        'rgba(44, 210, 135, 1)', //27
                                                        'rgba(44, 210, 135, 1)', //28
                                                        'rgba(44, 210, 135, 1)', //29
                                                        'rgba(44, 210, 135, 1)', //30
                                                        'rgba(44, 210, 135, 1)' //31
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEPTIEMBRE -->
                <div class="col-sm bg-primary">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#septiembre">
                        Septiembre
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="septiembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Septiembre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartseptiembre" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartseptiembre').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
                                                datasets: [{
                                                    label: 'Consumo de Septiembre',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($septiembre as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(44, 185, 210, 0.4)', //1
                                                        'rgba(44, 185, 210, 0.4)', //2
                                                        'rgba(44, 185, 210, 0.4)', //3
                                                        'rgba(44, 185, 210, 0.4)', //4
                                                        'rgba(44, 185, 210, 0.4)', //5
                                                        'rgba(44, 185, 210, 0.4)', //6
                                                        'rgba(44, 185, 210, 0.4)', //7
                                                        'rgba(44, 185, 210, 0.4)', //8
                                                        'rgba(44, 185, 210, 0.4)', //9
                                                        'rgba(44, 185, 210, 0.4)', //10
                                                        'rgba(44, 185, 210, 0.4)', //11
                                                        'rgba(44, 185, 210, 0.4)', //12
                                                        'rgba(44, 185, 210, 0.4)', //13
                                                        'rgba(44, 185, 210, 0.4)', //14
                                                        'rgba(44, 185, 210, 0.4)', //15
                                                        'rgba(44, 185, 210, 0.4)', //16
                                                        'rgba(44, 185, 210, 0.4)', //17
                                                        'rgba(44, 185, 210, 0.4)', //18
                                                        'rgba(44, 185, 210, 0.4)', //19
                                                        'rgba(44, 185, 210, 0.4)', //20
                                                        'rgba(44, 185, 210, 0.4)', //21
                                                        'rgba(44, 185, 210, 0.4)', //22
                                                        'rgba(44, 185, 210, 0.4)', //23
                                                        'rgba(44, 185, 210, 0.4)', //24
                                                        'rgba(44, 185, 210, 0.4)', //25
                                                        'rgba(44, 185, 210, 0.4)', //26
                                                        'rgba(44, 185, 210, 0.4)', //27
                                                        'rgba(44, 185, 210, 0.4)', //28
                                                        'rgba(44, 185, 210, 0.4)', //29
                                                        'rgba(44, 185, 210, 0.4)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(44, 185, 210, 1)', //1
                                                        'rgba(44, 185, 210, 1)', //2
                                                        'rgba(44, 185, 210, 1)', //3
                                                        'rgba(44, 185, 210, 1)', //4
                                                        'rgba(44, 185, 210, 1)', //5
                                                        'rgba(44, 185, 210, 1)', //6
                                                        'rgba(44, 185, 210, 1)', //7
                                                        'rgba(44, 185, 210, 1)', //8
                                                        'rgba(44, 185, 210, 1)', //9
                                                        'rgba(44, 185, 210, 1)', //10
                                                        'rgba(44, 185, 210, 1)', //11
                                                        'rgba(44, 185, 210, 1)', //12
                                                        'rgba(44, 185, 210, 1)', //13
                                                        'rgba(44, 185, 210, 1)', //14
                                                        'rgba(44, 185, 210, 1)', //15
                                                        'rgba(44, 185, 210, 1)', //16
                                                        'rgba(44, 185, 210, 1)', //17
                                                        'rgba(44, 185, 210, 1)', //18
                                                        'rgba(44, 185, 210, 1)', //19
                                                        'rgba(44, 185, 210, 1)', //20
                                                        'rgba(44, 185, 210, 1)', //21
                                                        'rgba(44, 185, 210, 1)', //22
                                                        'rgba(44, 185, 210, 1)', //23
                                                        'rgba(44, 185, 210, 1)', //24
                                                        'rgba(44, 185, 210, 1)', //25
                                                        'rgba(44, 185, 210, 1)', //26
                                                        'rgba(44, 185, 210, 1)', //27
                                                        'rgba(44, 185, 210, 1)', //28
                                                        'rgba(44, 185, 210, 1)', //29
                                                        'rgba(44, 185, 210, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- OCTUBRE -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#octubre">
                        Octubre
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="octubre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Octubre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartoctubre" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartoctubre').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Octubre',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($octubre as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(44, 135, 210, 0.4)', //1
                                                        'rgba(44, 135, 210, 0.4)', //2
                                                        'rgba(44, 135, 210, 0.4)', //3
                                                        'rgba(44, 135, 210, 0.4)', //4
                                                        'rgba(44, 135, 210, 0.4)', //5
                                                        'rgba(44, 135, 210, 0.4)', //6
                                                        'rgba(44, 135, 210, 0.4)', //7
                                                        'rgba(44, 135, 210, 0.4)', //8
                                                        'rgba(44, 135, 210, 0.4)', //9
                                                        'rgba(44, 135, 210, 0.4)', //10
                                                        'rgba(44, 135, 210, 0.4)', //11
                                                        'rgba(44, 135, 210, 0.4)', //12
                                                        'rgba(44, 135, 210, 0.4)', //13
                                                        'rgba(44, 135, 210, 0.4)', //14
                                                        'rgba(44, 135, 210, 0.4)', //15
                                                        'rgba(44, 135, 210, 0.4)', //16
                                                        'rgba(44, 135, 210, 0.4)', //17
                                                        'rgba(44, 135, 210, 0.4)', //18
                                                        'rgba(44, 135, 210, 0.4)', //19
                                                        'rgba(44, 135, 210, 0.4)', //20
                                                        'rgba(44, 135, 210, 0.4)', //21
                                                        'rgba(44, 135, 210, 0.4)', //22
                                                        'rgba(44, 135, 210, 0.4)', //23
                                                        'rgba(44, 135, 210, 0.4)', //24
                                                        'rgba(44, 135, 210, 0.4)', //25
                                                        'rgba(44, 135, 210, 0.4)', //26
                                                        'rgba(44, 135, 210, 0.4)', //27
                                                        'rgba(44, 135, 210, 0.4)', //28
                                                        'rgba(44, 135, 210, 0.4)', //29
                                                        'rgba(44, 135, 210, 0.4)', //30
                                                        'rgba(44, 135, 210, 0.4)' //31
                                                    ],
                                                    borderColor: [
                                                        'rgba(44, 135, 210, 1)', //1
                                                        'rgba(44, 135, 210, 1)', //2
                                                        'rgba(44, 135, 210, 1)', //3
                                                        'rgba(44, 135, 210, 1)', //4
                                                        'rgba(44, 135, 210, 1)', //5
                                                        'rgba(44, 135, 210, 1)', //6
                                                        'rgba(44, 135, 210, 1)', //7
                                                        'rgba(44, 135, 210, 1)', //8
                                                        'rgba(44, 135, 210, 1)', //9
                                                        'rgba(44, 135, 210, 1)', //10
                                                        'rgba(44, 135, 210, 1)', //11
                                                        'rgba(44, 135, 210, 1)', //12
                                                        'rgba(44, 135, 210, 1)', //13
                                                        'rgba(44, 135, 210, 1)', //14
                                                        'rgba(44, 135, 210, 1)', //15
                                                        'rgba(44, 135, 210, 1)', //16
                                                        'rgba(44, 135, 210, 1)', //17
                                                        'rgba(44, 135, 210, 1)', //18
                                                        'rgba(44, 135, 210, 1)', //19
                                                        'rgba(44, 135, 210, 1)', //20
                                                        'rgba(44, 135, 210, 1)', //21
                                                        'rgba(44, 135, 210, 1)', //22
                                                        'rgba(44, 135, 210, 1)', //23
                                                        'rgba(44, 135, 210, 1)', //24
                                                        'rgba(44, 135, 210, 1)', //25
                                                        'rgba(44, 135, 210, 1)', //26
                                                        'rgba(44, 135, 210, 1)', //27
                                                        'rgba(44, 135, 210, 1)', //28
                                                        'rgba(44, 135, 210, 1)', //29
                                                        'rgba(44, 135, 210, 1)', //30
                                                        'rgba(44, 135, 210, 1)' //31
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NOVIEMBRE -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noviembre">
                        Noviembre
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="noviembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Noviembre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartnoviembre" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartnoviembre').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
                                                datasets: [{
                                                    label: 'Consumo de Noviembre',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($noviembre as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(44, 86, 210, 0.4)', //1
                                                        'rgba(44, 86, 210, 0.4)', //2
                                                        'rgba(44, 86, 210, 0.4)', //3
                                                        'rgba(44, 86, 210, 0.4)', //4
                                                        'rgba(44, 86, 210, 0.4)', //5
                                                        'rgba(44, 86, 210, 0.4)', //6
                                                        'rgba(44, 86, 210, 0.4)', //7
                                                        'rgba(44, 86, 210, 0.4)', //8
                                                        'rgba(44, 86, 210, 0.4)', //9
                                                        'rgba(44, 86, 210, 0.4)', //10
                                                        'rgba(44, 86, 210, 0.4)', //11
                                                        'rgba(44, 86, 210, 0.4)', //12
                                                        'rgba(44, 86, 210, 0.4)', //13
                                                        'rgba(44, 86, 210, 0.4)', //14
                                                        'rgba(44, 86, 210, 0.4)', //15
                                                        'rgba(44, 86, 210, 0.4)', //16
                                                        'rgba(44, 86, 210, 0.4)', //17
                                                        'rgba(44, 86, 210, 0.4)', //18
                                                        'rgba(44, 86, 210, 0.4)', //19
                                                        'rgba(44, 86, 210, 0.4)', //20
                                                        'rgba(44, 86, 210, 0.4)', //21
                                                        'rgba(44, 86, 210, 0.4)', //22
                                                        'rgba(44, 86, 210, 0.4)', //23
                                                        'rgba(44, 86, 210, 0.4)', //24
                                                        'rgba(44, 86, 210, 0.4)', //25
                                                        'rgba(44, 86, 210, 0.4)', //26
                                                        'rgba(44, 86, 210, 0.4)', //27
                                                        'rgba(44, 86, 210, 0.4)', //28
                                                        'rgba(44, 86, 210, 0.4)', //29
                                                        'rgba(44, 86, 210, 0.4)' //30
                                                    ],
                                                    borderColor: [
                                                        'rgba(44, 86, 210, 1)', //1
                                                        'rgba(44, 86, 210, 1)', //2
                                                        'rgba(44, 86, 210, 1)', //3
                                                        'rgba(44, 86, 210, 1)', //4
                                                        'rgba(44, 86, 210, 1)', //5
                                                        'rgba(44, 86, 210, 1)', //6
                                                        'rgba(44, 86, 210, 1)', //7
                                                        'rgba(44, 86, 210, 1)', //8
                                                        'rgba(44, 86, 210, 1)', //9
                                                        'rgba(44, 86, 210, 1)', //10
                                                        'rgba(44, 86, 210, 1)', //11
                                                        'rgba(44, 86, 210, 1)', //12
                                                        'rgba(44, 86, 210, 1)', //13
                                                        'rgba(44, 86, 210, 1)', //14
                                                        'rgba(44, 86, 210, 1)', //15
                                                        'rgba(44, 86, 210, 1)', //16
                                                        'rgba(44, 86, 210, 1)', //17
                                                        'rgba(44, 86, 210, 1)', //18
                                                        'rgba(44, 86, 210, 1)', //19
                                                        'rgba(44, 86, 210, 1)', //20
                                                        'rgba(44, 86, 210, 1)', //21
                                                        'rgba(44, 86, 210, 1)', //22
                                                        'rgba(44, 86, 210, 1)', //23
                                                        'rgba(44, 86, 210, 1)', //24
                                                        'rgba(44, 86, 210, 1)', //25
                                                        'rgba(44, 86, 210, 1)', //26
                                                        'rgba(44, 86, 210, 1)', //27
                                                        'rgba(44, 86, 210, 1)', //28
                                                        'rgba(44, 86, 210, 1)', //29
                                                        'rgba(44, 86, 210, 1)' //30
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DICIEMBRE -->
                <div class="col-sm bg-primary">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#diciembre">
                        Diciembre
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="diciembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Diciembre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <canvas id="myChartdiciembre" width="800" height="400">
                                    </canvas>

                                    <script>
                                        var ctx = document.getElementById('myChartdiciembre').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                                                datasets: [{
                                                    label: 'Consumo de Diciembre',
                                                    //data: [12, 19, 3, 5, 2, 3, ],
                                                    data: [
                                                        <?php foreach ($diciembre as $key) {
                                                            echo $key . ",";
                                                        } ?>
                                                    ],
                                                    backgroundColor: [
                                                        'rgba(52, 44, 210, 0.4)', //1
                                                        'rgba(52, 44, 210, 0.4)', //2
                                                        'rgba(52, 44, 210, 0.4)', //3
                                                        'rgba(52, 44, 210, 0.4)', //4
                                                        'rgba(52, 44, 210, 0.4)', //5
                                                        'rgba(52, 44, 210, 0.4)', //6
                                                        'rgba(52, 44, 210, 0.4)', //7
                                                        'rgba(52, 44, 210, 0.4)', //8
                                                        'rgba(52, 44, 210, 0.4)', //9
                                                        'rgba(52, 44, 210, 0.4)', //10
                                                        'rgba(52, 44, 210, 0.4)', //11
                                                        'rgba(52, 44, 210, 0.4)', //12
                                                        'rgba(52, 44, 210, 0.4)', //13
                                                        'rgba(52, 44, 210, 0.4)', //14
                                                        'rgba(52, 44, 210, 0.4)', //15
                                                        'rgba(52, 44, 210, 0.4)', //16
                                                        'rgba(52, 44, 210, 0.4)', //17
                                                        'rgba(52, 44, 210, 0.4)', //18
                                                        'rgba(52, 44, 210, 0.4)', //19
                                                        'rgba(52, 44, 210, 0.4)', //20
                                                        'rgba(52, 44, 210, 0.4)', //21
                                                        'rgba(52, 44, 210, 0.4)', //22
                                                        'rgba(52, 44, 210, 0.4)', //23
                                                        'rgba(52, 44, 210, 0.4)', //24
                                                        'rgba(52, 44, 210, 0.4)', //25
                                                        'rgba(52, 44, 210, 0.4)', //26
                                                        'rgba(52, 44, 210, 0.4)', //27
                                                        'rgba(52, 44, 210, 0.4)', //28
                                                        'rgba(52, 44, 210, 0.4)', //29
                                                        'rgba(52, 44, 210, 0.4)', //30
                                                        'rgba(52, 44, 210, 0.4)' //31
                                                    ],
                                                    borderColor: [
                                                        'rgba(52, 44, 210, 1)', //1
                                                        'rgba(52, 44, 210, 1)', //2
                                                        'rgba(52, 44, 210, 1)', //3
                                                        'rgba(52, 44, 210, 1)', //4
                                                        'rgba(52, 44, 210, 1)', //5
                                                        'rgba(52, 44, 210, 1)', //6
                                                        'rgba(52, 44, 210, 1)', //7
                                                        'rgba(52, 44, 210, 1)', //8
                                                        'rgba(52, 44, 210, 1)', //9
                                                        'rgba(52, 44, 210, 1)', //10
                                                        'rgba(52, 44, 210, 1)', //11
                                                        'rgba(52, 44, 210, 1)', //12
                                                        'rgba(52, 44, 210, 1)', //13
                                                        'rgba(52, 44, 210, 1)', //14
                                                        'rgba(52, 44, 210, 1)', //15
                                                        'rgba(52, 44, 210, 1)', //16
                                                        'rgba(52, 44, 210, 1)', //17
                                                        'rgba(52, 44, 210, 1)', //18
                                                        'rgba(52, 44, 210, 1)', //19
                                                        'rgba(52, 44, 210, 1)', //20
                                                        'rgba(52, 44, 210, 1)', //21
                                                        'rgba(52, 44, 210, 1)', //22
                                                        'rgba(52, 44, 210, 1)', //23
                                                        'rgba(52, 44, 210, 1)', //24
                                                        'rgba(52, 44, 210, 1)', //25
                                                        'rgba(52, 44, 210, 1)', //26
                                                        'rgba(52, 44, 210, 1)', //27
                                                        'rgba(52, 44, 210, 1)', //28
                                                        'rgba(52, 44, 210, 1)', //29
                                                        'rgba(52, 44, 210, 1)', //30
                                                        'rgba(52, 44, 210, 1)' //31
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <hr>
        <div class="container consumo-carrier">
            <div class="row text-left">
                <h5 class="h5">Datos del día <?php echo $date; ?></h5>
            </div>
            <!-- IPCOM -->
            <div class="row row-carrier">
                <div class="col-sm-4">
                    <h2>Consumo Ipcom</h2>
                    <h5>Vicis con consumo</h5>
                    <div class="fakeimg d-grid gap-2">
                        <?php foreach ($reportes as $key_mtel) { ?>
                            <a class="btn btn-primary btn-sm" target="_blank" role="button" href="./consumo_por_reportes/consumo_por_reporte.php?fecha_inicio=<?php echo "{$date}"; ?>&&fecha_fin=<?php echo "{$date}"; ?>&&carrier=<?php echo "{$ipcom}"; ?>&&reporte=<?php echo "{$key_mtel}"; ?>">
                                <?php echo $key_mtel ?>
                            </a>
                        <?php }  ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Distribución de consumo</h2>
                    <h5 class="h5">Consumo día anterior</h5>
                    <div class="fakeimg">
                        <canvas id="myChart_ipcom" width="740" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_ipcom').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Movil', 'Fijo', 'D-Movil', 'D-Fijo', 'B-Movil', 'B-Fijo'],
                                    datasets: [{
                                        label: 'IPCOM',
                                        //data: [12, 19, 3, 5, 2, 3, ],
                                        data: [
                                            <?php echo $movil_ipcom . "," . $fijo_ipcom . "," . $dropM_ipcom . "," . $dropF_ipcom . "," . $buzonM_ipcom . "," . $buzonF_ipcom ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(11, 83, 148, 0.4)',
                                            'rgba(11, 83, 148, 0.4)',
                                            'rgba(11, 83, 148, 0.4)',
                                            'rgba(11, 83, 148, 0.4)',
                                            'rgba(11, 83, 148, 0.4)',
                                            'rgba(11, 83, 148, 0.4)'
                                        ],
                                        borderColor: [
                                            'rgba(11, 83, 148, 1)',
                                            'rgba(11, 83, 148, 1)',
                                            'rgba(11, 83, 148, 1)',
                                            'rgba(11, 83, 148, 1)',
                                            'rgba(11, 83, 148, 1)',
                                            'rgba(11, 83, 148, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <!-- MARCATEL -->
            <div class="row row-carrier">
                <div class="col-sm-4">
                    <h2>Consumo Marcatel</h2>
                    <h5>Vicis con consumo</h5>
                    <div class="fakeimg d-grid gap-2">
                        <?php foreach ($reportes_mtel as $key) { ?>
                            <a class="btn btn-primary btn-sm" target="_blank" role="button" href="./consumo_por_reportes/consumo_por_reporte.php?fecha_inicio=<?php echo "{$date}"; ?>&&fecha_fin=<?php echo "{$date}"; ?>&&carrier=<?php echo "{$marcatel}"; ?>&&reporte=<?php echo "{$key}"; ?>">
                                <?php echo $key ?>
                            </a>
                        <?php }  ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Distribución de consumo</h2>
                    <h5 class="h5">Consumo día anterior</h5>
                    <div class="fakeimg">
                        <canvas id="myChart_marcatel" width="740" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_marcatel').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Movil', 'Fijo', 'D-Movil', 'D-Fijo', 'B-Movil', 'B-Fijo'],
                                    datasets: [{
                                        label: 'MARCATEL',
                                        //data: [12, 19, 3, 5, 2, 3, ],
                                        data: [
                                            <?php echo $movil_marcatel . "," . $fijo_marcatel . "," . $dropM_marcatel . "," . $dropF_marcatel . "," . $buzonM_marcatel . "," . $buzonF_marcatel ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(48, 25, 109, 0.4)',
                                            'rgba(48, 25, 109, 0.4)',
                                            'rgba(48, 25, 109, 0.4)',
                                            'rgba(48, 25, 109, 0.4)',
                                            'rgba(48, 25, 109, 0.4)',
                                            'rgba(48, 25, 109, 0.4)'
                                        ],
                                        borderColor: [
                                            'rgba(48, 25, 109, 1)',
                                            'rgba(48, 25, 109, 1)',
                                            'rgba(48, 25, 109, 1)',
                                            'rgba(48, 25, 109, 1)',
                                            'rgba(48, 25, 109, 1)',
                                            'rgba(48, 25, 109, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <!-- MCM -->
            <div class="row row-carrier">
                <div class="col-sm-4">
                    <h2>Consumo MCM</h2>
                    <h5>Vicis con consumo</h5>
                    <div class="fakeimg d-grid gap-2">
                        <?php foreach ($reportes_MCM as $key) { ?>
                            <a class="btn btn-primary btn-sm" target="_blank" role="button" href="./consumo_por_reportes/consumo_por_reporte.php?fecha_inicio=<?php echo "{$date}"; ?>&&fecha_fin=<?php echo "{$date}"; ?>&&carrier=<?php echo "{$mcm}"; ?>&&reporte=<?php echo "{$key}"; ?>">
                                <?php echo $key ?>
                            </a>
                        <?php }  ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Distribución de consumo</h2>
                    <h5 class="h5">Consumo día anterior</h5>
                    <div class="fakeimg">
                        <canvas id="myChart_mcm" width="740" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_mcm').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Movil', 'Fijo', 'D-Movil', 'D-Fijo', 'B-Movil', 'B-Fijo'],
                                    datasets: [{
                                        label: 'MCM',
                                        //data: [12, 19, 3, 5, 2, 3, ],
                                        data: [
                                            <?php echo $movil_mcm . "," . $fijo_mcm . "," . $dropM_mcm . "," . $dropF_mcm . "," . $buzonM_mcm . "," . $buzonF_mcm ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(116, 159, 97, 0.4)',
                                            'rgba(116, 159, 97, 0.4)',
                                            'rgba(116, 159, 97, 0.4)',
                                            'rgba(116, 159, 97, 0.4)',
                                            'rgba(116, 159, 97, 0.4)',
                                            'rgba(116, 159, 97, 0.4)'
                                        ],
                                        borderColor: [
                                            'rgba(116, 159, 97, 1)',
                                            'rgba(116, 159, 97, 1)',
                                            'rgba(116, 159, 97, 1)',
                                            'rgba(116, 159, 97, 1)',
                                            'rgba(116, 159, 97, 1)',
                                            'rgba(116, 159, 97, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <!-- HAZZ -->
            <div class="row row-carrier">
                <div class="col-sm-4">
                    <h2>Consumo HAZ</h2>
                    <h5>Vicis con consumo</h5>
                    <div class="fakeimg d-grid gap-2">
                        <?php foreach ($reportes_HAZZ as $key) { ?>
                            <a class="btn btn-primary btn-sm" target="_blank" role="button" href="./consumo_por_reportes/consumo_por_reporte.php?fecha_inicio=<?php echo "{$date}"; ?>&&fecha_fin=<?php echo "{$date}"; ?>&&carrier=<?php echo "{$hazz}"; ?>&&reporte=<?php echo "{$key}"; ?>">
                                <?php echo $key ?>
                            </a>
                        <?php }  ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Distribución de consumo</h2>
                    <h5 class="h5">Consumo día anterior</h5>
                    <div class="fakeimg">
                        <canvas id="myChart_hazz" width="750" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart_hazz').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Movil', 'Fijo', 'D-Movil', 'D-Fijo', 'B-Movil', 'B-Fijo'],
                                    datasets: [{
                                        label: 'HAZ',
                                        //data: [12, 19, 3, 5, 2, 3, ],
                                        data: [
                                            <?php echo $movil_hazz . "," . $fijo_hazz . "," . $dropM_hazz . "," . $dropF_hazz . "," . $buzonM_hazz . "," . $buzonF_hazz ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(168, 38, 38, 0.4)',
                                            'rgba(168, 38, 38, 0.4)',
                                            'rgba(168, 38, 38, 0.4)',
                                            'rgba(168, 38, 38, 0.4)',
                                            'rgba(168, 38, 38, 0.4)',
                                            'rgba(168, 38, 38, 0.4)'
                                        ],
                                        borderColor: [
                                            'rgba(168, 38, 38, 1)',
                                            'rgba(168, 38, 38, 1)',
                                            'rgba(168, 38, 38, 1)',
                                            'rgba(168, 38, 38, 1)',
                                            'rgba(168, 38, 38, 1)',
                                            'rgba(168, 38, 38, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer class="jumbotron text-center bg-dark" style="margin-bottom:0">
            <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolor dicta cum, aspernatur aliquid doloremque corrupti, iure enim doloribus ipsum sequi unde consectetur non voluptatem magni sapiente. Laboriosam, molestias rerum?</p>
        </footer>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>


</html>