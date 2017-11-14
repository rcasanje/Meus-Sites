<?php
include('php/comandos.php');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<html>
<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrinho | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/ionicons.css">
	<link rel="stylesheet" href="css/AdminLTE.css">
	<link rel="stylesheet" href="css/skin-blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("php/barra-de-menu-topo.php"); ?>
		<?php include("php/barra-de-menu-lateral.php"); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Print Ideas<small>tirando suas ideias do papel</small></h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
				</ol>
			</section>
			<section class="content-header">
				<form id="fecharCarrinho" action="php/gerarCompra.php" method="post">
					<input type="text" name="currency" value="BRL" readonly hidden>

					<table class="table">
						<thead>
							<tr>
								<th># item</th>
								<th>Item</th>
								<th>Pre&ccedil;o Un. / Pre&ccedil;o Total</th>
								<th>A&ccedil;&otilde;es</th>
							</tr>
						</thead>
						<tbody>
							<tr scope="row">
								<th><input class="inputTransparente" type="text" name="itemId1" value="A3CP" readonly></th>
								<th><input class="inputTransparente" type="text" name="itemDescription1" value="Adesivo trelele" readonly></th>
								<th><label>R$ 39.90 / </label><input class="inputTransparente" type="number" name="itemAmount1" value="39.90" readonly></th>
								<th>Qntd: <input class="inputTransparente" type="number" name="itemQuantity1" value="1" width="10px"> | Excluir</th>
							</tr>
							<tr scope="row">
								<th><input class="inputTransparente" type="text" name="itemId2" value="A3CP3" readonly></th>
								<th><input class="inputTransparente" type="text" name="itemDescription2" value="Adesivo trelele3" readonly></th>
								<th><label>R$ 39.90 / </label><input class="inputTransparente" type="number" name="itemAmount2" value="339.90" readonly></th>
								<th>Qntd: <input class="inputTransparente" type="number" name="itemQuantity2" value="1" width="10px"> | Excluir</th>
							</tr>
						</tbody>
					</table>			
					<div align="left">
						<button class="btn btn-success" type="submit">Pagar com Pagseguro</button>
					</div>	
				</form>
			</section>
		</div>
	</div>
</body>
<script>
	/*jQuery('#fecharCarrinho').submit(function(e){
		e.preventDefault();
		var dados = $( "fecharCarrinho" ).serialize();
		$.ajax({
        	type: "POST",
			contentType: "application/xml; charset=ISO-8859-1",
            url: "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout",
			contentType: 'text/plain',
			xhrFields: {
				withCredentials: false
			},
            success: function (data){
            	document.getElementById('ajaxProdutos').innerHTML = data;
            }
        })
	});*/
</script>
</html>


<style>
	#nqntd{
		width: 10%;
	}
</style>