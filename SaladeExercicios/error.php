<!doctype html>
<html>
<head>
<?php
include("php/verificar.php");
if(!isset($_SESSION)) session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Error :: Sala de Exercícios</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body class="site">
<header>
  <?php include("php/barra_de_menu.php"); ?>
</header>
<div class="container" id="principal">
	<?php 
		$erro = $_GET['error'];
		
		switch($erro){
			case 01:
				printf('<h2><span class="label label-warning">Você não tem acesso a área de postagens do site. </span> <p style="margin-top:10px"><span class="label label-warning">Você não tem permissão para continuar, caso seja um equívoco mande um ticket para o suporte.</span></h2>');
				break;
			case 02:
				printf('<h1><span class="label label-warning">Você não tem acesso a área de postagens do site. </span><p style="margin-top:10px"><span class="label label-warning">Faça login e tente novamente.</span></h1>');
		}
	?>
</div>
</body>
</html>
