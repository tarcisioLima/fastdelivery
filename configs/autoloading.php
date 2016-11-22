<?php

spl_autoload_register(function ($class){
    
    # Novos diretórios devem ser adicionados aqui 
   $diretorios = ["configs/", "webapp/model/", "webapp/view/", 
                   "webapp/controller/", "webapp/public/", "webservice/",
                   "webservice/model/","webservice/controller/", "../../configs/",
                   "../../webapp/", "../../webservice/", "../configs/","../webservice/",
                   "../webservice/model/", "../webservice/controller/", "../controller/", "../model/"];
    
    foreach($diretorios as $pasta){
        if(file_exists($pasta . $class . ".php")){
            require $pasta . $class . ".php";
            break;
        }
    }
});
    

?>