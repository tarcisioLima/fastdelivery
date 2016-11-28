<?php
require_once "configs/autoloading.php";

class ClientePUT implements UsuarioController{
    
    public function __call($m,$arg){
        header('HTTP/1.0 404 Not Found');
    }
    
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
    
}
?>