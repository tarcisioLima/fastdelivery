<?php
require_once "configs/autoloading.php";

class Pedido extends DAO{
	
    public function __construct(){parent::__construct();}
    
    public function buscar($endereco,$id){
        $g = new Geocodificacao();
        $g->geo($endereco);
        $m = $this->motoristaProximo($g->lat(),$g->long());
        if ($m != null){
        	$data = array("id"    => $m['id'],
        	              "preco" => $this->preco($m['distancia']),
        	              "tempo" => $this->tempo($m['distancia']));
        	echo $this->res200(1, "Motorista disponivel", $data);
        } else
        	echo $this->res200(2, "Nenhum motorista disponivel", null);
    }        
    
    public function inserir($obj,$id){
        $status = new Status();
        if($status->buscar($obj->id,1)){
            $cliente = new Cliente();
        	$stmt = $this->conn->prepare("INSERT INTO tb_pedido(dt_solicitacao,ds_endereco_entrega,ds_endereco_retirada,
        	                              vl_pedido, cd_motorista, cd_cliente, cd_situacao) VALUES (now(),?,?,?,?,?,1)")
        	                              or die($this->res400(7, "Erro interno"));
        	$stmt->bind_param("ssdii",$obj->endEntrega,$obj->endRetirada,$obj->preco,
        	                   $obj->id,$cliente->getId($id)) or die($this->res400(8, "Erro interno"));
        	$stmt->execute() or die($stmt->error.$this->res400(9, "Erro interno"));
        	$idP = $stmt->insert_id;
        	$stmt->close();
        	$servico = new Servico();
        	$servico->inserir($obj->tempo,$idP,$obj->id);
        	$status->atualizar($obj->id,3);
            echo $this->res200(1, "Pedido enviado ao motorista. Aguarde a resposta.", null);
        } else {
        	echo $this->res200(1, "Motorista indisponivel. Faça outro pedido.",null);
        }
    }

	private function motoristaProximo($lat,$long){
		$distancia = 989898912213;
		$motoId = null;
		$stmt = $this->conn->prepare("SELECT cd_motorista, vl_latitude, vl_longitude from tb_motorista where cd_status = 1") or die($this->res400(1, "Erro interno"));
        $stmt->execute() or die($this->res400(2, "Erro interno"));
        $stmt->bind_result($id,$latM,$longM);
        while($stmt->fetch()){
        	$motorista  = $this->distancia($lat,$long,$latM,$longM);
        	if($motorista < $distancia){
        		$motoId = $id;
        		$distancia = $motorista;
        	}
        }
    	if($motoId != null)
    		return array ("id" => $motoId, "distancia" => round($distancia) );
    	else
    		return $motoId;
    }
    
    private function distancia($p1LA,$p1LO,$p2LA,$p2LO){
        $r = 6371.0;
        $p1LA = $p1LA * pi() / 180.0;
        $p1LO = $p1LO * pi() / 180.0;
        $p2LA = $p2LA * pi() / 180.0;
        $p2LO = $p2LO * pi() / 180.0;
        $dLat = $p2LA + ($p1LA * -1);
        $dLong = $p2LO + ($p1LO * -1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($p1LA) * cos($p2LA) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 + ($a*-1)));
        return $r * $c * 1000; 
    }
    
    private function preco($distancia){ 
    	$stmt = $this->conn->prepare("SELECT ds_medida, vl_medida, qt_medida, vl_inicial, qt_inicial from tb_medida where
    	                              ic_medida = true") or die($this->res400(1, "Erro interno"));
        $stmt->execute() or die($this->res400(2, "Erro interno"));
        $stmt->bind_result($dsMedida,$vlMedida,$qtMedida,$vlInicial,$qtInicial);
        if($stmt->fetch() == 1){
        	switch ($dsMedida){
        		case 'Kilometro':
        			$distancia = intval($distancia / 1000) + (($distancia % 1000 > 0) ? 1 : 0);
        		    return $distancia <= $qtInicial ? $vlInicial : ((($distancia-$qtInicial) * $vlMedida)/$qtMedida) + $vlInicial;
        		case 'Metro':
                    return $distancia <= $qtInicial ? $vlInicial : ((($distancia-$qtInicial) * $vlMedida)/$qtMedida) + $vlInicial;
        	}
        }
    }
    
    private function tempo($distancia){
    	$tempo = round($distancia / (40/3.6));
    	if($tempo > 60)
    	    if ($tempo > 3600)
    	        return round(($tempo / 3600)).' Horas e '.round((($tempo % 3600) / 60)).' Minutos';
    	    else
    	        return ceil($tempo / 60) . ' Minutos';
    	else
    	    return $tempo . ' Segundos';
    }
}
?>