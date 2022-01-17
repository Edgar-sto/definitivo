<?php
function conexion_vicis ($servidor){
    date_default_timezone_set ('America/Mexico_City');
    $fecha     =   date('Y-m-d'); //Datos a guardar date('Y-m-d')
    $user       =   "cron";
    $password   =   "@l**pbx++t3l3";
    $nombre_base=   "asterisk";
    $conection  =   new mysqli($servidor,$user,$password,$nombre_base);
    if ($conection -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conection -> connect_error;
        exit();
    }
    return $conection;
}


$vici= $_POST['vicidial'];
$conexion=conexion_vicis("{$vici}");

$query="SELECT LM.campaign_id, SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container),LENGTH(VL.list_id)) AS IDLISTA, VL.list_name, IF(LOCATE('|', SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id),3)) > 0, REPLACE(SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id),3),'|',''), SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id),3)) AS PRIORIDAD, IF(LOCATE('|', SUBSTR(LM.list_mix_container, LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id) + 3,3)) > 0, REPLACE(SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id) + 3, 3),'|','' ), SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container) + LENGTH(VL.list_id) + 3, 3)) AS PORCENTAJE FROM vicidial_campaigns_list_mix LM LEFT JOIN vicidial_lists VL ON SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container), LENGTH(VL.list_id)) = CAST(VL.list_id AS CHAR) LEFT JOIN vicidial_campaigns VC ON LM.campaign_id = VC.campaign_id WHERE status = 'ACTIVE' AND LENGTH(SUBSTR(LM.list_mix_container,LOCATE(VL.list_id, LM.list_mix_container),LENGTH(VL.list_id) )) >= 8 ORDER BY LM.campaign_id";

echo $query;
echo "<br><br>";




$res=$conexion->query($query);
$array_res=array();
while ($row=mysqli_fetch_assoc($res)) {
    echo $campania=$row['campaign_id'];
    //array_push($array_res,$row->campaign_id,$row->IDLISTA,$row->list_name,$row->PRIORIDAD,$row->PORCENTAJE);
}

// foreach ($array_res as $key) {
//     echo $key;
// }


