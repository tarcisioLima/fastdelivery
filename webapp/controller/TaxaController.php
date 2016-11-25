<?php

require_once 'configs/autoloading.php';

class TaxaController{
    public function __construct(){
        $_SERVER['REQUEST_METHOD'] == 'GET' ? include "webapp/view/taxa.html"
                                            : null ;
    }
    
    
}


?>