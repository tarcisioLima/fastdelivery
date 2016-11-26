<?php

require_once 'configs/autoloading.php';

class ListVeiculoController extends Sessao{
    public function __construct(){
        parent::__construct();
        $this->getVeiculo();    
    }
    
    private function getVeiculo(){
        $v = new VeiculoDAO(null, null, null, null);
        header('Content-Type: application/json');
        $v->getVeiculos();
    }
    
}


?>