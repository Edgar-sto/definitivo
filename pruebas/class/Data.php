<?php
class Data {
    public function __construct($conexion,$f_inicio,$f_termino,$prefijo,$sucursal)
    {
        $this->conexion =   $conexion;
        $this->f_inicio =   $f_inicio;
        $this->f_termino =  $f_termino;
        $this->pref_local = $prefijo;
        $this->sucursal   = $sucursal;
    }

    public function totalConsumido()
    {
        echo $query_grupos="SELECT DISTINCT(nombre_grupo)  FROM sucu_campa_grup
        WHERE sucursal='{$this->sucursal}'";
        $answer_query_grupos=$this->conexion->query($query_grupos);
        // while ($row=$answer_query_grupos->fetch_object()) {
        //     echo $row->nombre_grupo;   
        // }

        $row=$answer_query_grupos->fetch_assoc();
        echo $row['nombre_grupo'];



    }

}