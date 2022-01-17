<?php
//hola
 class searchReporte {
     public $conexion;
     public $prefix;
     public $fecha_inicio;
     public $fecha_termino;

    function __construct($conexion,$prefix,$fecha_inicio,$fecha_termino)
    {
        $this->conexion      = $conexion;
        $this->prefix        = $prefix;
        $this->fecha_inicio  = $fecha_inicio;
        $this->fecha_termino = $fecha_termino;
    }

    function func_reporte()
    {
        $consulta="SELECT DISTINCT reporte FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->fecha_inicio} 00:00:00' and fecha_termino<='{$this->fecha_termino} 23:59:59'
        AND prefijo IN ('{$this->prefix}') ORDER BY reporte";

        $resultado = $this->conexion->query($consulta);

        $array_reporte=array();
        while ($row=$resultado -> fetch_object()) {
            array_push($array_reporte, $row->reporte);
        }
        return $array_reporte;

    }

 }