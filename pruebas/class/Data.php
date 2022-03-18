<?php
class Data {
    public function __construct($conexion,$f_inicio,$f_termino,$prefijo)
    {
        $this->conexion =   $conexion;
        $this->f_inicio =   $f_inicio;
        $this->f_termino =  $f_termino;
        $this->prefijo = $prefijo;
        // $this->preMarcatel = "15','777";
        // $this->preMcm      = "11','999";
        // $this->preIpcom    = "28','444";
        // $this->preHaz      = "14','555";
    }

    public function totalConsumidoPorDia()
    {
        // $all_prefijos      =   array(
        //     'Marcatel'    =>  "15','777",
        //     'MCM'         =>  "11','999",
        //     'Ipcom'       =>  "28','444",
        //     'Haz'         =>  "14','555"
        // );
        $all_prefijosdos    =   array("15','777","11','999","28','444","14','555");
        /*
            $query_grupos="SELECT DISTINCT(nombre_grupo)  FROM sucu_campa_grup
            WHERE sucursal='{$this->sucursal}'";
            $answer_query_grupos=$this->conexion->query($query_grupos);
            // while ($row=$answer_query_grupos->fetch_object()) {
            //     echo $row->nombre_grupo;   
            // }

            $row=$answer_query_grupos->fetch_assoc();
            echo $row['nombre_grupo'];
        */

        $queryFechas="SELECT SUBSTRING(fecha_inicio,1,10) AS fecha FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59' GROUP BY fecha";
        $answerFechas=$this->conexion->query($queryFechas);
        while ($rowFecha=$answerFechas->fetch_object())
        {
            /**Vasriable con fecha */
            $rowFecha->fecha;
            ?>
            <tr>
                <td class="table-primary">
                    <strong><?php echo $rowFecha->fecha;?></strong>
                </td>                
            <?php
            foreach ($all_prefijosdos as $prefijo)
            {
                if ($prefijo == "15','777" || $prefijo == "28','444") {
                    $costo_movil=0.11; $costo_fijo=0.04;
                } if ($prefijo == "11','999") {
                    $costo_movil=0.11; $costo_fijo=0.05;
                } else {
                    $costo_movil=0.09/60; $costo_fijo=0.04/60;
                }
                $queryConsumos = "SELECT
                (SELECT SUM(consumo) FROM reporte_telefonia
                WHERE fecha_inicio BETWEEN '{$rowFecha->fecha} 00:00:00' AND '{$rowFecha->fecha} 23:59:59'
                AND prefijo IN ('{$prefijo}') AND tipo IN ('movil','drop_movil','buzon_movil')) AS movil,

                (SELECT SUM(consumo) FROM reporte_telefonia
                WHERE fecha_inicio BETWEEN '{$rowFecha->fecha} 00:00:00' AND '{$rowFecha->fecha} 23:59:59'
                AND prefijo IN ('{$prefijo}') AND tipo IN ('fijo','drop_fijo','buzon_fijo')) AS fijo;";
                //echo "<br>";
                $answerConsumo=$this->conexion->query($queryConsumos);
                while ($rowConsumo=$answerConsumo->fetch_object())
                {   
                    $movil_= $rowConsumo->movil*$costo_movil;
                    $fijo_ = $rowConsumo->fijo*$costo_fijo;    
                ?> 
                    <td class="table-light"><?php echo "$" . number_format($movil_,2);?></td>
                    <td class="table-light"><?php echo "$" . number_format($fijo_,2);?></td>
                <?php
                }
            }
            ?>
            </tr>
            <?php
        }
        ?>
            <tr>
                <td class="table-primary">
                    <strong><?php echo $this->f_inicio . " al " . $this->f_termino;?></strong>
                </td> 
                <?php
                foreach ($all_prefijosdos as $prefijo)
                {
                    if ($prefijo == "15','777" || $prefijo == "28','444") {
                        $costo_movil=0.11; $costo_fijo=0.04;
                    } if ($prefijo == "11','999") {
                        $costo_movil=0.11; $costo_fijo=0.05;
                    } else {
                        $costo_movil=0.09/60; $costo_fijo=0.04/60;
                    }
                    $queryConsumos = "SELECT
                    (SELECT SUM(consumo) FROM reporte_telefonia
                    WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_inicio<='{$this->f_termino} 23:59:59'
                    AND prefijo IN ('{$prefijo}') AND tipo IN ('movil','drop_movil','buzon_movil')) AS movil,

                    (SELECT SUM(consumo) FROM reporte_telefonia
                    WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_inicio<='{$this->f_termino} 23:59:59'
                    AND prefijo IN ('{$prefijo}') AND tipo IN ('fijo','drop_fijo','buzon_fijo')) AS fijo;";
                    //echo "<br>";
                    $answerConsumo=$this->conexion->query($queryConsumos);
                    while ($rowConsumo=$answerConsumo->fetch_object())
                    {   
                        $movil_= $rowConsumo->movil*$costo_movil;
                        $fijo_ = $rowConsumo->fijo*$costo_fijo;    
                    ?> 
                        <td class="table-secondary"><?php echo "$" . number_format($movil_,2);?></td>
                        <td class="table-secondary"><?php echo "$" . number_format($fijo_,2);?></td>
                    <?php
                    }
                }
            ?>
            </tr>
            <?php
    }

    public function MovilFijoPorCarrier()
    {
        if ($this->prefijo == "15','777" || $this->prefijo == "28','444") {
            $costo_movil=0.11; $costo_fijo=0.04;
        } if ($this->prefijo == "11','999") {
            $costo_movil=0.11; $costo_fijo=0.05;
        } else {
            $costo_movil=0.09/60; $costo_fijo=0.04/60;
        }

        $queryPorCarrier="SELECT
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('movil')) AS movil,
    
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('fijo')) AS fijo;";
        $answerQueryPorCarrier=$this->conexion->query($queryPorCarrier);
        while ($rowPorCarrier=$answerQueryPorCarrier->fetch_object()) {
            $movil_ = $rowPorCarrier->movil*$costo_movil;
            $fijo_ = $rowPorCarrier->fijo*$costo_fijo;
            ?>
            <td ><?php echo "$" . number_format($movil_,2);?></td>
            <td ><?php echo "$" . number_format($fijo_,2);?></td>
            <?php
        }

    }

    public function dropMovilFijoPorCarrier()
    {
        if ($this->prefijo == "15','777" || $this->prefijo == "28','444") {
            $costo_movil=0.11; $costo_fijo=0.04;
        } if ($this->prefijo == "11','999") {
            $costo_movil=0.11; $costo_fijo=0.05;
        } else {
            $costo_movil=0.09/60; $costo_fijo=0.04/60;
        }
        $queryPorCarrier="SELECT
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('drop_movil')) AS drop_movil,
    
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('drop_fijo')) AS drop_fijo;";
        $answerQueryPorCarrier=$this->conexion->query($queryPorCarrier);
        while ($rowPorCarrier=$answerQueryPorCarrier->fetch_object()) {
            $drop_movil_ = $rowPorCarrier->drop_movil*$costo_movil;
            $drop_fijo_ = $rowPorCarrier->drop_fijo*$costo_fijo;
            ?>
            <td ><?php echo "$" . number_format($drop_movil_,2);?></td>
            <td ><?php echo "$" . number_format($drop_fijo_,2);?></td>
            <?php
        }
    }

    public function buzonMovilFijoPorCarrier()
    {
        if ($this->prefijo == "15','777" || $this->prefijo == "28','444") {
            $costo_movil=0.11; $costo_fijo=0.04;
        } if ($this->prefijo == "11','999") {
            $costo_movil=0.11; $costo_fijo=0.05;
        } else {
            $costo_movil=0.09/60; $costo_fijo=0.04/60;
        }
        $queryPorCarrier="SELECT
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('buzon_movil')) AS buzon_movil,
    
        (SELECT SUM(consumo) FROM reporte_telefonia
        WHERE fecha_inicio BETWEEN '{$this->f_inicio} 00:00:00' AND '{$this->f_termino} 23:59:59'
        AND prefijo IN ('{$this->prefijo}') AND tipo IN ('buzon_fijo')) AS buzon_fijo;";
        $answerQueryPorCarrier=$this->conexion->query($queryPorCarrier);
        while ($rowPorCarrier=$answerQueryPorCarrier->fetch_object()) {
            $buzon_movil_ = $rowPorCarrier->buzon_movil*$costo_movil;
            $buzon_fijo_ = $rowPorCarrier->buzon_fijo*$costo_fijo;
            ?>
            <td ><?php echo "$" . number_format($buzon_movil_,2);?></td>
            <td ><?php echo "$" . number_format($buzon_fijo_,2);?></td>
            <?php
        }

    }
}