<!Doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> Veiculo </title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- BOOTSTRAP IMPORTS  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Meus Imports -->
	<link rel="stylesheet" href="view/css/painel.css">
	<script type="text/javascript" src="view/js/fcodes.js"></script>
</head>
<body>
    <!-- Menu de Navegação -->
    <nav class="nav navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="painelControle.php">
                    <img alt="Logo" class="img-responsive" src="view/img/minilogo.png">
                </a>
            </div>
            <ul class="nav navbar-nav">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" 
              role="button" ria-haspopup="true" aria-expanded="false">Painel de Controle
              <span class="glyphicon glyphicon-cog"></span></a>
                   <ul class="dropdown-menu">
                          <li><a href="viewMotorista.php"><span class="glyphicon glyphicon-user"></span>
                          Cadastrar Motorista</a></li>
                          <li><a href="viewVeiculo.php"><span class="glyphicon glyphicon-road"></span>
                          Cadastrar Veiculo</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-usd"></span>
                          Definir Taxa de Serviço</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span>
                          Visualizar Pedidos</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-search"></span>
                          Usuários</a></li>
                  </ul>
              </li>
              
              <li><a href="#">Mapa
              <span class="glyphicon glyphicon-map-marker" ></span></a></li> 
              <li><a href="index.php">Sair 
                  <span class="glyphicon glyphicon-log-out"></span></span></a></li> 
            </ul>
        </div>
    </nav>
        <section class="container panel panel-default">
       <div class="panel-heading"> Cadastrar Motorista </div>
       <div class="panel-body">
           
        </div>
    </section>
    
    
</body>
</html>