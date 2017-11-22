<?php
include("php/printideas-comandos.php");
include("php/comandos.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio | Print Ideas</title>
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
						<a href="#"><i class="fa fa-dashboard"></i>Inicio / </a>
						<a href="#"><i class=""></i>Acesso</a>
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
						<form>
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">Informações de acesso</h3>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" placeholder="Apelido">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="password" class="form-control" placeholder="Senha">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="password" class="form-control" placeholder="Confirma Senha">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="Email">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="Confirma Email">
											</div>
										</div>
									</div>
									<hr>
									<h4 class="box-title">Informações pessoais</h4>
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon">Nome</span>
												<input type="text" class="form-control" placeholder="Nome completo">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="CPF">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="RG">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Data de nascimento</span>
												<input type="date" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-genderless"></i></span>
												<select class="form-control">
													<option>Selecione</option>
													<option>Masculino</option>
													<option>Feminino</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Telefone</span>
												<input type="text" class="form-control" placeholder="Telefone">
											</div>
										</div>
										<div class="col-md-6">
											<div class="input-group">
												<span class="input-group-addon">Celular</span>
												<input type="text" class="form-control" placeholder="Celular">
											</div>
										</div>
									</div>
									<hr>
									<h4 class="box-title">Informações de entrega</h4>
									<div class="row">
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="Endereço">
											</div>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
												<input type="email" class="form-control" placeholder="Número">
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
														<input type="checkbox">Concordo com os <a href="#">Termos de Uso</a>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-group">
												<label><input type="checkbox" class="form-control"> Concordo com os <a href="#">Termos de Privacidade</a></label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-group">
												<label><input type="checkbox" class="form-control"> Desejo receber no meu email cadastrado notícias, newsletter e promoções de Print Ideas</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="input-group">
												<label><input type="checkbox" class="form-control"> Desejo recever email com notícias, newsletter e promoções de Print Ideas</label>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer with-border">
									<button class="btn btn-success" type="submit">Entrar</button>
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