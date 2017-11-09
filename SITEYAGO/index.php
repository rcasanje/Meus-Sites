<?php
include("php/printideas-comandos.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/ionicons.css">
	<link rel="stylesheet" href="css/AdminLTE.css">
	<link rel="stylesheet" href="css/skin-blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="">
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
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="jumbotron" style="background-color: lightgreen">
									<h1>Imagem empresa</h1>
									<p>...</p>
									<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
								</div>
								<div class="jumbotron" style="background-color: lightblue">
									<h1>Imagem design</h1>
									<p>...</p>
									<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="jumbotron" style="background-color: lightcoral">
									<h1>Imagem festa</h1>
									<p>...</p>
									<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
								</div>
								<div class="jumbotron" style="background-color: lightyellow">
									<h1>Imagem casa</h1>
									<p>...</p>
									<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
								</div>
							</div>
						</div>
						<div class="row">
							<?php
								for($i = 0; $i<=3; $i++){
									echo montarVisualizacaoProduto('images/Produtos/default.png', "Adesivo", "200x200mm", 1, 100, "33.90");
								}
							?>
						</div>
					</div>
					<div class="col-md-3">
						<div>
							<p>"Aqui ainda nao sei"</p>
						</div>
						<div>
							<div class="text-center">
								<a class="btn btn-social-icon btn-dropbox"><i class="fa fa-dropbox"></i></a>
								<a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
								<a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
								<a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
								<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
								<a class="btn btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
								<a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
							</div>
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