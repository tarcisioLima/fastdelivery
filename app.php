<?php
require_once "configs/autoloading.php";

$token = apache_request_headers()["authorization"];
$met = $_GET["met"];
$classe = ucfirst($_GET["classe"] . $_SERVER["REQUEST_METHOD"]);

if (class_exists($classe)){
    $res = new $classe();
    if($met === "login" || $met=== "cadastro")
        isset($token) ? header('HTTP/1.0 400 Bad Request') : (isset($_GET["arg0"]) ? $res->$met() : $res->$met());
    else if (isset($token))
        Autenticacao::verificarAcesso($token, strtolower($_GET["classe"])) ? (isset($_GET["arg0"]) ? $res->$met() : $res->$met()) : header('HTTP/1.0 401 Unauthorized');
    else
        header('HTTP/1.0 401 Unauthorized');
}else
    header('HTTP/1.0 400 Bad Request');
?>