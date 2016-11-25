<?php
require_once "configs/autoloading.php";

class Localizacao extends DAO{
    
    public function __construct(){parent::__construct();}
     
    public function atualizar($obj,$id){
        $stmt = $this->conn->prepare("UPDATE tb_motorista as m INNER JOIN tb_login as l on m.cd_login = l.cd_login SET vl_latitude = ?,
                                      vl_longitude = ? WHERE m.cd_login = ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("ddi",$obj->lat,$obj->long,$id) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        if($stmt->affected_rows > 0){
            $stmt->close();
            echo $this->res200(1,"Localizacao Atualizada",null);
        } else {
            echo $this->res400(1,"Nao foi possivel atualizar a localizacao");
        }
    }
}
?>