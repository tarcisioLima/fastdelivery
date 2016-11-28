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
            $jwt = new Autenticacao($obj->login);
            $jwt->darAcesso($id);
        } else
            echo $this->res400(3,"Autenticacao invalida",null);
    }
    
    public function attDeslogar($id){
        $jwt = new Autenticacao();
        $jwt->retirarAcesso($id); 
    }
    
    public function getId($id){
        $stmt = $this->conn->prepare("SELECT cd_cliente FROM tb_cliente where cd_login = ?") or die($this->res400(4, "Erro interno"));
        $stmt->bind_param("i",$id) or die($this->res400(5, "Erro interno"));
        $stmt->execute() or die($this->res400(6, "Erro interno"));
        $stmt->bind_result($col0);
        $stmt->fetch();
        $idC = $col0;
        $stmt->close();
        return $idC;
    }

}

?>