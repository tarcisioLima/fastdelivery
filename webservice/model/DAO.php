<?php
require_once "configs/autoloading.php";

abstract class DAO{
    protected $conn, $id;
    private $response;
    
    protected function __construct(){
        $this->conn = DataBase::getConn();
    }
    
    abstract public function inserir($obj);
    abstract public function atualizar($id,$obj);
    abstract public function buscar($id);
    abstract public function deletar($id);
    
    public function res200($cd, $msg, $data){
        $this->response = array ("cd" => $cd, "msg" => $msg, "data" => $data);
        http_response_code(200);
        return json_encode($this->response);
    }
    
    public function res400($code, $msg){
        $this->response = array ("cd" => $cd, "msg" => $msg);
        http_response_code(400);
        return json_encode($this->response); 
    }
}
 
?>