<?php
include("php/printideas-comandos.php");
include("php/comandos.php");
?>
<html>

<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Acesso | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/ionicons.css">
	<link rel="stylesheet" href="css/AdminLTE.css">
	<link rel="stylesheet" href="css/skin-blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php
			include("php/barra-de-menu-topo.php");
			include("php/barra-de-menu-lateral.php");
		?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Print Ideas<small>tirando suas ideias do papel</small></h1>
				<ol class="breadcrumb">
					<li>
						<a href="index."><i class="fa fa-dashboard"></i>Inicio / </a>
						<a href="#P�gina Atual"><i class=""></i>Acesso</a>
					</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<form>
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">Login</h3>
								</div>
								<div class="box-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" placeholder="Apelido">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
										<input type="password" class="form-control" placeholder="Senha">
									</div>
									<div class="checkbox">
										<label><input type="checkbox" disabled>Permanecer online</label>
									</div>
								</div>
								<div class="box-footer with-border">
									<button class="btn btn-success" type="submit">Entrar</button>
									<button class="btn btn-warning" type="reset">Limpar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-xs-12 col-md-6">
						<form action="php/user-register.php" method="post"	>
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">Informa&ccedil;&otilde;es de acesso</h3>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" placeholder="Apelido" name="apelido">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input id="senha" type="password" class="form-control" placeholder="Senha" name="senha" onInput="verificarSenha();">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input id="csenha" type="password" class="form-control" placeholder="Confirma Senha" name="csenha" onInput="verificarSenha();">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-at"></i></span>
												<input id="email" type="email" class="form-control" placeholder="Email" name="email" onInput="verificarEmail();">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-at"></i></span>
												<input id="cemail" type="email" class="form-control" placeholder="Confirma Email" name="cemail" onInput="verificarEmail();">
											</div>
										</div>
									</div>
									<hr>
									<h4 class="box-title">Informa&ccedil;&otilde;es pessoais</h4>
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">Nome</span>
												<input type="text" class="form-control" placeholder="Nome completo" name="nomecompleto">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
												<input type="email" class="form-control" placeholder="CPF" name="cpf">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
												<input type="email" class="form-control" placeholder="RG" name="rg">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Nascimento</span>
												<input type="date" class="form-control" name="datanascimento">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
												<select class="form-control" name="genero">
													<option>Selecione seu sexo</option>
													<option value="0">Masculino</option>
													<option value="1">Feminino</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Telefone</span>
												<input type="text" class="form-control" placeholder="Telefone" name="telefone">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Celular</span>
												<input type="text" class="form-control" placeholder="Celular" name="celular">
											</div>
										</div>
									</div>
									<hr>
									<h4 class="box-title">Informa&ccedil;&otilde;es de entrega</h4>
									<div class="row">
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="text" class="form-control" placeholder="Estado" name="estado">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="text" class="form-control" placeholder="Munic�pio" name="municipio">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="text" class="form-control" placeholder="Bairro" name="bairro">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="text" class="form-control" placeholder="CEP" name="cep">
											</div>
										</div>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="text" class="form-control" placeholder="Endere�o" name="endereco">
											</div>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-truck"></i></span>
												<input type="number" class="form-control" placeholder="N�mero" name="numero">
											</div>
										</div>
									</div>
									<hr>
									<h4 class="box-title">Termos</h4>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="termsuse">Concordo com os <a href="termsofuse.php">Termos de Uso</a>
													</label>
												</div>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="termprivacy">Concordo com os <a href="termsofprivacy.php">Termos de Privacidade</a>
													</label>
												</div>
												<div class="checkbox">
													<label>
														<input type="checkbox" name="newsletter">Desejo receber no meu email cadastrado not&iacute;cias, newsletter e promo&ccedil;&otilde;es de Print Ideas</a>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer with-border">
									<button class="btn btn-success" id="enviarRegistro" type="submit">Entrar</button>
									<button class="btn btn-warning" type="reset">Limpar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>

		<footer class="main-footer">
			<div class="row">
				<div class="col-md-6">
					<h4>Contatos</h4>
					<ul type="none" style="margin-left: -5%">
						<li>(16) 99626-2085</li>
						<li>(16) 99626-8904</li>
						<li>minhaideiaimpressa@gmail.com</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h4>Parceria</h4>
					<ul type="none" style="margin-left: -5%">
						<li>Parceria 01</li>
						<li>Parceria 02</li>
						<li>Parceria 03</li>
						<li>Seja nosso parceiro</li>
					</ul>
				</div>
			</div>
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0
			</div>
			<strong>Copyright &copy; 2017 <a href="https://adminlte.io">Atual MK</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/printideas-comandos.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fastclick.js"></script>
	<script src="js/adminlte.min.js"></script>
	<script src="js/demo.js"></script>
	<script>
		$( document ).ready( function () {
			$( '.sidebar-menu' ).tree()
		} )
	</script>
</body>

</html>