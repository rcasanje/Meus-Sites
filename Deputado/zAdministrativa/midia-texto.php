<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		include("../php/conexoes/cdc-access.php");
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
		}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gerenciamento de textos</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/dropzone.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
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
							<h3>Gerenciamento de vídeos</h3>
							<div>
								<form method="post" action="../php/upload-texto.php">
									<textarea rows="10" cols="10" name="conteudo" maxlength="16777125" required style="width: 220%;"></textarea>
									<button class="btn btn-success" type="submit">Enviar</button>
								</form>
							</div>
							<br>
							<div style=" width: 220%;">
								<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Conteúdo</th>
											<th>Adicionado por</th>
											<th>Adicionado em</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$dados = "SELECT * FROM texto";

										if($query = mysqli_query($link, $dados)){
											while ($rows = mysqli_fetch_row($query)){
												
												$parteTexto = substr($rows[1], 0, 300);
												printf( '<tr>
														<td>%s</td><td>%s</td><td>%s</td><td>%s</td>
														<td>Excluir/Editar</td>
													</tr>', $rows[0], $parteTexto, $rows[2], $rows[3]);
											}
										}
										?>

									</tbody>
								</table>
							</div>
						</div>
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
	<script src="../js/dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<script src="../js/dropzone.js"></script>
	<script src="../js/custom.min.js"></script>
	<script type="text/javascript">
		Dropzone.options.imageUpload = {
      		method: "post",
			timeout: 30000,
			parallelUploads: 2,
			maxFilesize: 500, //MB
			paramName: "file",
			maxThumbnailFilesize: 1,
			resizeWidth: null,
			resizeHeight: null,
			resizeQuality: 0.8,
			maxFiles: null,
			params: {},
			headers: null,
			acceptedFiles: '.mp4, .wav, .avi, .gif, .mov, .mkv, .3gp',
			addRemoveLinks: true,
			capture: true,
			dictDefaultMessage: "Arraste aqui imagem para upload. Arquivos aceitos .mp4, .wav, .avi, .gif, .mov, .mkv, .3gp",
			dictFallbackMessage: "Seu navegador não suporta arraste e solte",
			dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
			dictFileTooBig: "Arquivo é muito grande ({{filesize}}MiB). Máximo de tamanho: {{maxFilesize}}MiB.",
			dictInvalidFileType: "Você não pode fazer upload desse tipo de arquivo",
			dictResponseError: "Servidor não responde com o {{statusCode}} código.",
			dictCancelUpload: "Cancelar upload",
			dictCancelUploadConfirmation: "Tem certeza que quer cancelar o upload?",
			dictRemoveFile: "Remover arquivo",
			dictRemoveFileConfirmation: null,
			dictMaxFilesExceeded: "Você não pode fazer upload de mais arquivos",
		};
	</script>
</body>

</html>