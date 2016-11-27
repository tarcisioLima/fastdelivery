<?php

require_once 'configs/autoloading.php';
class MapaDAO{
    
    private $conn;
    
    public function __construct(){
        $this->conn = DataBase::getConn();
    }
    
    public function getLatLong(){
     $query = "SELECT nm_motorista, vl_latitude, vl_longitude FROM tb_motorista";
     $stmt  = $this->conn->prepare($query) or die ("ERRO " . $conn->error);
     $stmt->execute() or die ($stmt->error);
     $stmt->bind_result($nome, $lat, $long);
     $box = array();
     while($stmt->fetch()){
        $box[$nome] = ["lat" => $lat, "long" => $long]; 
     }
     $stmt->close();
     echo json_encode($box);
    }
    
}


?>