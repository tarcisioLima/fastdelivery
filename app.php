<?php

require_once "configs/autoloading.php";

$server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];
echo $server . "<br>";
echo $endereco . "<br>";
echo $getcwd . "<br>";

$classe = ucfirst($_GET["classe"] . $_SERVER["REQUEST_METHOD"]);
$res = new $classe();
$met = $_GET["met"];

isset($_GET["arg0"]) ? $res->$met($_GET["arg0"]) : $res->$met();

?>