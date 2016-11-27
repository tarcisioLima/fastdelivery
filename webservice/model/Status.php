<?php
require_once "configs/autoloading.php";

class Status extends DAO{
	    
    public function __construct(){parent::__construct();}
    
    public function atualizar($id,$status){
        $stmt = $this->conn->prepare("UPDATE tb_motorista  SET cd_status = ? WHERE cd_login LIKE ? ") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ii", $status,$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die(res400(3,"Erro interno"));
        $stmt->close();
    }
    
    public function buscar($id,$status){
        $stmt = $this->conn->prepare("SELECT cd_motorista FROM tb_motorista where cd_status = ? and 
    	                              cd_motorista = ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ii",$status,$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        if($stmt->fetch() == 1)
            return true;
        else
            return false;
    }
     
}

?>