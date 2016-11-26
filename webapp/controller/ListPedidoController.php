<?php

require_once 'configs/autoloading.php';

class ListPedidoController{
    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
             $this->getPedidos();
        }else{
             header("HTTP/1.0 404 Not Found");
        }
    }
    
    private function getPedidos(){
        $p = new PedidoDAO();
        header('Content-Type: application/json');
        $p->getRelacaoPedidos();
    }
    
    
   
    
}


?>