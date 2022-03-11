<?php

class searchConsumo
{

    public $conexion;
    public $fecha_inicio;
    public $fecha_termino;
    public $prefix;
    public $valuereporte;
    public $valuecampania;
    public $valuegrupos;

    function __construct($conexion, $fecha_inicio, $fecha_termino, $prefix, $valuereporte, $valuecampania, $valuegrupos)
    {
        $this->conexion         =   $conexion;
        $this->f_inicio         =   $fecha_inicio;
        $this->f_termino        =   $fecha_termino;
        $this->prefix           =   $prefix;
        $this->valuereporte     =   $valuereporte;
        $this->valuecampania    =   $valuecampania;
        $this->valuegrupos      =   $valuegrupos;
    }

    function consumoMovilFijo()
    {
        $query_movil_fijo = "SELECT
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS movil,
        
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS fijo";
        
        $resultado_mf=$this->conexion->query($query_movil_fijo);
        $array_mf=array();
        while($row_mf=$resultado_mf->fetch_object()){
            array_push($array_mf,$row_mf->movil,$row_mf->fijo);
        }
        return $array_mf;

    }

    function consumoDmovilDfijo()
    {
        $query_dmovil_dfijo = "SELECT 
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='drop_movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS drop_movil,

        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='drop_fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS drop_fijo";
        
        $resultado_DropMF=$this->conexion->query($query_dmovil_dfijo);
        $array_dropMF=array();
        while ($row_drop=$resultado_DropMF->fetch_object()) {
            array_push($array_dropMF,$row_drop->drop_movil,$row_drop->drop_fijo);
        }
        return $array_dropMF;
    }

    function consumoBmovilBfijo()
    {
        $query_Bmovil_bfijo ="SELECT 
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='buzon_movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS buzon_movil,

        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='buzon_fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}') AS buzon_fijo";
        
        $resultado_buzonMF=$this->conexion->query($query_Bmovil_bfijo);
        $array_buzonMF=array();
        while ($row_buzon=$resultado_buzonMF->fetch_object()) {
            array_push($array_buzonMF,$row_buzon->buzon_movil,$row_buzon->buzon_fijo);
        }
        return $array_buzonMF;
    }

    function consumoMovil()
    {
        $query_movil = "SELECT
        SUM(consumo) as movil FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_movil=$this->conexion->query($query_movil);
        $array_movil=array();
        while($row_movil=$resultado_movil->fetch_object()){
            array_push($array_movil,$row_movil->movil);
        }
        return $array_movil;

    }

    function consumoFijo()
    {
        $query_fijo = "SELECT
        SUM(consumo) as fijo FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_fijo=$this->conexion->query($query_fijo);
        $array_fijo=array();
        while($row_fijo=$resultado_fijo->fetch_object()){
            array_push($array_fijo,$row_fijo->fijo);
        }
        return $array_fijo;

    }

    function consumoDropMovil()
    {
        $query_drop_movil = "SELECT 
        SUM(consumo) AS drop_movil FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='drop_movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_DropMovil=$this->conexion->query($query_drop_movil);
        $array_dropMovil=array();
        while ($row_dropMovil=$resultado_DropMovil->fetch_object()) {
            array_push($array_dropMovil,$row_dropMovil->drop_movil);
        }
        return $array_dropMovil;
    }

    function consumoDropfijo()
    {
        $query_drop_fijo = "SELECT 
        SUM(consumo) AS drop_fijo FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='drop_fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_DropFijo=$this->conexion->query($query_drop_fijo);
        $array_dropFijo=array();
        while ($row_dropFijo=$resultado_DropFijo->fetch_object()) {
            array_push($array_dropFijo,$row_dropFijo->drop_fijo);
        }
        return $array_dropFijo;
    }

    function consumoBuzonmovil()
    {
        $query_Buzon_Movil ="SELECT 
        SUM(consumo) AS buzon_movil FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='buzon_movil' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_buzonMovil=$this->conexion->query($query_Buzon_Movil);
        $array_buzonMovil=array();
        while ($row_buzon_movil=$resultado_buzonMovil->fetch_object()) {
            array_push($array_buzonMovil,$row_buzon_movil->buzon_movil);
        }
        return $array_buzonMovil;
    }

    function consumoBuzonfijo()
    {
        $query_Buzon_fijo ="SELECT 
        SUM(consumo) AS buzon_fijo FROM reporte_telefonia
        WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' and fecha_termino<='{$this->f_termino} 23:59:59'
        AND tipo='buzon_fijo' AND reporte='{$this->valuereporte}' AND prefijo IN ('{$this->prefix}') AND campania='{$this->valuecampania}'
        AND grupo='{$this->valuegrupos}'";
        
        $resultado_buzonFijo=$this->conexion->query($query_Buzon_fijo);
        $array_buzonFijo=array();
        while ($row_buzon_fijo=$resultado_buzonFijo->fetch_object()) {
            array_push($array_buzonFijo,$row_buzon_fijo->buzon_fijo);
        }
        return $array_buzonFijo;
    }

}
