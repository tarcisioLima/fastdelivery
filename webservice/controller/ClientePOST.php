<?php
require_once "configs/autoloading.php";

class ClientePOST{

    public function __call($m,$arg){
        header('HTTP/1.0 404 Not Found');
    }
    
    public function cadastrar(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $c = new Cliente();
        $c->inserir($obj);
    }
    
    public function confirmarPedido($id){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $c = new Pedido();
        $c->inserir($obj,$id);                          
    }
}
    
?>