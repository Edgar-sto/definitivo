<?php
class SucursalesExternas
{

    public function __construct($conexion, $f_inicio, $f_termino)
    {
        $this->conexion =   $conexion;
        $this->f_inicio =   $f_inicio;
        $this->f_termino =   $f_termino;
        // $this->prefijo  =   $prefijo;
    }

    public function sucursalesHSBC()
    {
        $sucursalesExternasHsbc = array(
            "ADOLF HORN "           => "HSBC-ADOLFHORN-MA','LAB-STO-AHORN-HSBC",
            "AE CONTACT"            => "HSBC-AECONT-CDMX-MA",
            "AGORA"                 => "HSBC_AGORA_SANTA_FE','HSBC_AGORA_LA_CALMA','HSBC-AGORA-VOCA-MA','HSBC-MCONTACT-MX-MA','HSBC-MCONTACT-GDL-MA','HSBC-JLCALL-GDL-MA','HSBC-AGO-CALMA-MA','HSBC-AGO-VALLAR-MA','HSBC-AGORA-LM-MA",
            "ANYMACALL"             => "HSBC-ANYMAC-GDL-MA",
            "ATI"                   => "HSBC-ATI-GDL-MA",
            "BESTCALL"              => "HSBC-BESTCALL-GDL-MA",
            "CALEM"                 =>  "HSBC-CALEM-GDL-MA",
            "CALLCITY"              =>  "HSBC-CALLCITY-GDL-MA",
            "CLOUD CDMX"            =>  "HSBC-CLOUD-CDMX-MA",
            "CLOUD VERACRUZ"        =>  "HSBC-CLOUD-VERAC-MA",
            "CONECTA CDMX"          =>  "HSBC-CONECTA-CDMX-MA",
            "CONTACT PUEBLA"        =>  "HSBC-CONTACT-PUE-MA",
            "CONTACTO PUEBLA"       =>  "HSBC-CONTACTO-PUE-MA",
            "COYOACAN"              =>  "HSBC-COYOACAN','HSBC-COYOACMN-COY-MA','HSBC-COY-CDMX-MA-VAL",
            "DATAGRAM"              =>  "HSBC-DATAG-CDMX-MA",
            "DATAHUNTER"            =>   "HSBC-DATAHUNT-PUE-MA",
            "DECA2"                 =>  "HSBC-DECA2",
            "ECOSYST CDMX"          =>  "HSBC-ECOSYST-CDMX-MA",
            "ERGON"                 =>  "HSBC-CENTROHISTORICO','HSBC-TEPATITLAN','HSBC-SANMIGUEL','HSBC-ERGON",
            "ESTRATEGICA"           =>  "HSBC-ESTRAT-CDMX-MA",
            "EVOLUTION CENTER"      =>  "HSBC-EVOCENT-GDL-MA",
            "FASA"                  =>  "HSBC-FASA-MX-MA",
            "FCMEX CDMX"            =>  "HSBC-FCMEX-CDMX-MA",
            "GARE"                  =>  "HSBC-GARE-MX-MA','HSBC-GARE2-MX-MA",
            "GBG CENTER"            =>  "HSBC-GBGCENT-GDL-MA','HSBC-GBG-GDL-MA",
            "GRUPO SAIR"            =>  "HSBC-GRPSAIR-CDMX-MA",
            "IBC"                   =>  "HSBC-IBC",
            "IBLE"                  =>  "HSBC-IBLE-GDL-MA",
            "ICONITEL"              => "HSBC-ICONITEL-GDL-MA",
            "IN AND OUT"            =>  "HSBC-INAOUT-QRO-MA",
            "INTRETEN"              =>  "HSBC-INTRETENPUEBLA','HSBC-INTRETENAGUA','HSBC-INTRETEN','HSBC-INTRET-TOL-MA",
            "JABATEL"               =>  "HSBC-JABATEL','HSBC-JABATEL2-GDL-MA','HSBC-JABATEL3-GDL-MA",
            "LEON"                  =>  "HSBC-LEON','HSBC-NATUI-MX2-MA','HSBC-NATUI2-LEON-MA",
            "MARAVEL"               =>  "HSBC-MARALVE-CHI-MA",
            "MARKETCALL"            =>  "HSBC-MARKET-SJI-MA",
            "MARKETING"             =>  "HSBC-MARKRM-MX-MA",
            "MIINT"                 =>  "HSBC-MIINT-PUE-MA",
            "MM DIRECTA"            =>  "SBC-MMD-ARG-MA','HSBC-MMD-ARG-MA",
            "PICKEROON"             =>  "HSBC-PICKER-CDMX-MA",
            "PROPFI"                =>  "HSBC-PROPFI-COAH-MA",
            "QUERETARO"             =>  "HSBC-QUERETARO",
            "RA CONTACT"            =>  "HSBC-RACONT-HGO-MA",
            "RGM"                   =>  "HSBC-RGM-CDMX-MA",
            "RI TELEMARKETING"      =>  "HSBC-RITELE-PUE-MA",
            "RIO PLAZA"             =>  "HSBC-STO-RIOPLAZ-MA",
            "SAN JUAN DEL RIO"      =>  "HSBC-SJDR-QRO-MA",
            "SCSMX"                 =>  "HSBC-SCSMX-CDMX-MA",
            "SICC TELEMARKETING"    =>  "HSBC-SICCTMK-MX-MA",
            "SISCOM"                =>  "HSBC-SISCOM-CDMX-MA",
            "SJCALL"                =>  "HSBC-SJCALL-GDL-MA",
            "SKYNET"                =>  "HSBC-SKYNET-GDL-MA",
            "SOLEST"                =>  "HSBC-SOLEST-CDMX-MA",
            "TBCENTER"              =>  "HSBC-TBCENT-CDMX-MA",
            "TRIPCALL"              =>  "HSBC-TRIPCALL-QRO-MA",
            "TWONET"                =>  "HSBC-TWONET-GDL-MA",
            "WOLRD TEL EDO MEX" =>  "HSBC-WORLD-EDOMEX-MA"
        );
   
    }

    public function sucursalesINVEX()
    {
        $sucursalesExternasInvex = array(
            "ANYMACALL"         =>   "OPERACION-ANYMACALL",
            "CALEM"             =>  "INVEX-CALEM-GDL-MA",
            "CONNECT AND CALL"  =>  "INVEX-CAC-QRO-MA",
            "IN AND OUT"        =>  "INVEX-INAOUT-QRO-MA",
            "JABATEL"           =>  "INVEX-JABATEL-GDL-MA",
            "MARKETING"         =>  "INVEX-MARKET-CDMX-MA",
            "PACHUCA"           =>  "INVEX-PACHUCA-HGO",
            "SAN JUAN DEL RIO"  =>  "INVEX-SJR-QRO",
            "SJCALL"            =>  "OPERACION-SJCALL",
            "TRIPCALL"          =>  "INVEX-TRIPCAL-QRO-MA"
        );
    }

    public function sucursalesSANTANDER()
    {
        $sucursalesExternasSantander = array(
            "ESTRATEGICA"   =>  "SANTANDER-STO-ESTRAT",
            "SAN JUAN DEL RIO"  =>  "SANTANDER-STO-SJR"
        );
    }

    public function centrosExternosGeneral()
    {
        
        $centrosExternosAll = array(
            "HSBC CE" => "HSBC-ADOLFHORN-MA','LAB-STO-AHORN-HSBC','HSBC-AECONT-CDMX-MA','HSBC_AGORA_SANTA_FE','HSBC_AGORA_LA_CALMA','HSBC-AGORA-VOCA-MA','HSBC-MCONTACT-MX-MA','HSBC-MCONTACT-GDL-MA','HSBC-JLCALL-GDL-MA','HSBC-AGO-CALMA-MA','HSBC-AGO-VALLAR-MA','HSBC-AGORA-LM-MA','OPERACION-ANYMACALL','HSBC-ANYMAC-GDL-MA','HSBC-ATI-GDL-MA','HSBC-BESTCALL-GDL-MA','INVEX-CALEM-GDL-MA','HSBC-CALEM-GDL-MA','HSBC-CALLCITY-GDL-MA','HSBC-CLOUD-CDMX-MA','HSBC-CLOUD-VERAC-MA','HSBC-CONECTA-CDMX-MA','INVEX-CAC-QRO-MA','HSBC-CONTACT-PUE-MA','HSBC-CONTACTO-PUE-MA','HSBC-COYOACAN','HSBC-COYOACMN-COY-MA','HSBC-COY-CDMX-MA-VAL','HSBC-DATAG-CDMX-MA','HSBC-DATAHUNT-PUE-MA','HSBC-DECA2','HSBC-ECOSYST-CDMX-MA','HSBC-CENTROHISTORICO','HSBC-TEPATITLAN','HSBC-SANMIGUEL','HSBC-ERGON','HSBC-ESTRAT-CDMX-MA','SANTANDER-STO-ESTRAT','HSBC-EVOCENT-GDL-MA','HSBC-FASA-MX-MA','HSBC-FCMEX-CDMX-MA','HSBC-GARE-MX-MA','HSBC-GARE2-MX-MA','HSBC-GBGCENT-GDL-MA','HSBC-GBG-GDL-MA','HSBC-GRPSAIR-CDMX-MA','HSBC-IBC','HSBC-IBLE-GDL-MA','HSBC-ICONITEL-GDL-MA','INVEX-INAOUT-QRO-MA','HSBC-INAOUT-QRO-MA','HSBC-INTRETENPUEBLA','HSBC-INTRETENAGUA','HSBC-INTRETEN','HSBC-INTRET-TOL-MA','INVEX-JABATEL-GDL-MA','HSBC-JABATEL2-GDL-MA','HSBC-JABATEL','HSBC-JABATEL3-GDL-MA','HSBC-NATUI-MX2-MA','HSBC-LEON','HSBC-NATUI2-LEON-MA','HSBC-MARALVE-CHI-MA','HSBC-MARKET-SJI-MA','INVEX-MARKET-CDMX-MA','HSBC-MARKRM-MX-MA','HSBC-MIINT-PUE-MA','SBC-MMD-ARG-MA','HSBC-MMD-ARG-MA','INVEX-PACHUCA-HGO','HSBC-PICKER-CDMX-MA','HSBC-PROPFI-COAH-MA','HSBC-QUERETARO','HSBC-RACONT-HGO-MA','HSBC-RGM-CDMX-MA','HSBC-RITELE-PUE-MA','HSBC-STO-RIOPLAZ-MA','HSBC-SJDR-QRO-MA','SANTANDER-STO-SJR','INVEX-SJR-QRO','HSBC-SCSMX-CDMX-MA','HSBC-SICCTMK-MX-MA','HSBC-SISCOM-CDMX-MA','HSBC-SJCALL-GDL-MA','OPERACION-SJCALL','HSBC-SKYNET-GDL-MA','HSBC-SOLEST-CDMX-MA','HSBC-TBCENT-CDMX-MA','HSBC-TRIPCALL-QRO-MA','INVEX-TRIPCAL-QRO-MA','HSBC-TWONET-GDL-MA','HSBC-WORLD-EDOMEX-MA",

            "INVEX CE" => "OPERACION-ANYMACALL','INVEX-CALEM-GDL-MA','INVEX-CAC-QRO-MA','INVEX-INAOUT-QRO-MA','INVEX-JABATEL-GDL-MA','INVEX-MARKET-CDMX-MA','INVEX-PACHUCA-HGO','INVEX-SJR-QRO','OPERACION-SJCALL','INVEX-TRIPCAL-QRO-MA",

            "SANTANDER CE" => "SANTANDER-STO-ESTRAT','SANTANDER-STO-SJR"
        );
        $all_prefijos      =   array(
            'Marcatel'    =>  "15','777",
            'MCM'         =>  "11','999",
            'Ipcom'       =>  "28','444",
            'Haz'         =>  "14','555"
        );

        foreach ($all_prefijos as $carrier => $prefijo) {
        ?>
            <div class="col-md-3 " id="multiCollapseExampleEscorza<?php echo $carrier; ?>">
                <div class="card card-body bg-secondary">
                    <label class="fs-5 text-center d-block text-white"><?php echo $carrier; ?></label>
                    <div class="row bg-light border-bottom border-dark text-black text-center">
                        <div class="col-sm-3 border-end border-dark"><strong>Campaña</strong></div>
                        <div class="col-sm-3"><strong>Movil</strong></div>
                        <div class="col-sm-3"><strong>Fijo</strong></div>
                        <div class="col-sm-3"><strong>Total</strong></div>
                    </div>
                    <?php
                    foreach ($centrosExternosAll as $campanias => $grupos) {
                        switch ($prefijo) {
                            case "15','777":
                                $costo_movil = 0.11;
                                $costo_fijo = 0.04;
                                break;

                            case "28','444":
                                $costo_movil = 0.11;
                                $costo_fijo = 0.04;
                                break;

                            case "11','999":
                                $costo_movil = 0.11;
                                $costo_fijo = 0.05;
                                break;

                            case "14','555":
                                $costo_movil = 0.09 / 60;
                                $costo_fijo = 0.04 / 60;
                                break;
                        }

                        if ( $campanias == "HSBC CE" )
                        {
                            $fondobg = "bg-danger";
                        } elseif ($campanias == "SANTANDER CE") {
                            $fondobg = "bg-warning";
                        } else {
                            $fondobg = "bg-success";
                        }
                        $query_centros_externos =
                            "SELECT
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='movil' AND prefijo IN ('{$prefijo}')) AS movil,
                            (SELECT SUM(consumo) FROM reporte_telefonia
                            WHERE fecha_inicio>='{$this->f_inicio} 00:00:00' AND fecha_termino<='{$this->f_termino} 23:59:59'
                            AND grupo IN ('{$grupos}')
                            AND tipo='fijo' AND prefijo IN ('{$prefijo}')) AS fijo;";

                        $resultado_centros_externos = $this->conexion->query($query_centros_externos);
                        while ($row_ = $resultado_centros_externos->fetch_object()) {
                            $consumo_movil = $row_->movil;
                            $consumo_fijo = $row_->fijo;

                            $con_movil = $consumo_movil * $costo_movil;
                            $con_fijo = $consumo_fijo * $costo_fijo;
                            $total_con = $con_movil + $con_fijo;


                        ?>              
                            <div class="row bg-light border-bottom border-dark text-black">
                                <div class="col-sm-3 border-end border-dark fs-6 <?php echo $fondobg;?>"><label><?php echo $campanias ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_movil, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($con_fijo, 2); ?></label></div>
                                <div class="col-sm-3"><label><?php echo "$" . number_format($total_con, 2); ?></label></div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
<?php
        }









    }
}