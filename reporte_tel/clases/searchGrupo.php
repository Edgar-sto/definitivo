<?php

class searchGrupo {
    public $conexion;
    public $fecha_inicio;
    public $fecha_termino;
    public $prefix;
    public $valuereporte;
    public $valuecampania;

    function __construct($conexion,$fecha_inicio,$fecha_termino,$prefix,$valuereporte,$valuecampania)
    {
        $this->conexion     =   $conexion;
        $this->f_inicio     =   $fecha_inicio;
        $this->f_termino    =   $fecha_termino;
        $this->prefix       =   $prefix;
        $this->valuereporte =   $valuereporte;
        $this->valuecampania=   $valuecampania;
    }

    function busquedaGrupos(){
        $query_grupos="SELECT DISTINCT grupo FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefix}') AND reporte='{$this->valuereporte}' AND campania='{$this->valuecampania}'";

        $resultado_grupos = $this->conexion->query($query_grupos);
        $array_grupos=array();
        while ($row_grupo=$resultado_grupos->fetch_object()) {
            array_push($array_grupos,$row_grupo->grupo);
        }
        return $array_grupos;
    }
}