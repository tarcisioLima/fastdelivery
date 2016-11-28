<?php
require_once "configs/autoloading.php";

class MotoristaGET{
       
    public function __call($m,$arg){
        header('HTTP/1.0 404 Not Found');
    }    
    
    public function servico($id){
        $c = new Servico();
        $c->buscar($id);
    }
        
}
    
?>