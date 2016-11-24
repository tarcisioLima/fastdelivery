<?php
require_once "configs/autoloading.php";

class ClientePOST extends Autenticacao{

    public function cadastrar(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $ndao = new Cliente();
        $ndao->inserir($obj);
        $jwt = new Autenticacao($obj->telefone, $obj->senha);
    }
    
    public 
}
    
?>