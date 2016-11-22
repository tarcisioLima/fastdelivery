<?php
require_once "../../configs/autoloading.php";

class ClienteGET{

    public function cadastrar(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $ndao = new Cliente();
        $ndao->inserir($obj);
        echo "Ok!";
    }
}

?>