<?php
require_once "configs/autoloading.php";

class ClienteGET{
    
    public function pedido($endereco,$id){
        $c = new Pedido();
        $c->buscar($endereco,$id);
    }
}

?>