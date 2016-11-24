<?php
	require_once "configs/autoloading.php";
	
	$router = new Router();
	
	# Novas Rotas 
	$routes = [
		"/"			      => "LoginController",
		"/motorista"      => "MotoristaController",
		"/veiculo"  	  => "VeiculoController",
		"/veiculo/listv"  => "ListVeiculoController"
	];
	
	foreach($routes as $url => $controller){
		$router->novaRota($url, $controller);
	}
	
	$router->rotear();
	
	
 ?>