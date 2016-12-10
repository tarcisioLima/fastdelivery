<?php

class Sessao{
    public function __construct(){
        session_start();
        $this->verificarSessao();
    }
    
     protected function verificarSessao(){
        if(!isset($_SESSION['master'])){
            header('Location:/');
        }
    }
    
    protected function verificarSessaoLogin(){
        session_start();
        if(isset($_SESSION['master'])){
            header('Location:/mapa');
        }
    }
    protected function destruirSessao(){
        session_start();
        session_destroy();
    }
    
}

?>