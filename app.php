<?php
require_once "configs/autoloading.php";

$token = apache_request_headers()["authorization"];
$met = $_GET["met"];
$classe = ucfirst($_GET["classe"]);
$req = $_SERVER["REQUEST_METHOD"];
$arg = $_GET["arg0"];
$resource = $classe . $req;

if (class_exists($classe)){
    $res = new $resource();
    if($met === "logar" || $met=== "cadastrar")
        isset($token) ? header('HTTP/1.0 400 Bad Request') : (isset($arg) ? $res->$met($arg) : $res->$met());
    else if (isset($token)){
        $auth = new Autenticacao();
        $idAuth = $auth->verificarAcesso($token, strtolower($classe));
        !$idAuth ? header('HTTP/1.0 401 Unauthorized') : (isset($arg) ? $res->$met($arg,$idAuth) : $res->$met($idAuth));
    }else
        header('HTTP/1.0 401 Unauthorized');
}else
    header('HTTP/1.0 404 Not Found');
?>