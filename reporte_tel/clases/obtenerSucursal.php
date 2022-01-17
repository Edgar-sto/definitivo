<?php

class sucursal
{
    public $conexion;
    public $nombre_grupo;




    function __construct($conexion, $nombre_grupo)
    {
        $this->conexion=$conexion;
        $this->grupo=$nombre_grupo;
        
    }
    function obtSucursal()
    {
        $query_obt_sucursal="SELECT sucursal,campania FROM sucursal_campania_grupo
        WHERE nombre_grupo='{$this->grupo}';";
        $array_sucursal=array();
        $resul_query =$this->conexion->query($query_obt_sucursal);

        while ($row_sucursal=$resul_query->fetch_object()) {
            array_push($array_sucursal,$row_sucursal->sucursal,$row_sucursal->campania);
        }
        return $array_sucursal;
    }
}