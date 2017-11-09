<?php
	include("../php/conexoes/user-access.php");
	$produto = $_GET['codigo'];

	$dados = "SELECT * FROM produtos WHERE codigo_prod='$produto'";

	//printf('<div>Página selecionada: %s<br> Dados: %s</div>', $produto, $dados);
	if($query = mysqli_query($conn, $dados)){
		$info = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}
?>
<html>
<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/ionicons.css">
	<link rel="stylesheet" href="../css/AdminLTE.css">
	<link rel="stylesheet" href="../css/skin-blue.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php
			include("../php/barra-de-menu-topo.php");
			include("../php/barra-de-menu-lateral.php");
		?>
		<div class="content-wrapper">
			<section class="content-header">
				<h2><?php echo($info['nome_prod']); ?><small></small></h2>
				<ol class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li><a href="#">Produtos</a></li>
					<li><?php echo($info['nome_prod']); ?></li>
				</ol>
			</section>
			<section class="content">
				<div class="box">
					<div class="box-header">
						
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
										<div class="item active">
											<p align="center"><img src="../images/Produtos/default.png" alt="..."></p>
											<div class="carousel-caption">...</div>
										</div>
										<div class="item">
											<p align="center"><img src="../images/Produtos/default.png" alt="..."></p>
											<div class="carousel-caption">...</div>
										</div>
										<div class="item">
											<p align="center"><img src="../images/Produtos/default.png" alt="..."></p>
											<div class="carousel-caption">...</div>
										</div>
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
										<span class="fa fa-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
										<span class="fa fa-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<label class="font size-18">Rafael Casanje Bertolino da Costa</label>
								<hr>
								<label class="font size-18" style="color: green"><i class="fa fa-check"></i> PRODUTO DISPON&Iacute;VEL</label>
								<hr>
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<div>
											<label class="font size-18">
												<i class="fa fa-credit-card"></i> 
												<?php echo($info['preco_prod']); ?><br>
												<?php echo("R$ ".substr($info['preco_prod'], 2)/10)."0"; ?> sem juros no cart&atilde;o
											</label>
										</div>
										<div>
											<label class="font size-18">
												<i class="fa fa-barcode"></i> 
												<?php echo($info['preco_prod']); ?><br>
											</label>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<button class="font size-18 btn btn-block btn-success" type="button"><i class="fa fa-cart-plus"></i> Comprar</button>
										<br>
										<div class="font size-18">
											<p><i class="fa fa-truck"> Calcular frete e prazo<input class="form-control" type="text"></i></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div id="especs">
							<label style="color: red">ESPECIFICAÇÕES</label>
							<p>Marca<br>Modelo<br>Tipo de impressao<br>Tamanho<br>Tipo do Papel</p>
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
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/fastclick.js"></script>
	<script src="../js/adminlte.min.js"></script>
	<script src="../js/demo.js"></script>
	<script>
		$( document ).ready( function () {
			$( '.sidebar-menu' ).tree()
		} )
	</script>
</body>

<!-- <body class="gradiente-lightblue">
	<header>
		<?php //include("../php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container-fluid">
		<div class="solido-white">
			<h2><?php //echo($info['nome_prod']); ?></h2>
			<div class="row">
				<div class="col-md-4">
					<?php //printf('<img src="../images/Produtos/%s" alt="Imagem produto: %s">', $info['imagem_prod'], $info['nome_prod']); ?>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<p>Pagar com:</p>
					<button class="btn btn-success">Pagseguro</button>
					<button class="btn btn-primary">Paypal</button>
				</div>
			</div>
		</div>
	</div>
</body> -->
</html>