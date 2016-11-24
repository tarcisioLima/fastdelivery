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
    
    public function cadVeiculo(){
        if(!$this->verificaPlaca($this->placa)){
             $stmt = $this->conn->prepare("INSERT INTO tb_veiculo (ds_placa, ds_modelo, ds_cor, ic_empresa)
                                      VALUES (?,?,?,?)") or die($conn->error);
            $stmt->bind_param("sssi", $this->placa, $this->modelo, $this->cor, $this->boolean) or die($stmt->error);
            $stmt->execute() or die($stmt->error);
            $stmt->close();
            echo json_encode(["ok" => true,  "resp" => "Veiculo " . $this->modelo . " cadastrado com sucesso."]);
        }else{
            echo json_encode(["ok" => false, "resp" => "Placa " . $this->placa . " já existente"]);
        }
        
       
    }
    
     private function verificaPlaca($placa){
            $query = "SELECT cd_veiculo FROM tb_veiculo WHERE ds_placa LIKE ?";
            $stmt = $this->conn->prepare($query) or die ($conn->error);
            $stmt->bind_param("s", $placa) or die ($stmt->error);
            $stmt->execute() or die($stmt->error);
            $stmt->store_result();
            $line = $stmt->num_rows;
            $stmt->close();
            return $line == 1 ? true : false;
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