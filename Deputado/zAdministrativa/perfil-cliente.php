<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		if (!isset($_SESSION)) session_start();
		include("../php/zona-eleitoral.php");
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
		
		if(isset($_GET['id'])){
			include("../php/conexoes/coord-access.php");
			$id = $_GET['id'];
			$nome = $_GET['nome'];
			$modo = $_GET['mode'];
			
			$dados = "SELECT * FROM clientes WHERE id_cli=$id AND nome_cli='$nome'";
			if($query = mysqli_query($link, $dados)){
				$row = mysqli_fetch_row($query);
				$id = $row[0];
				$nome = $row[1];
				$nomeMae = $row[2];
				$nomePai = $row[3];
				$dataNasc = $row[4];
				$endereco = $row[5];
				$municipio = $row[6];
				$bairro = $row[7];
				$telefone = $row[8];
				$email = $row[9];
				$zonaE = $row[10];
				$indicacao = $row[11];
				$ingressado = $row[12];
				$permissao_user = $row[13];
			}
		}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil dos colaboradoes </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<!-- <link href="css/nprogress.css" rel="stylesheet">
	<link href="css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/> -->
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
							<h3>Perfil de <?php echo $nome; ?></h3>
						</div>
					</div>
				</div>
				<br><br><br>
				<?php
					if($_GET['mode'] == 1){
						echo "<!--";
					}
				?>
				<div class="row" id="visaoPerfil">
					<div class="col-xs-12 col-md-6">
						<form class="form-horizontal form-label-left">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $id; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $nome; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome da máe</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $nomeMae; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome da pai</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $nomePai; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data de nascimento</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $dataNasc; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Endereço</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $endereco; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Município</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" aria-describedby="basic-addon1" name="municipio" value="<?php echo $municipio; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" aria-describedby="basic-addon1" name="municipio" value="<?php echo $bairro; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefone</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $telefone; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zona Eleitoral</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $zonaE; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código de Acesso</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $indicacao; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data de adição</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $ingressado; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permissão</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $permissao_user; ?>" readonly>
								</div>
							</div>
							<a href="?id=<?php echo $id;?>&nome=<?php echo $nome; ?>&mode=1" class="btn btn-success">Editar informações</a>
							<button class="btn btn-danger" type="button" onClick="excluirUser(<?php echo $id ?>)">Excluir colaborador</button>
						</form>
					</div>
					<div class="col-xs-12 col-md-6">
					</div>
				</div>
				<?php
					if($_GET['mode'] == 1){
						echo "-->";
					} else{
						echo "<!--";
					}
				?>
				<form method="post" action="../php/editar-cliente.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
				<?php 
					if(isset($_SESSION['Cliente']['Register']) and ($_SESSION['Cliente']['Register']) != 0){
						printf('<div class="alert alert-danger" role="alert">%s</div>', erroRegistroCliente($_SESSION['Cliente']['Register']));
						$_SESSION['Cliente']['Register'] = 0;
					}
				?>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="id" value="<?php echo $id;?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="nome" pattern="{3,}" autocomplete="off" placeholder="<?php echo $nome; ?>" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação mãe<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="nomeMae" pattern="{3,}" autocomplete="off" placeholder="<?php echo $nomeMae; ?>" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filiação pai<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="nomePai" pattern="{3,}" autocomplete="off" placeholder="<?php echo $nomePai; ?>" oninvalid="setCustomValidity('Insira ao menos 3 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nascimento<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" id="first-name" class="form-control col-md-7 col-xs-12" name="dataNasc" min="1900-01-01" max="2020-12-31" pattern="[0-9]{4}\/[0-9]{2}\/[0-9]{2}" autocomplete="off" placeholder="<?php echo $dataNasc; ?>" oninvalid="setCustomValidity('Dados inseridos incorretamente. Ano/Mês/Dia (AAAA/MM/DD)')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Municipio<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control" aria-describedby="basic-addon1" list="listMunicipio" name="municipio" placeholder="Selecione" onfocus="">
						<datalist id="listMunicipio">
							<?php echo(zonaMunicipio()); ?>
						</datalist>	
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control" aria-describedby="basic-addon1" list="listBairro" name="bairro" placeholder="Selecione" onfocus="">
						<datalist id="listBairro">
							<?php echo(zonaBairro()); ?>
						</datalist>	
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Endereço<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="rua" pattern="{3,}" autocomplete="off" value="<?php echo $endereco; ?>" oninvalid="setCustomValidity('Insira ao menos 3 caractres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefone/Celular</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="tel" id="first-name" class="form-control col-md-7 col-xs-12" name="telefone" pattern="[0-9]{8,11}$" autocomplete="off" placeholder="<?php echo $telefone; ?>" oninvalid="setCustomValidity('Insira um telefone/celular de 8 a 11 caracteres')">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" id="first-name" class="form-control col-md-7 col-xs-12" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" placeholder="<?php echo $email; ?>" oninvalid="setCustomValidity('Insira um tipo de e-mail válido')" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zona</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input class="form-control" aria-describedby="basic-addon1" list="listZona" name="zona" placeholder="Selecione" onfocus="">
						<datalist id="listZona">
							<?php echo(zonaEleitoral()); ?>
						</datalist>	
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Indicação</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="codigoA" placeholder="<?php echo $indicacao; ?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Permissão</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" name="permissao" placeholder="<?php echo $permissao_user; ?>" autocomplete="off">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" class="btn btn-success">Enviar</button>
						<button class="btn btn-info" type="reset">Limpar</button>
						<a href="?id=<?php echo $id;?>&nome=<?php echo $nome; ?>&mode=0" class="btn btn-warning">Cancelar edição</a>
					</div>
				</div>
			</form>
				<?php
					if($_GET['mode'] == 0){
						echo "-->";
					}
				?>
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
	<script>
		function controles(){
		}
		function excluirUser(id){
			var decisao = confirm("Clique em um botão!");
			if (decisao){
				$.ajax({
					type: "POST",
					url: "../php/excluir-scol.php",
					data: "id="+id,
					cache: false,
					success: function(result){
						alert("Colaborador excluido com sucesso!");
						window.location.href = "usuarios-colaboradores.php";
					}
				});
			} else {
				alert ("Você escolheu näo excluir.");
			}
		}
	</script>
</body>

</html>