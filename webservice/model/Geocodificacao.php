<?php

class Geocodificacao{
    private $endereco, $latitude, $longitude;
    
    public function geo($endereco){
        $endereco = str_replace(' ', '+', trim($endereco)).",";
        $url = "http://maps.google.com/maps/api/geocode/json?address=$endereco&sensor=false";
        $json   = file_get_contents($url);
        $data = json_decode($json);  
        $this->latitude  = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $this->longitude = $data->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    }
    
    public function geoReverse(){
        
    }
    
    public function lat(){
        return $this->latitude;
    }
    
    public function long(){
        return $this->longitude;
    }
    
    public function end(){
        return $this->end;
    }
}

?>