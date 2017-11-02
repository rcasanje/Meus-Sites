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
		
		if(isset($_GET['id'])){
			include("../php/conexoes/coord-access.php");
			$id = $_GET['id'];
			$codu = $_GET['cu'];
			$modo = $_GET['mode'];
			
			$dados = "SELECT * FROM funcionarios WHERE id_fun=$id AND codigoA_fun='$codu'";
			if($query = mysqli_query($link, $dados)){
				$row = mysqli_fetch_row($query);
				$id = $row[0];
				$nome = $row[1];
				$apelido = $row[2];
				$email = $row[4];
				$codigoUnico = $row[5];
			}
		}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perfil dos coordenadores </title>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apelido</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $apelido; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código único</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"class="form-control col-md-7 col-xs-12" value="<?php echo $codu; ?>" readonly>
								</div>
							</div>
							<a href="?id=<?php echo $id;?>&cu=<?php echo $codu; ?>&tab=col&mode=1" class="btn btn-success">Editar informações</a>
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
				<div class="row" id="edicaoPerfil">
					<div class="col-xs-12 col-md-6">
						<p>Deixe em branco as linhas que não queira modificar</p>
						<form class="form-horizontal form-label-left" id="dadosEditados" method="post" action="../php/editar-col.php">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" value="<?php echo $id; ?>" name="id" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" placeholder="<?php echo $nome; ?>" name="nome" onKeyUp="verificarTexto(1);">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apelido</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control col-md-7 col-xs-12" placeholder="<?php echo $apelido; ?>" name="apelido" onKeyUp="verificarTexto(2);">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="first-name" class="form-control col-md-7 col-xs-12" placeholder="<?php echo $email; ?>" name="email" onKeyUp="verificarTexto(3);">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Código único</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text"class="form-control col-md-7 col-xs-12" placeholder="<?php echo $codu; ?>" name="codigoU" onKeyUp="verificarTexto(4);">
								</div>
							</div>
							<button class="btn btn-success" type="submit" id="enviarDados">Salvar informações</button><a href="?id=<?php echo $id;?>&cu=<?php echo $codu; ?>&tab=col&mode=0" class="btn btn-warning">Cancelar edição</a>
						</form>
					</div>
					<div class="col-xs-12 col-md-6">
					</div>
				</div>
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
			var decisao = confirm("Clique em OK para excluir!");
			if (decisao){
				$.ajax({
					type: "POST",
					url: "../php/excluir-col.php",
					data: "id="+id,
					cache: false,
					success: function(result){
						alert("Colaborador excluido com sucesso!");
						window.location.href = "usuarios-funcionarios.php";
					}
				});
			} else {
				alert ("Você escolheu näo excluir.");
			}
		}
	</script>
</body>

</html>