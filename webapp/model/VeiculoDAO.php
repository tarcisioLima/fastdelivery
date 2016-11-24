<?php
require_once 'configs/autoloading.php';

class VeiculoDAO {
    private $conn, $placa, $modelo, $cor, $boolean;
    
    public function __construct($placa, $modelo, $cor, $boolean){
        $this->conn     = DataBase::getConn();
        $this->placa    = $placa;
        $this->modelo   = $modelo;
        $this->cor      = $cor;
        $this->boolean  = $boolean;
    }
    
    public function getVeiculos(){
        $st = $this->conn->prepare("SELECT cd_veiculo, ds_modelo FROM tb_veiculo") or die("ERROR ".$conn->error);
        $st->execute() or die("2".$st->error);
        $st->bind_result($col0,$col1);
        $box = array();
        while($st->fetch()){
            $box[] = ["value" => $col0, "text" => $col1]; 
        }
        $st->close();
        echo json_encode($box);
    }
}


?>