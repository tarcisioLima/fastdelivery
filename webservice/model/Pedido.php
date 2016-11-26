<?php
require_once "configs/autoloading.php";

class Pedido extends DAO{
    // AIzaSyD1IUo6qHNPlgL6z-WCb1egrJGsztm8Z0w
    public function __construct(){parent::__construct();}
    
    public function buscar($obj,$id){
        $g = new Geocodificacao ();
        $g->geo($obj->endereco);
        echo $g->lat().'-'.$g->long();
    }
    
    private function distancia($p1LA,$p1LO,$p2LA,$p2LO){
        $r = 6371.0;
        $p1LA = $p1LA * pi() / 180.0;
        $p1LO = $p1LO * pi() / 180.0;
        $p2LA = $p2LA * pi() / 180.0;
        $p2LO = $p2LO * pi() / 180.0;
        $dLat = $p2LA + ($p1LA * -1);
        $dLong = $p2LO + ($p1LO * -1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($p1LA) * cos($p2LA) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 + ($a*-1)));
        return $r * $c * 1000; 
    }
    
}
?>