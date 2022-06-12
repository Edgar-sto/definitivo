<?php
require 'conexion.php';
class sucursal
{ 
    public $conexion_;
    public $grupo_;

    function __construct($conexion, $dato_a_comparar)
    {
        $this->conexion=$conexion;
        $this->comparacion=$dato_a_comparar;
        
    }

    function obtSucursal()
    {
        $query_obt_sucursal="SELECT sucursal,campania FROM sucu_campa_grup
        WHERE nombre_grupo='{$this->comparacion}' GROUP BY sucursal,campania;";
        $array_sucursal=array();
        $resul_query =$this->conexion->query($query_obt_sucursal);

        while ($row_sucursal=$resul_query->fetch_object()) {
            array_push($array_sucursal,$row_sucursal->sucursal,$row_sucursal->campania);
            $z = implode(" ",$array_sucursal);
        }
        return $z;
    }

    function obtSucursalVici()
    {
        $query_obt_sucursal="SELECT sucursal,campania FROM sucu_campa_grup
        WHERE vici='10.9.2.{$this->comparacion}' GROUP BY sucursal,campania;";
        $array_sucursal=array();
        $resul_query =$this->conexion->query($query_obt_sucursal);

        while ($row=$resul_query->fetch_object()) {
           $z = $row->campania;
           $q = $row->sucursal;
          //  array_push($array_sucursal,$row->campania,$row->sucursal);
            //$z = implode(" ",$array_sucursal);
        }
        //return $z;
    }
}
date_default_timezone_set('America/Mexico_City');
$date="2022-05-24";
// $date = new DateTime();
// $date->sub(new DateInterval('P1D'));
// $date     =   $date->format('Y-m-d'); //Datos a guardar date('Y-m-d')
if ($date) {
    //echo $date;
} else { // format failed
    echo "Unknown Time";
}

$conexion = conexion_fedora('telefonia', '10.9.2.234','3dg4rm4n','secretosdenegus');
$prefijos    =   array("15','777"/*,"11','999","28','444","14','555"*/);
//$conexionlocal = conexion_db('telefonia', 'localhost');
echo "Busqueda del dia $date ";
echo "\n";

$insert_inicio="INSERT INTO `control_log_scripts` (`id_log`, `name_script`,`estatus`, `fecha`, `fecha_registro`)
VALUES (NULL, 'Total Resumen', 'Inicio', '{$date}', current_timestamp());";

if ($insert_inicio =   mysqli_query($conexion, $insert_inicio)) {
    echo " |-Log de inicio Guardado exitosamente";
    echo "\n";
} else {
    echo " |-No se pudo guardar log";
    echo "\n";
}




$servidores = array("5","6","8", "9", "11", "15","22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48","57","60", "201");
$tamanio_servidores = count($servidores);
for ($x = 0; $x < $tamanio_servidores; $x++) {
    $reporte = $servidores[$x]; //Dato a guardar
    echo "|----Reporte $reporte \n";
    echo "\n";
    foreach ($prefijos as $value) {
        
        $obtener_consumo_resumen_dos = "SELECT DISTINCT a.prefijo, a.campania, a.grupo, SUM(consumo) AS Total,
        (CASE WHEN tipo = 'movil' THEN 'Movil'
        WHEN tipo = 'drop_movil'  THEN 'Drop Movil'
        WHEN tipo = 'buzon_movil'  THEN 'Buzon Movil'
        WHEN tipo = 'fijo'  THEN 'Fijo'
        WHEN tipo = 'drop_fijo'  THEN 'Drop Fijo'
        WHEN tipo = 'buzon_fijo'  THEN 'Buzon Fijo'
        END ) AS Tipo
        FROM reporte_telefonia a
        WHERE prefijo IN ('{$value}')
        AND fecha_inicio>='{$date} 00:00:00'
        AND fecha_termino<='{$date} 23:59:59'
        AND reporte='10.9.2.{$reporte}'
        GROUP BY prefijo, campania, grupo, tipo,reporte
        ORDER BY prefijo,campania,grupo ASC;";
        $answer_resumen_dos = $conexion->query($obtener_consumo_resumen_dos);
        while ($row = $answer_resumen_dos->fetch_object()) {
            $row->prefijo;
            $row->campania;
            $row->grupo;
            $row->Total;
            $row->Tipo;

            switch ($row->Tipo) {
                case 'Movil':
                $group = new sucursal($conexion,$row->grupo);
                $y = $group->obtSucursal();
                
                break;

                case 'Fijo':
                $group = new sucursal($conexion,$row->grupo);
                $y=$group->obtSucursal();
                // foreach ($group->obtSucursal() as $sucursalValue) {
                //   $y = $sucursalValue." ";
                // }
                break;

                case 'Drop Movil':
                $y = "DROP MOVIL";
                break;

                case 'Drop Fijo':
                $y = "DROP FIJO";
                break;
            
                case 'Buzon Movil':
                $y = "BUZON MOVIL";
                break;

                case 'Buzon Fijo':
                $y = "BUZON FIJO";
                break;
            }

            //echo "10.9.2.". {$reporte ."  ".  $row->prefijo ."  ".  $row->campania  ."  ". $y ."  ". $row->grupo ."  ". $row->Total ."       ". $row->Tipo;
            //echo "\n";

            $insertar   =   "INSERT INTO `reporte_telefonia_resumendos` (`id`, `reporte`, `prefijo`, `id_campania`, `sucursal_cliente_campania`, `grupo`, `consumo`, `tipo`, `fecha_inicio`, `fecha_termino`, `fecha_registro`)
            VALUES (NULL, '10.9.2.{$reporte}', '{$row->prefijo}', '{$row->campania}', '{$y}', '{$row->grupo}', '{$row->Total}', '{$row->Tipo}', '{$date} 00:00:00', '{$date} 23:59:59', CURRENT_TIMESTAMP);";
            if ($insertar_ = mysqli_query($conexion, $insertar)) {
                echo "|------Record saved successfully";
                echo "\n";
            } else {
                echo "|------El registro de la fecha {$date} del Reporte {$reporte} no se guardo en la Base";
                echo "\n";
            }
        }
    }
}




$insert_fin="INSERT INTO `control_log_scripts` (`id_log`, `name_script`,`estatus`, `fecha`, `fecha_registro`)
VALUES (NULL, 'Total Resumen', 'Termino', '{$date}', current_timestamp());";

if ($insert_fin =   mysqli_query($conexion, $insert_fin)) {
    echo " |-Log de finalizacion Guardado exitosamente.";
    echo "\n";
} else {
    echo " |-No se pudo guardar log de finilización.";
    echo "\n";
}