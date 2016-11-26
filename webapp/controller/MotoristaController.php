<?php
require_once 'configs/autoloading.php';

class MotoristaController extends Sessao{
    public function __construct(){
        parent::__construct();
        $_SERVER['REQUEST_METHOD'] == 'GET' ? include 'webapp/view/motorista.html' 
                                            : $this->realizarCadastro();
    }
    
    private function realizarCadastro(){
        $motor = new MotoristaDAO($_POST['nome'],       $_POST['email'],     $_POST['sexo'],  
                                  $_POST['tel'],        $_POST['endereco'],  $_POST['cidade'],
                                  $_POST['bairro'],     $_POST['estado'],    $_POST['cep'],
                                  $_POST['nascimento'], null, null, null,    $_POST['cpf'],
                                  $_POST['login'],      $_POST['senha'],     $_POST['idVeiculo']);

        header('Content-Type: application/json'); 
        $motor->cadastrar();
    
    }
}
?>