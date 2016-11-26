<?php
require_once "configs/autoloading.php";

class Cliente extends DAO implements Usuario{
    
    public function __construct(){parent::__construct();}
    
    public function inserir($obj){
        $stmt = $this->conn->prepare("INSERT INTO tb_login(ds_celular,ds_senha) VALUES(?,?)") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ss",$obj->telefone,$obj->senha) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($stmt->errno == 1062 ? $this->res400(3,"Usuario ja existe") : "");
        $idL = $stmt->insert_id;
        $stmt->close();
        $stmt = $this->conn->prepare("INSERT INTO tb_cliente(nm_cliente,ds_comprovante,cd_login) VALUES(?,?,?)") or die($this->res400(4, "Erro interno"));
        $stmt->bind_param("ssi",$obj->nome,$obj->comprovante,$idL) or die($this->res400(5, "Erro interno"));
        $stmt->execute() or die($this->res400(6, "Erro interno"));
        $stmt->close();
        echo $this->res200(1,"Cadastrado com sucesso",null);
    }
    
    public function attLogar($obj){
        $stmt = $this->conn->prepare("SELECT c.cd_login FROM tb_cliente AS c INNER JOIN tb_login AS l ON c.cd_login = l.cd_login 
                                      WHERE l.ds_celular LIKE ? and l.ds_senha LIKE ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ss",$obj->login,$obj->senha) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        $stmt->bind_result($col0);
        if ($stmt->fetch() == 1){
            $id = $col0;
            $stmt->close();
            $jwt = new Autenticacao ($obj->login);
            $token = $jwt->token();
            $stmt = $this->conn->prepare("UPDATE tb_login SET cd_token = ? WHERE cd_login LIKE ? ") or die($this->res400(4, "Erro interno"));
            $stmt->bind_param("si",$token,$id) or die($this->res400(5, "Erro interno"));
            $stmt->execute() or die(res400(6,"Erro interno"));
            if($stmt->affected_rows == 1){
                $stmt->close(); 
                header('Authorization: '. $token);
                echo $this->res200(1,"Logado",null);
            } else {
                echo $this->res200(2,"Erro ao completar autenticacao",null);
            }
        } else {
            echo $this->res400(3,"Autenticacao invalida",null);
        }
    }
    
    public function attDeslogar($id){
        $stmt = $this->conn->prepare("UPDATE tb_login SET cd_token = null where cd_login = ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("i",$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        if($stmt->affected_rows == 1){
            $stmt->close();
            echo $this->res200(1,"Deslogado",null);
        } else {
            echo $this->res400(1,"Nao foi possível deslogar");
        }
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