<?php

require_once 'configs/autoloading.php';

class ListMedidaController{
    public function __construct(){
        $this->getMedida();    
    }
    
    private function getMedida(){
        $v = new TaxaDAO(null, null, null, null, null);
        header('Content-Type: application/json');
        $v->getMedida();
    }
    
}


?>