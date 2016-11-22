<?php
require_once "../../configs/autoloading";

abstract class DAO{
    protected $conn;
    
    protected function __construct(){
        $this->conn = DataBase::getConn("127.0.0.1", "gmoraiz", "", "db_fastdelivery", 3306);
    }
    
    abstract public function inserir($obj);
    abstract public function atualizar($id,$obj);
    abstract public function buscar($id);
    abstract public function deletar($id);

}
 
?>