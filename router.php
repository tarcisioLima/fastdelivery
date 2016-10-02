<?php
class Router {
    private $rotas, $acoes;

    public function __construct(){
        $this->rotas = array();
        $this->acoes = array();
    }

    public function novaRota($url, $acao){
        $this->rotas[] = trim($url,'/');
        $this->acoes[] = $acao;
    }

    public function rotear(){
        $url = $_GET['url'];
        $key = array_search($url, $this->rotas);
        
        if($key === false){ 
            header("location: 404.php");
        }else {
            #echo new $this->acoes[$chave]();
        }
    }

    public function mapa(){
        echo '<pre>';
        print_r($this->rotas);
        print_r($this->acoes);
    }


}

?>