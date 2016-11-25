<?php
require_once "configs/autoloading.php";

class ClienteGET{
    
    public function pedido($id){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $c = new Pedido();
        $c->buscar($obj,$id);
    }
    
    
}

?>