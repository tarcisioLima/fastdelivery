<?php
require_once "configs/autoloading.php";

class Cliente extends DAO{
    
    public function __construct(){parent::__construct();}
    
    public function inserir($obj){
        $stmt = $this->conn->prepare("INSERT INTO tb_login(ds_celular,ds_senha) VALUES(?,?)") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ss",$obj->telefone,$obj->senha) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($stmt->errno == 
        ? $this->res400(3,"Usuario ja existe") : "");
        $stmt2 = $this->conn->prepare("INSERT INTO tb_cliente(nm_cliente,ds_comprovante,cd_login) VALUES(?,?,?)") or die($this->res400(4, "Erro interno"));
        $stmt2->bind_param("ssi",$obj->nome,$obj->comprovante,$stmt->insert_id) or die($this->res400(5, "Erro interno"));
        $stmt2->execute() or die($this->res400(6, "Erro interno"));
        echo $this->res200(1,"Cadastrado com sucesso",null);
    }
    
    public function buscar($id){
        
    }
    
    public function atualizar($id, $obj){
        
    }
    
    public function deletar($id){
        
    }
    
    /*public function getNome($id=1){
        $st = $this->conn->prepare("SELECT * FROM tb_teste WHERE id=?") or die("1".$conn->error);
        $st->bind_param("i",$id) or die("3".$stmt->error);
        $st->execute() or die("2".$st->error);
        $st->bind_result($col0,$col1);
        $st->fetch();
        return $col1;
    }
    
    public function deletar($id=1){
        $st = $this->conn->prepare("DELETE FROM tb_teste WHERE cd_login=?") or die("1".$conn->error);
        $st->bind_param("i",$id) or die("3".$stmt->error);
        $st->execute() or die("2".$st->error);
        echo "DELETOU";
    }
    
    public function atualizar($id=0, $obj){
        $st = $this->conn->prepare("UPDATE tb_teste SET nm_login = ? WHERE cd_login=?") or die("1".$conn->error);
        $st->bind_param("si",$obj->nome, $id) or die("3".$stmt->error);
        $st->execute() or die("2".$st->error);
        echo "ATUALIZOU";
    }
    
    public function listar(){
        $st = $this->conn->prepare("SELECT * FROM tb_teste") or die("1".$conn->error);
        $st->execute() or die("2".$st->error);
        $st->bind_result($col0,$col1);
        while($st->fetch()){
            echo "$col0 -> $col1 <br>";
        }
    }*/
}

?>