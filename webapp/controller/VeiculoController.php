<?php

require_once 'configs/autoloading.php';

class VeiculoController{
    public function __construct(){
        $_SERVER['REQUEST_METHOD'] == 'GET' ? include "webapp/view/veiculo.html"
                                            : null;
       
    }
}


?>