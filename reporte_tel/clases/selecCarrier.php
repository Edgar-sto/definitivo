<?php
class selecCarrier {
    
    public $carrier;

    public function __construct($carrier)
    {
        $this->carrier      = $carrier;
    }

    function selecPrefijo()
    {
        if ($this->carrier=='Marcatel') {
            return $prefijos= array("15","777");
        } else if ($this->carrier=='MCM') {
            return $prefijos= array("11","999");
        } else if ($this->carrier=="Ipcom") {
            return $prefijos= array("28","444");
        } else if ($this->carrier=="Hazz"){
            return $prefijos= array("14","555");
        } else {
            return $prefijos=array("15","777","11","999","28","444","14","555");
        }
    } 
     
}