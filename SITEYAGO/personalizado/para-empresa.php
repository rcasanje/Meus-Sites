<?php
include("../php/printideas-comandos.php");
include("../php/comandos.php");
?>
<html>

<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Para sua empresa | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/ionicons.css">
	<link rel="stylesheet" href="../css/AdminLTE.css">
	<link rel="stylesheet" href="../css/skin-blue.css">
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
				<h1>Print Ideas<small>tirando suas ideias do papel</small></h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
				</ol>
			</section>
			<section class="content">
				<?php
				$limite = 30;
				$dados = "SELECT codigo_prod, imagem_prod, nome_prod, tamanho_prod, prazo_prod, qntd_prod, preco_prod FROM produtos ORDER BY RAND() LIMIT $limite";
							
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

						echo montarVisualizacaoProduto($codigoProd, $abspath."images/Produtos/default3.png", $nomeProd, $prazo, $preco, $qntd);
					}
				} else{
					printf('Não foi possivel carregar os produtos. Erro MYSQL: %s', mysqli_error($conn));
				}
				?>
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

</html>