<?php

# Definições de constantes:

define ('IP_CON'    , '127.0.0.1');
define ('LOG_CON'   , 'gmoraiz');
define ('PASSW_CON' , '');
define ('DB_CON'    , 'db_fastdelivery');
define ('DOOR_CON'  , 3306);

class DataBase{
    public static function getConn(){
        return mysqli_connect(IP_CON, LOG_CON, PASSW_CON, DB_CON, DOOR_CON);
    }
}
?>