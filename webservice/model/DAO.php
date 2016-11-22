<?php
require_once "configs/autoloading.php";

abstract class DAO{
    protected $conn;
    
    protected function __construct(){
        $this->conn = DataBase::getConn();
    }
    
    abstract public function inserir($obj);
    abstract public function atualizar($id,$obj);
    abstract public function buscar($id);
    abstract public function deletar($id);

}
 
?>