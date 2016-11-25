<?php
require_once "configs/autoloading.php";

abstract class DAO{
    protected $conn;
    private $response;
    
    protected function __construct(){
        $this->conn = DataBase::getConn();
    }
    
    public function res200($cd, $msg, $data){
        $this->response = array ("cd" => $cd, "msg" => $msg, "data" => $data);
        http_response_code(200);
        return json_encode($this->response);
    }
    
    public function res400($cd, $msg){
        $this->response = array ("cd" => $cd, "msg" => $msg);
        http_response_code(400);
        return json_encode($this->response); 
    }
}
 
?>