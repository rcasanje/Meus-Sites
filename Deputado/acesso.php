<html>
<head>
	<?php
		include("php/funcoes.php");
		include("php/zona-eleitoral.php")
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gente cuidando de gente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>
	<?php include("php/barra-de-menu.php"); ?>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<h4>Registro</h4>
				<?php
					if(!isset($_SESSION)) session_start();
					/*if(isset($_SESSION['User']['Erro'])){ 
						$errorID = $_SESSION['User']['Erro'];
						if($_SESSION['User']['Erro'] != 0){
							printf('<div class="alert alert-danger" role="alert">%s</div>', erroRegistro($errorID));
						}
					}*/
				?>
				<form method="post" action="php/adicionar-cliente-stand.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
				<?php 
					if(isset($_SESSION['Cliente']['Register']) and ($_SESSION['Cliente']['Register']) != 0){
						printf('<div class="alert alert-danger" role="alert">%s</div>', erroRegistroCliente($_SESSION['Cliente']['Register']));
						$_SESSION['Cliente']['Register'] = 0;
					}
				?>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nome" pattern="{3,}" autocomplete="off" placeholder="Ex.: Carlos Alberto da Silva" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação mãe<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nomeMae" pattern="{3,}" autocomplete="off" placeholder="Ex.: Maria Julia Carvalho" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação pai</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="nomePai" pattern="{3,}" autocomplete="off" placeholder="Ex.: João Santos Carvalho" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nascimento<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="dataNasc" min="1900-01-01" max="2020-12-31" autocomplete="off" placeholder="Ex.: 1822/09/07" oninvalid="setCustomValidity('Dados inseridos incorretamente. Ano/Mês/Dia (AAAA/MM/DD)')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Municipio<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control" aria-describedby="basic-addon1" list="listMunicipio" name="municipio" placeholder="Selecione" onfocus="">
						<datalist id="listMunicipio">
							<?php echo(zonaMunicipio()); ?>
						</datalist>	
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control" aria-describedby="basic-addon1" list="listBairro" name="bairro" placeholder="Selecione" onfocus="">
						<datalist id="listBairro">
							<?php echo(zonaBairro()); ?>
						</datalist>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Endereço</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="rua" pattern="{3,}" autocomplete="off" placeholder="Ex.: Rua Campo grande n 330" oninvalid="setCustomValidity('Insira ao menos 3 caractres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefone/Celular</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="tel" id="first-name" class="form-control col-md-7 col-xs-12" name="telefone" pattern="[0-9]{8,11}$" autocomplete="off" placeholder="Ex.: 2123652103" oninvalid="setCustomValidity('Insira um telefone/celular de 8 a 11 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" id="first-name" class="form-control col-md-7 col-xs-12" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" placeholder="Ex.: exemplo@provedor.com" oninvalid="setCustomValidity('Insira um tipo de e-mail válido')" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código de acesso <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="codigoA" autocomplete="off">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" class="btn btn-success">Enviar</button>
						<button class="btn btn-info" type="reset">Limpar</button>
						<button class="btn btn-warning" type="button" onClick="cancelar();">Cancelar</button>
					</div>
				</div>
			</form>
			</div>
			<div class="col-xs-6"></div>	
		</div>
	</div>
	<footer class="panel-footer nav navbar-fixed-bottom">
		<?php include("php/rodape.php") ?>
	</footer>
</body>
</html>