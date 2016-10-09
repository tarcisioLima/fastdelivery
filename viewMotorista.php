<!Doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> Motorista </title>	
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
         <!-- Conteúdo Cadastrar Motorista 
        <nav class="row-fluid pnav">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
              <a data-toggle="tab"  href="#CADASTRO-MOTORISTA">Cadastrar Motorista
              <span class="glyphicon glyphicon-user"></span></a></li>
              <li role="presentation">
              <a data-toggle="tab"  href="#CADASTRO-VEICULO">Cadastrar Veiculo
              <span class="glyphicon glyphicon-road"></span></a></li>
              <li role="presentation">
              <a data-toggle="tab" href="#">Definir Taxa de Serviço
              <span class="glyphicon glyphicon-usd"></span></a></li>
              <li role="presentation">
              <a data-toggle="tab" href="#">Visualizar Pedidos
              <span class="glyphicon glyphicon-eye-open"></span></a></li>
              <li role="presentation">
              <a data-toggle="tab" href="#">Usuários
              <span class="glyphicon glyphicon-search"></span></a></li>
            </ul>
        </nav>-->
        
        <div class="row-fluid">
            <!-- Formulario Cadastro Motorista -->
            <form class="form-horizontal">
                <div class="form-group">
					<label class="control-label col-sm-1" for="nome">Nome</label>
					<div class="col-sm-5">
					 	<input type="text" class="form-control" id="nome" placeholder="Digite o nome">
					 </div>
					</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="email">E-mail</label>
				    <div class="col-sm-5">
				        <input type="email" class="form-control" id="email" placeholder="Digite o e-mail">
				    </div>
				</div>	
				<div class="form-group">
				    <label class="control-label col-sm-1">Sexo</label>
				    <div class="col-sm-5">
        				<label class="radio-inline"><input type="radio" name="sexo">Masculino</label>
                        <label class="radio-inline"><input type="radio" name="sexo">Feminino</label>
                    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="telefone">Telefone</label>
				    <div class="col-sm-5">
				        <input type="tel" class="form-control" id="telefone" placeholder="Digite o telefone">
				    </div>
				</div>	
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="endereco">Endereço</label>
				    <div class="col-sm-5">
				        <input type="text" class="form-control" id="endereco" placeholder="Digite o endereco">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="cidade">Cidade</label>
				    <div class="col-sm-5">
				        <input type="text" class="form-control" id="cidade" placeholder="Digite a cidade">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="estado">Estado</label>
				    <div class="col-sm-5">
				        <select class="form-control" id="estado">
				            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espirito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
				        </select>
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="bairro">Bairro</label>
				    <div class="col-sm-5">
				        <input type="text" class="form-control" id="bairro" placeholder="Digite o Bairro">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="cep">CEP</label>
				    <div class="col-sm-5">
				        <input type="text" class="form-control" id="cep" placeholder="Digite o CEP">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="nascimento">Nascimento</label>
				    <div class="col-sm-5">
				        <input type="date" class="form-control" id="nascimento" placeholder="Digite a Data de Nascimento">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="login">Loguin (Telefone)</label>
				    <div class="col-sm-5">
				        <input type="text" class="form-control" id="login" placeholder="Loguin para acesso ao aplicativo.">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="senha">Senha</label>
				    <div class="col-sm-5">
				        <input type="password" class="form-control" id="senha" placeholder="Digite a senha">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="rsenha">Repita</label>
				    <div class="col-sm-5">
				        <input type="password" class="form-control" id="rsenha" placeholder="A senha deve ser repetida">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="control-label col-sm-1" for="veiculo">Veiculo</label>
				    <div class="col-sm-5">
				        <select class="form-control" id="veiculo">
				            <option value="">Selecione o Veiculo</option>
				            <option value="1">Corsiha Amarelo</option>
				            <option value="2">Fusquinha</option>
				            <option value="3">Golfe Sapão</option>
				        </select>
				    </div>
				</div>
				
			    <div class="form-group"> 
                    <div class="col-sm-offset-1 col-sm-5">
                      <button type="submit" class="btn btn-primary">enviar
                      <span class="glyphicon glyphicon-send"></span></button>
                      <button type="reset" class="btn btn-danger">limpar
                      <span class="glyphicon glyphicon-erase"></span></button>
                    </div>
                </div>
            </form>
        </div></div>
            <!-- Cadastrar Veiculo 
            <div class="row-fluid tab-pane fade" id="CADASTRO-VEICULO">
                <h3> cadastrar veiculo</h3>
                <p> teste da area </p>
            </div>-->
    </section>
  
</body>
</html>
