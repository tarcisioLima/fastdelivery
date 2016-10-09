<!Doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> Fast Delivery </title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- BOOTSTRAP IMPORTS  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Meus Imports-->
	<link rel="stylesheet" href="view/css/fstyle.css">
	<script type="text/javascript" src="view/js/fcodes.js"></script>
</head>
<body>	
	
		<video poster="" id="login-video" playsinline autoplay muted loop>		
			<source src="view/video/motorcyclecam.mp4" type="video/mp4">
		</video>

		<div class="container">	
			<div class="row" id="logo">		
				<img class="img-responsive .logo" src="view/img/wlogo.png" alt="logotipo fast delivery">
			</div>

			<!-- Formulário -->
			<div class="row">
				<form class="form-horizontal" id="login-form">
					<div class="form-group">
						 <label class="control-label col-sm-2" for="usuario">usuário:</label>
						 <div class="col-sm-8">
						 	<input type="text" class="form-control input-lg input-sm" id="usuario" placeholder="Digite o usuário">
						 </div>
					</div>
					<div class="form-group">
						 <label class="control-label col-sm-2" for="senha">senha:</label>
						 <div class="col-sm-8">
						 	<input type="password" class="form-control input-lg input-sm" id="senha" placeholder="Digite a senha">
						 </div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
					 		<button type="submit" class="btn btn-primary btn-lg">entrar</button>
					 		<button type="reset" class="btn btn-primary btn-lg">limpar</button>
					 	</div>					 	
					</div>
				</form>
			</div>
		</div>

		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> modalzinho</button>

		<!-- Modal de Erro de Login -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Dados Inválidos</h4>
					</div>
					<div class="modal-body">
						Ninguem liga ta ligado
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>					
					</div>
					</div>
			</div>
		</div>
<!-- Fim Modal -->
<?php
			include "router.php";
			$roteador = new Router();
			$roteador->novaRota('/','index');
			$roteador->novaRota('/painelControle','Painel de Controle');
			#$roteador->mapa();
			$roteador->rotear();
 ?>
</body>
</html>

'