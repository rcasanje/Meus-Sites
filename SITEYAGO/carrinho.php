<?php
include('php/comandos.php');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if(!isset($_SESSION)) session_start();
if(isset($_SESSION['Produtos'])){
	$quantidade = $_SESSION['Produtos']['quantidade'];
	$produtos = $_SESSION['Produtos']['idprodutos'];
	$qntdprodut = array();
	$idprodut = array();
} else{
	$_SESSION['Produtos']['idprodutos'] = "";
	$_SESSION['Produtos']['quantidade'] = 0;
	$qntdprodut = array();
	$quantidade = "0";
	$produtos = "";
}
?>

<html>
<head>
	<meta charset="windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrinho | Print Ideas</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/dataTables.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/ionicons.css">
	<link rel="stylesheet" href="css/AdminLTE.css">
	<link rel="stylesheet" href="css/skin-blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</script>
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
			<section class="content-header">
				<form id="fecharCarrinho" action="php/gerarCompra.php" method="post">
					<input type="text" name="currency" value="BRL" readonly hidden>

					<table id="itensCarrinho" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th># item</th>
								<th>Item</th>
								<th>Pre&ccedil;o Un. / Pre&ccedil;o Total</th>
								<th>Quantidade</th>
								<th>A&ccedil;&otilde;es</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$idQuery = "";
								$index = 1;
								$posPast = 0;
								$posSearch = 0;
								
								$saveProduct = $produtos;
								//printf("Produtos Salvos: %s<br>", $saveProduct);
																
								while($saveProduct != ""){
									$posSearch = strpos($saveProduct, ",");
									$getID = substr($saveProduct, 0, $posSearch);
									$setID = substr($getID, 0, -3);
									$setQntd = substr($getID, strlen($getID)-2, -1);
									
									if($idQuery == ""){
										$idQuery .= "'".$setID."'";
									} else {
										$idQuery .= ", '".$setID."'";
									}
									
									$idprodut[$index] = $setID;
									$qntdprodut[$index] = $setQntd;
									
									//printf("Edição: %s<br>", $saveProduct);
									$saveProduct = substr($saveProduct, $posSearch+1, strlen($saveProduct));
									
									$index++;
								}
								
								$dados = "SELECT * FROM produtos WHERE codigo_prod IN ($idQuery)";
								//printf("Dados: %s<br>", $dados);
								
								if($query = mysqli_query($conn, $dados)){
									$index = 1;
									
									while($prod = mysqli_fetch_array($query)){
										$precoUn = substr($prod['preco_prod'], 2);
										$precoTotal = $precoUn*$qntdprodut[$index];
										//echo "Preco: ".$precoUn;
										printf('<tr scope="row">');
											printf('<td>
												<input class="inputTransparente" type="text" name="itemId%s" value="%s" readonly>
											</td>', $index, $idprodut[$index]);
											printf('<td>
												<textarea class="inputTransparente" type="text" name="itemDescription%s" cols="105" readonly>%s</textarea>
											</td>', $index, $prod['nome_prod']);
											printf('<td>
												<input class="inputTransparente" type="text"  id="precoun%s" name="itemAmount%s" value="%s" readonly>
												<label id="itemAmount%s">%s</label>
											</td>', $index, $index, $precoUn, $index, number_format($precoTotal, 2));
											printf('<td>
												Qntd: <input class="inputTransparente" type="number" id="itemQuantity%s" name="itemQuantity%s" value="%s" width="10px" min="1" onChange="atualizarPreco(%s);">
											</td>', $index, $index, $qntdprodut[$index], $index);
											printf('<td>
												<button class="btn btn-warning" type="button" onClick="removerCarrinho("%s");">Remover produto</button>
											</td>', $idprodut[$index]);
										printf('</tr>');
										$index++;
									}
								} else{
									echo mysqli_error($conn);
								}
								?>
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
	<script src="js/jquery.min.js"></script>
	<script src="js/printideas-comandos.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTables.min.js"></script>
	<script src="js/fastclick.js"></script>
	<script src="js/adminlte.min.js"></script>
	<script src="js/demo.js"></script>
	<script>
		$( document ).ready( function () {
			$( '.sidebar-menu' ).tree()
		} )
		
		$(document).ready(function(){
			$('#itensCarrinho').DataTable();
		});
		
		function atualizarPreco(num){
			var valor = document.getElementById('precoun' + num).value;
			var valortotal = document.getElementById('itemAmount' + num);
			var quantidade = document.getElementById('itemQuantity' + num).value;
			
			valortotal.innerHTML = parseFloat((parseFloat(valor)*parseInt(quantidade)).toFixed(3));
		}
	</script>
</html>


<style>
	#nqntd{
		width: 10%;
	}
</style>