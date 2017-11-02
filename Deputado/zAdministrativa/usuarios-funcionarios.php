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

	include( "../php/conexoes/admin-access.php" );
	include("../php/funcoes.php");
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dados dos colaboradores</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/custom.min.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../css/prettify.min.css" rel="stylesheet">
</head>

<body class="nav-md" onLoad="controles();">
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
							<h3>Dados dos funcionários</h3>
						</div>
					</div>
				</div>
				<table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Código único</th>
							<th>Convidados</th>
							<th>Permissão</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$dados = "SELECT id_fun, nome_fun, codigoA_fun, permissao_fun FROM funcionarios";

						if($query = mysqli_query( $link, $dados )){
							while ( $rows = mysqli_fetch_row( $query ) ) {
								$dados2 = "SELECT id_cli FROM clientes WHERE indicacao_cli='$rows[2]'";
								$query2 = mysqli_query( $link, $dados2 );
								$nrow = mysqli_num_rows( $query2 );
								printf( '<tr>
										<td>%s</td><td><a href="perfil-func.php?id=%s&cu=%s&mode=0">%s</a></td><td>%s</td><td>%s</td><td>%s</td>
									</tr>', $rows[ 0 ], $rows[ 0 ], $rows[ 2 ], $rows[ 1 ], $rows[ 2 ], $nrow, $rows[3]);
							}
						}
						?>
					</tbody>
				</table>
				<br><br><br>
				<fieldset>
					<legend>Legenda</legend>
					<table width="50%" cellspacing="10">
						<tr>
							<td><p>Permissão 1 = Sem cargo</p></td>
							<td><p>Permissão 6 = Coordenadores</p></td>
						</tr>
						<tr>
							<td><p>Permissão 2</p></td>
							<td><p>Permissão 7</p></td>
						</tr>
						<tr>
							<td><p>Permissão 3</p></td>
							<td><p>Permissão 8 = Triagem</p></td>
						</tr>
						<tr>
							<td><p>Permissão 4</p></td>
							<td><p>Permissão 9</p></td>
						</tr>
						<tr>
							<td><p>Permissão 5 = Criador de conteúdo (foto, video, texto)</p></td>
							<td><p>Permissão 10 = Administrador acesso total</p></td>
						</tr>
					</table>
					
					
					
					
				</fieldset>
				<button class="btn btn-success" onClick="adicionar();">Adicionar funcionário</button>
				<div id="adicionar-col">
						<div class="ln_solid"></div>
					<form method="post" action="../php/adicionar-colaborador.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						<?php 
							if(isset($_SESSION['Coord']['Register']) and ($_SESSION['Coord']['Register']) != 0){
								printf('<div class="alert alert-danger" role="alert">%s</div>', erroRegistroCoord($_SESSION['Coord']['Register']));
								$_SESSION['Coord']['Register'] = 0;
							}
						?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nome">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apelido <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="apelido">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Senha <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" id="first-name" required="required" class="form-control col-md-7 col-xs-12"  name="senha">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código único <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"  name="codigoU">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permissão<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"  name="permissao" min="0" max="9">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Enviar</button>
								<button class="btn btn-primary" type="reset">Limpar</button>
								<button class="btn btn-primary" type="button" onClick="cancelar();">Cancelar</button>
							</div>
						</div>
					</form>
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
	<!-- <script src="js/fastclick.js"></script>
	<script src="js/nprogress.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script> -->
	<script src="../js/custom.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>.
	<script>
		function controles(){
			$('#adicionar-col').hide();
		}
		
		function adicionar(){
			$('#adicionar-col').show(250);
		}
		
		function cancelar(){
			$('#adicionar-col').hide(250);
		}
	</script>
</body>

</html>
<?php
session_write_close();
mysqli_free_result( $query );
mysqli_free_result( $query2 );
mysqli_close( $link );
?>