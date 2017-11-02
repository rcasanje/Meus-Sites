<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		include("../php/conexoes/admin-access.php");
		include("../php/zona-eleitoral.php");
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
	
		$dados = ["SELECT id_fun FROM funcionarios", "SELECT id_cli FROM clientes"]
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estatísticas totais </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/bootstrap-progressbar-3.3.4.min.css">
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
				<div class="page-title">
					<div class="title_left">
						 <h3>Estatísticas totais</h3>
					</div>
				</div>
				<br><br>
				<!-- <div>
					<h4>Numeros totais</h4>
					<?php
					$ntotal= 0;
					
					for($i = 0; $i < 2; $i++){
						if($query = mysqli_query($link, $dados[$i])){
							while($rows = mysqli_fetch_row($query)){
								$ntotal++;
							}
						}
					}
					
					$valor = ($ntotal/$ntotal)*100;
					
					echo $ntotal;
					
					/*printf('
					<div class="progress">
  						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: %s%%;">%s votos</div>
					</div>', $valor, $ntotal);*/
					?>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<h4>Colaboradores</h4>
						<?php
							$ncol= 0;
					
							if($query = mysqli_query($link, $dados[1])){
								while($rows = mysqli_fetch_row($query)){
									$ncol++;
								}
							}
						
							$valor = ($ncol/$ntotal)*100;
							
							echo $ncol;

							/*printf('
							<div class="progress">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: %s%%;">%s colaboradores</div>
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: %s%%;"></div>
							</div>', $valor, $ncol, 100-$valor);*/
						?>
					</div>
					<div class="col-xs-4">
						<h4>Sub-colaboradores</h4>
						<?php
							$nscol= 0;
					
							if($query = mysqli_query($link, $dados[2])){
								while($rows = mysqli_fetch_row($query)){
									$nscol++;
								}
							}
						
							$valor = ($nscol/$ntotal)*100;
						
							echo $nscol;
							/*printf('
							<div class="progres">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: %s%%;">%s outros</div>
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: %s%%;"></div>
							</div>, $valor, $nscol, 100-$valor);*/
						?>
					</div>
					<div class="col-xs-4">
						<h4>Outros</h4>
						<?php
							$noutros= 0;
					
							if($query = mysqli_query($link, $dados[0])){
								while($rows = mysqli_fetch_row($query)){
									$noutros++;
								}
							}
						
							$valor = ($noutros/$ntotal)*100;
						
							echo $noutros;
							/*printf('
							<div class="progress">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
							</div>', $valor, $noutros, 100-$valor);*/
						?>
					</div>
					
				</div> --><br><br>
				<div class="row">
					<div class="col-xs-2 col-md-2">
						<form method="get">
							<div class="input-group">
							 	<span class="input-group-addon" id="basic-addon1">Município</span>
								<input class="form-control" aria-describedby="basic-addon1" list="listMunicipio" name="municipio" placeholder="Selecione" onfocus="">
								<datalist id="listMunicipio">
									<?php echo(zonaMunicipio()); ?>
								</datalist>
							</div>
							<div class="input-group">
							 	<span class="input-group-addon" id="basic-addon1">Bairro</span>
								<input class="form-control" aria-describedby="basic-addon1" list="listBairro" name="bairro" placeholder="Selecione" onfocus="">
								<datalist id="listBairro">
									<?php echo(zonaBairro()); ?>
								</datalist>
							</div>
							<div class="input-group">
							 	<span class="input-group-addon" id="basic-addon1">Zona</span>
								<input class="form-control" aria-describedby="basic-addon1" list="listEleitoral" name="zona" placeholder="Selecione">
								<datalist id="listEleitoral">
									<?php echo(zonaEleitoral()); ?>
								</datalist>
							</div>
							<button class="btn btn-success">Enviar</button>
						</form>
					</div>
					<div class="col-xs-10 col-md-10">
						<?php
							$dados = "";
							if(isset($_GET['municipio'])){
								$municipio = $_GET['municipio'];
								$bairro = $_GET['bairro'];
								$zona = $_GET['zona'];
								
								if($municipio == "" xor $bairro == "" xor $zona == ""){
									$dados = "SELECT id_cli, nome_cli, municipio_cli, bairro_cli, zonaE_cli, indicacao_cli FROM clientes";
								} else if($municipio != "" or $bairro != "" or $zona != ""){
									
									if($municipio == "" or $municipio == "TODAS") $municipio = ""; else $municipio = "municipio_cli='$municipio'"; 
									if($bairro == "" or $bairro == "TODAS") $bairro = ""; else $bairro = "bairro_cli='$bairro'";
									if($zona == "" or $zona == "TODAS") $zona = ""; else $zona = "zonaE_cli=$zona";
									
									if($municipio != "" and $bairro != "" or $municipio != "" and $zona != ""){
										$municipio .= " and";
									}
									if($bairro != "" and $zona != ""){
										$bairro .= " and";
									}
									
									if(($municipio == "" xor $bairro == "" xor $zona == "") == true){
										$dados = "SELECT id_cli, nome_cli, municipio_cli, bairro_cli, zonaE_cli, indicacao_cli FROM clientes";
									} else{
										$dados = "SELECT id_cli, nome_cli, municipio_cli, bairro_cli, zonaE_cli, indicacao_cli FROM clientes WHERE $municipio $bairro $zona";	
									}	
								}
							}							
						?>
						<table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nome</th>
									<th>Municipio</th>
									<th>Bairro</th>
									<th>Zona</th>
									<th>Indicado</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$dados = "SELECT id_cli, nome_cli, municipio_cli, bairro_cli, zonaE_cli, indicacao_cli FROM clientes";
								if($query = mysqli_query($link, $dados)){
									while ($rows = mysqli_fetch_row($query)){
										printf( '<tr>
												<td>%s</td>
												<td><a href="perfil-cliente.php?id=%s&nome=%s&mode=0">%s</a></td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
												<td>%s</td>
											</tr>', $rows[0], $rows[0], $rows[1], $rows[1], $rows[2], $rows[3], $rows[4], $rows[5]);
									}
								}
								?>

							</tbody>
						</table>
					</div>
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
	<script src="../js/custom.min.js"></script>
	<script src="../js/dataTables.min.js"></script>
	<script src="../js/dataTables.min.js"></script>
	<script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
	<script>
		function selecionaMunicipio(){
			console.log("TESTE");
		}
	</script>	
</body>
</html>


<?php
session_write_close();
mysqli_free_result($query);
mysqli_close($link);
?>