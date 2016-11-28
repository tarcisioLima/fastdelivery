<?php
require_once "configs/autoloading.php";

class MotoristaPUT implements UsuarioController{
    
    public function call($m,$args){
         echo "erro";
    }
    
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
    
    public function recusarServico($idP,$id){
        $c = new Servico();
        $c->attRecusar($idP, $id);
    }
    
    public function finalizarServico($idP,$id){
        $c = new Servico();
        $c->attFinalizar($idP, $id);
    }
    
    public function disponivel($id){
        $s = new Status();
        $s->atualizar($id, 1);
    }
    
    public function indisponivel($id){
        $s = new Status();
        $s->atualizar($id,5);
    }
    
}
?>