<?php
    require_once '../obtener/conexion.php';
    $conexionlocal = conexion_db ('telefonia','localhost');
    
    $consulta_marcatel   =   "SELECT SUM(`consumo_movil`) AS movil_marcatel,SUM(`consumo_fijo`) AS fijo_marcatel
    FROM consumo_telefonia_mf
    WHERE fecha_inicio>='2021-02-01 00:00:00' AND fecha_fin<='2021-02-21 23:59:59'
    AND prefijo IN ('9','777')";
    $res_consulta   =   mysqli_query($conexionlocal,$consulta_marcatel);
    while ($mos_consulta    =   mysqli_fetch_assoc($res_consulta)) {
        $movil_marcatel  =  $mos_consulta['movil_marcatel'];
        $fijo_marcatel   =  $mos_consulta['fijo_marcatel'];
        $total_mf_marcatel =   ($movil_marcatel + $fijo_marcatel);
    }
    $con_drop_marcatel   =   "SELECT SUM(`consumo_drop_movil`) AS drop_movil_marcatel,SUM(`consumo_drop_fijo`) AS drop_fijo_marcatel
	FROM consumo_telefonia_drop
	WHERE fecha_inicio>='2021-02-01 00:00:00' AND fecha_fin<='2021-02-21 23:59:59'
	AND prefijo IN ('9','777')";
    $res_consulta_drop   =   mysqli_query($conexionlocal,$con_drop_marcatel);
    while ($mos_con_drop    =   mysqli_fetch_assoc($res_consulta_drop)) {
        $drop_movil_marcatel  =  $mos_con_drop['drop_movil_marcatel'];
        $drop_fijo_marcatel   =  $mos_con_drop['drop_fijo_marcatel'];
        $total_drop_marcatel =   ($drop_movil_marcatel + $drop_fijo_marcatel);
    }
    $con_buzon_marcatel   =   "SELECT SUM(`consumo_buzon_movil`) AS buzon_movil_marcatel,SUM(`consumo_buzon_fijo`) AS buzon_fijo_marcatel
	FROM consumo_telefonia_buzon
	WHERE fecha_inicio>='2021-02-01 00:00:00' AND fecha_fin<='2021-02-21 23:59:59'
	AND prefijo IN ('9','777')";
    $res_consulta_buzon   =   mysqli_query($conexionlocal,$con_buzon_marcatel);
    while ($mos_con_buzon    =   mysqli_fetch_assoc($res_consulta_buzon)) {
        $buzon_movil_marcatel  =  $mos_con_buzon['buzon_movil_marcatel'];
        $buzon_fijo_marcatel   =  $mos_con_buzon['buzon_fijo_marcatel'];
        $total_buzon_marcatel =   ($buzon_movil_marcatel + $buzon_fijo_marcatel);
    }
    /*
    echo "$con_total_mcm ";
    echo "$con_total_hazz ";
    echo "$con_total_ipcom ";
    echo "$con_total_marcatel";
    */