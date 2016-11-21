<?php

spl_autoload_register(function ($class){
    
    # Novos diretórios devem ser adicionados aqui 
    $diretorios = ["configs/", "model/", "view/", "controller/", "public/"];
    
    foreach($diretorios as $pasta){
        if(file_exists($pasta . $class . ".php")){
            require $pasta . $class . ".php";
            break;
        }
    }
});
    

?>