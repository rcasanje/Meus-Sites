<?php
	clearstatcache();
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
	
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/custom.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title><?php echo $info['nome_prod'] ?> :: Print Ideas</title>
</head>

<body class="gradiente-lightblue">
	<header>
		<?php include("../php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container-fluid">
		<div class="solido-white">
			<h2><?php echo($info['nome_prod']); ?></h2>
			<div class="row">
				<div class="col-md-4">
					<?php printf('<img src="../images/Produtos/%s" alt="Imagem produto: %s">', $info['imagem_prod'], $info['nome_prod']); ?>
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
</body>
</html>