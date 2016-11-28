<?php
require_once "configs/autoloading.php";

class Servico extends DAO{
	
    public function __construct(){parent::__construct();}
    
    public function buscar($id){
        $stmt = $this->conn->prepare("SELECT ds_endereco_retirada, ds_endereco_entrega, vl_pedido, S.cd_pedido FROM tb_servico AS S
                                      INNER JOIN tb_pedido AS P ON S.cd_pedido = P.cd_pedido
	                                  INNER JOIN tb_motorista AS M ON S.cd_motorista = M.cd_motorista
		                              WHERE M.cd_login = ? and S.cd_pedido is not null") or die( $this->res400(1, "Erro interno"));
        $stmt->bind_param("i",$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        $stmt->bind_result($endR, $endE, $vl, $cdP);
        if($stmt->fetch() == 1){
            $status = new Status();
            $status->atualizar($id,2);
            $situacao = new Situacao();
            $situacao->atualizar($cdP,2); 
        	$data = array(  "endEntrega"    => $endE,
        	                "endRetirada"   => $endR,
        	                "valor"         => $vl,  
        	                "id-pedido"     => $cdP);
            echo $this->res200(1, "Servico aceito", $data);
        } else
            echo $this->res200(2,"Voce nao possui nenhum servico",null);
    }
    
    public function inserir($tempo,$idP,$idM){
        $stmt = $this->conn->prepare("UPDATE tb_servico SET ds_tempo_estimado = ?, cd_pedido = ? where
        	                              cd_motorista = ?") or die($this->res400(10, "Erro interno"));
        $stmt->bind_param("sii",$tempo,$idP,$idM) or die($this->res400(11, "Erro interno"));
        $stmt->execute() or die($this->res400(12, "Erro interno"));
        $stmt->close();
    }
    
    public function attFinalizar($idP,$id){
        $stmt = $this->conn->prepare("UPDATE tb_servico as S inner join tb_pedido as P on S.cd_pedido = P.cd_pedido
                                      SET S.cd_pedido = null, dt_finalizacao = now() WHERE S.cd_pedido LIKE ? ") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("i", $idP) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die(res400(3,"Erro interno"));  
        $situacao = new Situacao();
        $situacao->atualizar($idP,3);
        $status = new Status(); 
        $status->atualizar($id,1);
        echo $this->res200(1, "Servico finalizado",null);
    }
    
    public function attRecusar($idP,$id){
        $stmt = $this->conn->prepare("UPDATE tb_servico SET cd_pedido = null WHERE cd_pedido LIKE ? ") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("i", $idP) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die(res400(3,"Erro interno"));
        $situacao = new Situacao();
        $situacao->atualizar($idP,4);
        $status = new Status();
        $status->atualizar($id,1);
        echo $this->res200(1, "Servico Recusado",null);
    }
    
}

?>