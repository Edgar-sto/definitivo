<?php

class searchCampania {
    public $conexion;
    public $fecha_inicio;
    public $fecha_termino;
    public $prefix;
    public $valuereporte;
 
    function __construct($conexion,$fecha_inicio,$fecha_termino,$prefix,$valuereporte)
    {   
        $this->conexion  =  $conexion;
        $this->f_inicio  =  $fecha_inicio;
        $this->f_termino =  $fecha_termino;
        $this->prefijo   =  $prefix;
        $this->reporte   =  $valuereporte;
    }

    function busquedaCamapania(){
        $query_campania="SELECT DISTINCT campania FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND reporte='{$this->reporte}' AND prefijo IN ('$this->prefijo')";

        $resultado_campania=$this->conexion->query($query_campania);
        $array_campania=array();
        while ($row_camp = $resultado_campania->fetch_object()) {
            
            array_push($array_campania,$row_camp->campania);

        }
        return $array_campania;
    }
}