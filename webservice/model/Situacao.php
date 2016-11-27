<?php
require_once "configs/autoloading.php";

class Situacao extends DAO{
	    
    public function __construct(){parent::__construct();}
    
    public function atualizar($id,$situacao){
        $stmt = $this->conn->prepare("UPDATE tb_pedido  SET cd_situacao = ? WHERE cd_pedido LIKE ? ") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ii", $situacao,$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die(res400(3,"Erro interno"));
        $stmt->close();
    }
    
}