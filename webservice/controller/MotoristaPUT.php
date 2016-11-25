<?php
require_once "configs/autoloading.php";

class MotoristaPUT implements UsuarioController{
    
    public function logar(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $m = new Motorista();
        $m->attLogar($obj);
    }
    
    public function deslogar($id){
        $m = new Motorista();
        $m->attDeslogar($id);
    }
    
    public function localizacao($id){
        $json = file_get_contents ('php://input');
        $obj = json_decode($json);
        $l = new Localizacao();
        $l->atualizar($obj,$id);
    }
    
}
?>