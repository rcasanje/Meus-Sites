<?php 
include("php/printideas-comandos.php");
include("php/comandos.php");
?>
<html>
<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Painel | Print Ideas</title>
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
			include("php/barra-de-menu-lateral-conta.php");
			if($nomeCliente == "Cliente"){
				header("Location: acesso.php");
			}
		?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Print Ideas<small>tirando suas ideias do papel</small></h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
				</ol>
			</section>
			<section class="content">
				<div class="content-white formatacao" id="ajaxContent"></div>
			</section>
		</div>
	</div>
</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/printideas-comandos.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fastclick.js"></script>
	<script src="js/adminlte.min.js"></script>
	<script src="js/demo.js"></script>
	<script>	
		$( document ).ready( function () {
			$('.sidebar-menu').tree()
		})
		
		function carregarAjax(num){
			var pagina = "";
			switch(num){
				case 0:
					pagina = "dados.php";
					break;
				case 1:
					pagina = "endereco.php";
					break;
				case 2:
					pagina = "pedidos.php";
					break;
				case 3:
					pagina = "listadesejo.php";
					break;
				case 4:
					pagina = "devolucao.php";
					break;
			}
			$.ajax({
				type: "GET",
				url: "conta/" + pagina,
				success: function (data){
					document.getElementById('ajaxContent').innerHTML = data;
				}
			})
		}
	</script>
</html>