<?php

require_once 'configs/autoloading.php';

class VeiculoController{
    public function __construct(){
        $_SERVER['REQUEST_METHOD'] == 'GET' ? include "webapp/view/veiculo.html"
                                            : $this->cadastrarVeiculo();
    }
    
    private function cadastrarVeiculo(){
        $v = new VeiculoDAO($_POST['placa'], $_POST['modelo'], $_POST['cor'], $_POST['dono']);
        header('Content-Type: application/json'); 
        $v->cadVeiculo();
    }
}


?>