<?php
require_once "..configs/autoloading.php";

$classe = ucfirst($_GET["classe"] . $_SERVER["REQUEST_METHOD"]);
$res = new $classe();
$met = $_GET["met"];

isset($_GET["arg0"]) ? $res->$met($_GET["arg0"]) : $res->$met();

?>