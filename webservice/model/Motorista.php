<?php
require_once "configs/autoloading.php";

class Motorista extends DAO implements Usuario{
    
    public function __construct(){parent::__construct();}
    
    public function attLogar($obj){
        $stmt = $this->conn->prepare("SELECT m.cd_login FROM tb_motorista AS m  INNER JOIN tb_login AS l ON m.cd_login = l.cd_login 
                                      WHERE l.ds_celular LIKE ? and l.ds_senha LIKE ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ss",$obj->login,$obj->senha) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        $stmt->bind_result($col0);
        if ($stmt->fetch() == 1){
            $id = $col0;
            $stmt->close();
            $jwt = new Autenticacao ($obj->login);
            $token = $jwt->token();
            $stmt = $this->conn->prepare("UPDATE tb_motorista as m INNER JOIN tb_login as l on m.cd_login = l.cd_login SET l.cd_token
                                          = ?, m.cd_status = 1 WHERE m.cd_login = ?") or die($this->res400(4, "Erro interno"));
            $stmt->bind_param("ss",$token,$id) or die($this->res400(5, "Erro interno"));
            $stmt->execute() or die(res400(6,"Erro interno"));
            if($stmt->affected_rows == 2){
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
        $stmt = $this->conn->prepare("UPDATE tb_motorista as m INNER JOIN tb_login as l on m.cd_login = l.cd_login SET l.cd_token
                                      = null, m.cd_status = 4 WHERE m.cd_login = ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("i",$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        if($stmt->affected_rows == 2){
            $stmt->close();
            echo $this->res200(1,"Deslogado",null);
        } else {
            echo $this->res400(1,"Nao foi possível deslogar");
        }
    }
    
}
?>