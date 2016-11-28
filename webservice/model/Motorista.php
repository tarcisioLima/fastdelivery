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
            $jwt = new Autenticacao($obj->login);
            $jwt->darAcesso($id);
        } else {
            echo $this->res400(3,"Autenticacao invalida",null);
        }
    }
    
    public function attDeslogar($id){
        $jwt = new Autenticacao();
        $jwt->retirarAcesso($id); 
    }
    
}
?>