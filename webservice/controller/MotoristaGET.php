<?php
require_once "configs/autoloading.php";

class MotoristaGET{
        
    public function servico($id){
        $c = new Servico();
        $c->buscar($id);
    }
        
}
    
?>