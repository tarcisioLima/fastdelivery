<?php

require_once 'configs/autoloading.php';

class LoginController extends Sessao{
    
    public function __construct(){
        $this->verificarSessaoLogin();
        $_SERVER['REQUEST_METHOD'] == 'GET'
        ? include 'webapp/view/pagina-login.html' : $this->logar();
    }
    
    private function logar(){
        $enter = new LoginDAO($_POST['user'], $_POST['passw']);
        header('Content-Type: application/json'); 
        if($enter->login()){
            $_SESSION["master"] =  true;
            echo json_encode(["ok" => true]);
        }else{
            echo json_encode(["ok" => false]);
        }
    }
}


?>