<?php
require_once "configs/autoloading.php";

class ClientePUT implements UsuarioController{
    
    public function logar(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $c = new Cliente();
        $c->attLogar($obj);
    }
    
    public function deslogar($id){
        $c = new Cliente();
        $c->attDeslogar($id);
    }
    
    public function pedido($id){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $c = new Pedido();
        $c->buscar($obj,$id);
    }
    
}
?>