<?php
require_once "../../configs/autoloading.php";

class Cliente extends DAO{
    
    public function __construct(){parent::__construct();}
    
    public function inserir($obj){
        $stmt = $this->conn->prepare("INSERT INTO tb_login(ds_celular,ds_senha) VALUES(?,?)") or die("2".$conn->error);
        $stmt->bind_param("ss",$obj->login,$obj->senha) or die("3".$stmt->error);
        $stmt->execute() or die("4".$stmt->error);
        if($stmt->errorno == 1062){
            echo "Usuario já existe";
        } else {
            echo "Cadastrado, boy";
        }
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