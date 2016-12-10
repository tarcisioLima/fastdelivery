<?php

require_once 'configs/autoloading.php';

class PedidoDAO{
   private $conn;
   
   public function __construct(){
       $this->conn = DataBase::getConn();
   }
    
   public function getRelacaoPedidos(){
    $query = "SELECT p.dt_solicitacao, p.dt_finalizacao, p.ds_endereco_entrega, p.ds_endereco_retirada, p.vl_pedido,
                m.nm_motorista, c.nm_cliente, s.ds_situacao from tb_pedido as p inner join tb_motorista as m
                    on p.cd_motorista = m.cd_motorista
                        inner join tb_cliente as c 
                            on p.cd_cliente = c.cd_cliente
                                inner join tb_situacao as s
                                    on p.cd_situacao = s.cd_situacao";
                                    
    $stmt = $this->conn->prepare($query) or die ("ERRO2 " . $conn->error);
    $stmt->execute() or die ($stmt->error);
    $stmt->bind_result($dt_solicitacao, $dt_finalizacao, $ds_endereco_entrega,
    $ds_endereco_retirada, $vl_pedido, $nm_motorista, $nm_cliente, $ds_situacao);
    $box = array();
    while($stmt->fetch()){
        $box[$nm_cliente] = ["motorista"  => $nm_motorista, "situacao" => $ds_situacao,
                            "preco" => $vl_pedido, "retirada" => $ds_endereco_retirada, 
                            "entrega"   => $ds_endereco_entrega, "dataPedido" => $dt_solicitacao,
                            "dataFinalizacao" => $dt_finalizacao]; 
    }
    $stmt->close();
    echo json_encode($box);
    
   }
}


?>