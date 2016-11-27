<?php

require_once 'configs/autoloading.php';

class ListLatLongController extends Sessao{
    
    public function __construct(){
        parent::__construct();
        $this->getLatLong();    
    }
    
    private function getLatLong(){
       $m = new MapaDAO();
       header('Content-Type: application/json');
       $m->getLatLong();
    }
    
}


?>