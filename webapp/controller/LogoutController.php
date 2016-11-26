<?php 
require_once 'configs/autoloading.php';

    class LogoutController extends Sessao{
        
        public function __construct(){
            if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                $this->destruirSessao();
            }else{
                header("HTTP/1.0 404 Not Found");
            } 
        }
        
    }

?>