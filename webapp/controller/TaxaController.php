<?php

require_once 'configs/autoloading.php';

class TaxaController{
    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
             include "webapp/view/taxa.html";
            }elseif ($_SERVER['REQUEST_METHOD'] == 'PUT'){
                        $this->verificarPUT();
                    }else{
                        header("HTTP/1.0 404 Not Found");
                    }
    }
    
    private function verificarPUT(){
        $json = file_get_contents('php://input');
        $obj  = json_decode($json, true);
        
        header('Content-Type: application/json');
        //echo json_encode($obj);
        if(isset($obj["met"])){
            switch ($obj["met"]){
                case "atualizarMedida": $this->atualizarMedida($obj); break;
                case "atualizarVigor":  $this->atualizarVigor($obj);  break;
                default : $this->badRequest(); break;
            }
        }else{
            $this->badRequest();
        }
    }
    private function atualizarMedida($obj){
        $t = new TaxaDAO($obj["dsMedida"],$obj["vlInicial"], $obj["qtInicial"], $obj["vlMedida"], $obj["qtMedida"]);
        $t->updateMedida();
    }
    
    private function atualizarVigor($obj){
        $t = new TaxaDAO($obj["dsMedida"], null, null, null, null);
        $t->emVigor();
    }
    
    private function badRequest(){
        echo json_encode(["resp" => "negado"]);
    }
    
}


?>