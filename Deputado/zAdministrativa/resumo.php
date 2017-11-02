<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION['Staff'])) {
		header( "Location: ../administrador-acesso.php" );
	} else if ($_SESSION['Staff']['Level'] <= 0 ) {
		$_SESSION['User']['Erro'] = 10;
		header( "Location: ../errorpage-admin.php" );
	} else {
		$nome_user = $_SESSION['Staff']['Nome'];
		$codigoU = $_SESSION['Staff']['CodigoA'];
		$permissao = $_SESSION['Staff']['Level'];
	}
	if($permissao == 10){
		include( "../php/conexoes/admin-access.php" );
	} else{
		include( "../php/conexoes/coord-access.php" );
	}
	
	if(!isset($_GET['month'])){
		$mesn = date('m');	
	} else{
		$mesn = $_GET['month'];
	}
	include("../php/funcoes.php");
	
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resumo mensal</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<?php include("../php/barra-de-menu-ADMIN.php"); ?>
				</div>
			</div>
			<div class="top_nav">
				<?php include("../php/barra-de-menu-top-ADMIN.php"); ?>
			</div>
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Resumo mensal</h3>
						</div>
						<form method="get">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Seleciona o mês de visualização<span class="required">*</span></label>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<select name="month" style="width: 100%; margin-left: -35%">
										<?php
											for($i=1;$i<=12;$i++){
												$str = mktime(0,0,0,$i+1,0,0);
												$data = date('Y-m-d', $str);
												printf('<option value="%s">%s</option>', $i, date('F', $str));
											}
										?>
									</select>
									<button class="btn btn-success" type="submit">Selecionar</button>
								</div>
							</div>
						</form>
					</div>
					<br><br><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<h2>Clientes mensais</h2>
							<?php
								$label01['labels'] = [];
								$numeros01['numeros'] = [];
								$label02['labels'] = [date('F')];
								$numeros02['numeros'] = [0,0,0,0,0,0];
								$nomes02['nomes'] = [];
								
								$index = 0;
							
								for($i=0; $i < 32; $i++){
									$label01['labels'][$i] = $i+1;
								}
								for($i=0; $i < 32; $i++){
									$numeros01['numeros'][$i] = 0;
								}
							
								for($i=0; $i <= 30; $i++){
									$str = mktime(0,0,0,$mesn,$i+1,2017);
									$data = date('Y-m-d', $str);
									$dados = "SELECT id_cli FROM clientes WHERE ingressado_cli='$data'";
									if($query = mysqli_query($link, $dados)){
										$rows = mysqli_num_rows($query);
										$numeros01['numeros'][$i] = $rows;
									}
								}
							
								
								$str = mktime(0,0,0,$mesn,0,0);
								$data = date('m', $str);
								$dados = "SELECT indicacao_cli, COUNT(indicacao_cli) codigoA FROM clientes WHERE ingressado_cli BETWEEN '2017-$mesn-01' AND '2017-$mesn-31' GROUP BY indicacao_cli ORDER BY codigoA DESC LIMIT 5";
								if($query = mysqli_query($link, $dados)){
									while($rows = mysqli_fetch_row($query)){			
										$nomes02['nomes'][$index] = $rows[0];
										$numeros02['numeros'][$index] = $rows[1];
										$index++;
									}
								}
								json_encode($label01); json_encode($numeros01);
								json_encode($label02); json_encode($numeros02); json_encode($nomes02);
								
							?>
							<div class="chart-container" style="position: relative; height:100%; width:100%">
								<canvas id="subsMensal"></canvas>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<h2>Coordenador mensal</h2>
							<div class="chart-container" style="position: relative; height:100%; width:100%">
								<canvas id="areasInfluencia"></canvas>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
			<footer>
				<div class="pull-right">
					<?php include("../php/rodape-ADMIN.php"); ?>
				</div>
				<div class="clearfix"></div>
			</footer>
		</div>
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script> 
	<script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
	<script src="../js/custom.min.js"></script>
	<script>
		var ctx1 = document.getElementById('subsMensal').getContext('2d');
		var ctx2 = document.getElementById('areasInfluencia').getContext('2d');
		
		var label01 = <?php echo json_encode($label01); ?>;
		var numeros01 = <?php echo json_encode($numeros01); ?>;
		var label02 = <?php echo json_encode($label02); ?>;
		var numeros02 = <?php echo json_encode($numeros02); ?>;
		var nomes02 = <?php echo json_encode($nomes02); ?>;
		
		var labels01 = [];
		var numero01 = [];
		
		for (i = 30	; i>=0;i--){
			labels01.splice(0,0,label01['labels'][i]);
		}
		
		for (i = 30	; i>=0;i--){
			numero01.splice(0,0,numeros01['numeros'][i]);
		}
		
		var chart = new Chart(ctx1, {
			// The type of chart we want to create
			type: 'line',

			// The data for our dataset
			data: {
				labels: labels01,
				datasets: [{
					label: "Sub-colaboradores",
					borderColor: 'rgb(255, 99, 132)',
					data: numero01,
				}]
			},
			// Configuration options go here
			options: {
				responsive: true
			},
		});
		
		var chart = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: [
					label02['labels'][0]
				],
				datasets: [{
					label: [nomes02['nomes'][0]],
					backgroundColor: ['rgb(126, 126, 126)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][0]]
				}, {
					label: [nomes02['nomes'][1]],
					backgroundColor: ['rgb(126, 255, 126)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][1]]
				}, {
					label: [nomes02['nomes'][2]],
					backgroundColor: ['rgb(126, 126, 255)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][2]]
				}, {
					label: [nomes02['nomes'][3]],
					backgroundColor: ['rgb(255, 255, 126)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][3]]
				}, {
					label: [nomes02['nomes'][4]],
					backgroundColor: ['rgb(255, 126, 255)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][4]]
				}, {
					label: [nomes02['nomes'][5]],
					backgroundColor: ['rgb(126, 255, 255)'],
					borderWidth: 1,
					borderColor: 'rgb(0,0,0)',
					data: [numeros02['numeros'][5]]
				}],
			},
			options: {
				responsive: true
			},
		});
	</script>
</body>

</html>


<?php
mysqli_close($link);
session_write_close();
?>