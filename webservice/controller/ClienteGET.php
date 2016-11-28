<?php
require_once "configs/autoloading.php";

class ClienteGET{
    
    public function __call($m,$arg){
        header('HTTP/1.0 404 Not Found');
    }
    
    public function pedido($endereco,$id){
        $c = new Pedido();
        $c->buscar($endereco,$id);
    }
}

?>