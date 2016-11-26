<?php
require_once "configs/autoloading.php";

class Pedido extends DAO{
    // AIzaSyD1IUo6qHNPlgL6z-WCb1egrJGsztm8Z0w
    public function __construct(){parent::__construct();}
    
    public function buscar($endereco,$id){
        $g = new Geocodificacao();
        $g->geo($endereco);
        $m = $this->motoristaProximo($g->lat(),$g->long());
        if ($m != null){
        	$data = array("id"    => $m['id'],
        	                "preco" => $this->preco($m['distancia']),
        	                "tempo" => null);
        	echo $this->res200(1, "Motorista disponivel", $data);
        } else
        	echo $this->res200(2, "Nenhum motorista disponivel", null);
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
        			break;
        		case 'Metro':
        			echo "oi";
        			break;
        		case 'Hora':
        			echo "ray";
        			break;
        		case 'Segundo':
        			echo "eita";
        			break;
        		default:
        			break;
        	}
        }
    }
    
    private function tempo($tempo){
    	
    }
}
?>