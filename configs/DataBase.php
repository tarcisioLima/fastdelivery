<?php
class Connection{
    public static function getConn($ip, $login, $pass, $db, $porta){
        return mysqli_connect($ip, $login, $pass, $db, $porta);        
    }
}
?>