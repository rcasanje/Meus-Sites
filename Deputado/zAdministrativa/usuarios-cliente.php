<html>
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
	
	include("../php/funcoes.php");
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dados dos clientes</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/custom.min.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
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
							<h3>Dados dos clientes</h3>
						</div>
					</div>
				</div>
				<table id="datatable-responsive" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Filiação mãe</th>
							<th>Filiação pai</th>
							<th>Data de nascimento</th>
							<th>Endereço</th>
							<th>Telefone</th>
							<th>Zona</th>
							<th>Indicado por</th>
							<th>Adiciona em</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($permissao > 0 and $permissao <= 9){
							$dados = "SELECT id_cli, nome_cli, nomeMae_cli, nomePai_cli, dataNasc_cli, endereco_cli, telefone_cli, zonaE_cli, indicacao_cli, ingressado_cli FROM clientes WHERE indicacao_cli=$codigoU";
						} else if($permissao == 10){
							$dados = "SELECT id_cli, nome_cli, nomeMae_cli, nomePai_cli, dataNasc_cli, endereco_cli, telefone_cli, zonaE_cli, indicacao_cli, ingressado_cli FROM clientes";
						}
						

						if($query = mysqli_query($link, $dados)){
							while ($rows = mysqli_fetch_row($query)){
								printf( '<tr>
										<td>%s</td><td><a href="perfil-cliente.php?id=%s&nome=%s&mode=0">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
									</tr>', $rows[0], $rows[0], $rows[1], $rows[1], $rows[2], $rows[3], $rows[4], $rows[5], $rows[6], $rows[7], $rows[8],$rows[9]);
							}
						}
						?>
						
					</tbody>
				</table>
				<br><br><br>
				<button class="btn btn-success" onClick="adicionar();">Adicionar cliente</button>
				<div id="adicionar-col">
					<div class="ln_solid"></div>
					<form method="post" action="../php/adicionar-cliente.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						<?php 
							if(isset($_SESSION['Cliente']['Register']) and ($_SESSION['Cliente']['Register']) != 0){
								printf('<div class="alert alert-danger" role="alert">%s</div>', erroRegistroCliente($_SESSION['Cliente']['Register']));
								$_SESSION['Cliente']['Register'] = 0;
							}
						?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nome" pattern="{3,}" autocomplete="off" placeholder="Ex.: Carlos Alberto da Silva" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação mãe<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nomeMae" pattern="{3,}" autocomplete="off" placeholder="Ex.: Maria Julia Carvalho" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação pai<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nomePai" pattern="{3,}" autocomplete="off" placeholder="Ex.: João Santos Carvalho" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nascimento<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="dataNasc" min="1900-01-01" max="2020-12-31" pattern="[0-9]{4}\/[0-9]{2}\/[0-9]{2}" autocomplete="off" placeholder="Ex.: 1822/09/07" oninvalid="setCustomValidity('Dados inseridos incorretamente. Ano/Mês/Dia (AAAA/MM/DD)')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Município<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="municipio" pattern="{3,}" autocomplete="off" placeholder="Ex.: Rio de Janeiro" oninvalid="setCustomValidity('Insira ao menos 3 caractres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="bairro" pattern="{3,}" autocomplete="off" placeholder="Ex.: Copacabana" oninvalid="setCustomValidity('Insira ao menos 3 caractres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Endereço<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="rua" pattern="{3,}" autocomplete="off" placeholder="Ex.: Rua Campo grande n 330" oninvalid="setCustomValidity('Insira ao menos 3 caractres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefone/Celular</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="tel" id="first-name" class="form-control col-md-7 col-xs-12" name="telefone" pattern="[0-9]{8,11}$" autocomplete="off" placeholder="Ex.: 2123652103" oninvalid="setCustomValidity('Insira um telefone/celular de 8 a 11 caracteres')">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="first-name" class="form-control col-md-7 col-xs-12" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" placeholder="Ex.: exemplo@provedor.com" oninvalid="setCustomValidity('Insira um tipo de e-mail válido')" >
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zona</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="first-name" class="form-control col-md-7 col-xs-12" name="zonaE" autocomplete="off" placeholder="Ex.: 122">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código de acesso <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="codigoA" autocomplete="off">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Enviar</button>
								<button class="btn btn-info" type="reset">Limpar</button>
								<button class="btn btn-warning" type="button" onClick="cancelar();">Cancelar</button>
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

</html> <
<?php
session_write_close();
mysqli_free_result( $query );
mysqli_close( $link );
?>