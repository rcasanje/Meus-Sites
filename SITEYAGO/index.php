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
					<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
				</ol>
				
			</section>
			<section class="content">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="%s" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="%s"></li>
						<li data-target="#carousel-example-generic" data-slide-to="%s"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<p align="center">
								<img src="images/Produtos/size.png" alt="nomeProduto">
							</p>
						</div><div class="item ">
							<p align="center">
								<img src="images/Produtos/size.png" alt="nomeProduto">
							</p>
						</div><div class="item ">
							<p align="center">
								<img src="images/Produtos/size.png" alt="nomeProduto">
							</p>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide	="prev">
						<span class="fa fa-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="fa fa-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="jumbotron bg-img-fit" style="background-image: url(images/Para-empresa.jpg); background-size: 100% 100%;">	
									<div style="color: white; padding: 10px;">
										<h1>EMPRESA</h1>
										<p><b>Para sua empresa ficar com sua cara</b></p>
										<p><a class="btn btn-primary btn-lg" href="#" role="button">Veja mais</a></p>
									</div>
								</div>
								<div class="jumbotron bg-img-fit" style="background-image: url(images/Para-festa.jpg); background-size: 100% 100%;">	
									<div style="color: white; padding: 10px;">
										<h1>FESTA</h1>
										<p><b>Para dar aquela festa com estilo</b></p>
										<p><a class="btn btn-primary btn-lg" href="#" role="button">Veja mais</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="jumbotron bg-img-fit" style="background-image: url(images/Para-design.jpg); background-size: 100% 100%;">	
									<div style="color: white; padding: 10px;">
										<h1>DESIGN</h1>
										<p><b>Para o seu design pessoal</b></p>
										<p><a class="btn btn-primary btn-lg" href="#" role="button">Veja mais</a></p>
									</div>
								</div>
								<div class="jumbotron bg-img-fit" style="background-image: url(images/Para-casa.jpg); background-size: 100% 100%;">	
									<div style="color: white; padding: 10px;">
										<h1>CASA</h1>
										<p><b>Para embelezar sua casa</b></p>
										<p><a class="btn btn-primary btn-lg" href="#" role="button">Veja mais</a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<?php
							$dados = "SELECT codigo_prod, imagem_prod, nome_prod, tamanho_prod, prazo_prod, qntd_prod, preco_prod FROM produtos ORDER BY RAND() LIMIT 4";
							
							if($query = mysqli_query($conn, $dados)){
								while($info = mysqli_fetch_array($query, MYSQL_ASSOC)){
									$codigoProd = $info['codigo_prod'];
									$nomeImg = $info['imagem_prod'];
									$nomeProd = $info['nome_prod'];
									$tamanhoProd = $info['tamanho_prod'];
									$prazo = $info['prazo_prod'];
									$qntd = $info['qntd_prod'];
									$preco = $info['preco_prod'];
									
									$caminhoImg = explode(';', $nomeImg);
									
									echo montarVisualizacaoProduto($codigoProd, $abspath."images/Produtos/".$caminhoImg[0], $nomeProd, $prazo, $preco, $qntd, $abspath);
								}
							} else{
								printf('Não foi possivel carregar os produtos. Erro MYSQL: %s', mysqli_error($conn));
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