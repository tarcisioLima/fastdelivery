<?php

public class Geocodificacao{
    private $latitude, $longitude, $endereco;
    
    public function __construct($endereco){
        
        $this->endereco = $endereco;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    
    public function lat(){
        return $this->latitude;
    }
    
    public function long(){
        return $this->longitude;
    }
}

?>