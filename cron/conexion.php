<?php
function conexion_db ($nombre_base,$servidor){
    date_default_timezone_set ('America/Mexico_City');
    $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
    $user       =   "root";
    $password   =   "";
    $conection  =   new mysqli($servidor,$user,$password,$nombre_base);
    if ($conection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conection -> connect_error;
        exit();
    }
    return $conection;
}

function conexion_tel_21 ($nombre_base,$servidor){
    date_default_timezone_set ('America/Mexico_City');
    $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
    $user       =   "root";
    $password   =   "@l**pbx++t3l3";
    $conection  =   new mysqli($servidor,$user,$password,$nombre_base);
    if ($conection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conection -> connect_error;
        exit();
    }
    return $conection;
}

function conexion_fedora ($nombre_base,$servidor,$user,$password){
    date_default_timezone_set ('America/Mexico_City');
    $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
    // $user       =   "";
    // $password   =   "";
    $conection  =   new mysqli($servidor,$user,$password,$nombre_base);
    if ($conection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conection -> connect_error;
        exit();
    }
    return $conection;
}






?>