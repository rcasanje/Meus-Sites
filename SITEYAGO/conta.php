<html>
<head>
	<?php 
		include("php/verificacoes.php");
		verificarConta("isRegisteredLogged");
	?>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/Popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<meta charset="utf-8">
	<title>Conta :: ATUAL MK</title>
</head>

<body class="gradiente-lightblue">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="row">
		<div class="col-md-2">
			<?php include("php/barra-de-menu-lateral-conta.php") ?>
		</div>
		<div class="col-md-10">
			<div class="content-white formatacao" id="ajaxContent"></div>
		</div>
	</div>
</body>
<script>	
	$(document).ready(function() {
		$('#tablePedidos').DataTable();
	});
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
            url: "zConta/" + pagina,
            success: function (data){
            	document.getElementById('ajaxContent').innerHTML = data;
            }
        })
	}
</script>
</html>