<?php

require_once 'configs/autoloading.php';

class MapaController{
    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
             include "webapp/view/mapa.html";
        }else{
             header("HTTP/1.0 404 Not Found");
        }
    }
    
   
    
}


?>