<?php

require_once 'configs/autoloading.php';

class TaxaDAO{
    private $conn, $medida, $vlInicial, $qtInicial, $vlMedida, $qtMedida, $emVigor;
    
    public function __construct($medida, $vlInicial, $qtInicial, $vlMedida, $qtMedida){
        $this->conn      = DataBase::getConn();
        $this->medida    = $medida;
        $this->vlInicial = $vlInicial;
        $this->qtInicial = $qtInicial;
        $this->vlMedida  = $vlMedida;
        $this->qtMedida  = $qtMedida;
    }
    
    public function updateMedida(){
        $st = $this->conn->prepare("UPDATE tb_medida SET vl_medida = ?, qt_medida = ?,
        vl_inicial = ?, qt_inicial = ? WHERE ds_medida LIKE ?") or die("11".$conn->error);
        $st->bind_param("didis", $this->vlMedida, $this->qtMedida,$this->vlInicial,
                                 $this->qtInicial, $this->medida) or die("10".$st->error);
        $st->execute() or die("11".$st->error);
        $st->close();
        echo json_encode(["resp" => "Medidas Atualizadas com Sucesso"]);
    }
    
    public function updateVigor(){
       
    }
    
    public function getMedida(){
        $st = $this->conn->prepare("SELECT * FROM tb_medida") or die("ERROR ".$conn->error);
        $st->execute() or die("2".$st->error);
        $st->bind_result($ds_medida, $vl_medida, $qt_medida, $vl_inicial, $qt_inicial, $ic_medida);
        $box = array();
        while($st->fetch()){
            $box[$ds_medida] = ["vlMedida"  => $vl_medida,  "qtMedida"  => $qt_medida,  
                                "vlInicial" => $vl_inicial, "qtInicial" => $qt_inicial, 
                                "emVigor"   => $ic_medida]; 
        }
        $st->close();
        echo json_encode($box);
    }
    
    
}

?>