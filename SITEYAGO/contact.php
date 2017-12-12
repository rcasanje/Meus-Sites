<?php
include("php/printideas-comandos.php");
include("php/comandos.php");
?>
<html>

<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact page | Print Ideas</title>
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
					<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<form action="php/ticket-enviar.php" method="post">
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">Ticket</h3>
								</div>
								<div class="box-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" placeholder="Seu nome" name="nome" required>
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" class="form-control" placeholder="Nome de usu&aacute;rio (caso j&aacute; seja cadastrado)" name="usuario">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select class="form-control" name="problem" required>
											<option>Selecione</option>
											<option value="critica">Cr&iacute;tica</option>
											<option value="duvida">D&uacute;vida</option>
											<option value="opiniao">Opini&atilde;o</option>
										</select>
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-edit"></i></span>
										<textarea class="form-control" cols="100%" rows="10" name="descricao" required></textarea>
									</div>
								</div>
								<div class="box-footer">
									<button class="btn btn-success" type="submit">Enviar ticket</button>
									<button class="btn btn-warning" type="reset">Limpar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">Informa&ccedil;&otilde;es</h3>
							</div>
							<div class="box-body">
								<p>Hor&aacute;rio de atendimento >> 09:00 at&eacute; 20:00</p>
								<p>Tempo de resposta:
									<ul>
										<li>Via ticket: em at&eacute; 1 hora em hor&aacute;rio de funcionamento</li>
										<li>Via email: em at&eacute; 24 horas</li>
									</ul>
								</p>
							</div>
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