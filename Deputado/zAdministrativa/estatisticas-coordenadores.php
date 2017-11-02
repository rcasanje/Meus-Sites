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
	
	include("../php/conexoes/admin-access.php");
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estatísticas por coordenadores </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/custom.min.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
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
							<h3>Estatísticas por coordenadores</h3>
						</div>
					</div>
				</div>
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>E-Mail</th>
							<th>Código único</th>
							<th>Convidados</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$dados = "SELECT id_fun, nome_fun, email_fun, codigoA_fun FROM funcionarios";
								
							$query = mysqli_query($link, $dados);
							
							while($rows = mysqli_fetch_row($query)){
								$dados2 = "SELECT id_cli FROM clientes WHERE indicacao_cli='$rows[3]'";
								$query2 = mysqli_query($link, $dados2);
								$nrow = mysqli_num_rows($query2);
								printf('<tr>
									<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
								</tr>', $rows[0], $rows[1], $rows[2], $rows[3], $nrow);
							}
						?>						
					</tbody>
				</table>

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
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
</body>

</html>
<?php
	session_write_close();
	mysqli_free_result($query);
	mysqli_free_result($query2);
	mysqli_close($link);
?>