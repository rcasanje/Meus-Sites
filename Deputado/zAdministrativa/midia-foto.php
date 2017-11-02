<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	include( "../php/conexoes/cdc-access.php" );
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
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gerenciamento de fotos</title>
	<title>Gerenciamento de fotos</title>
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
							<h3>Gerenciamento de fotos</h3>
						</div>
					</div>
					<br><br><br>

					<form action="../php/upload-image.php" class="dropzone" enctype="multipart/form-data" id="imageUpload"></form>
					<br>
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
						<button type="button" class="btn btn-info" onClick="location.reload();">Atualizar tabela</button>
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome do Arquivo</th>
								<th>Caminho do Arquivo</th>
								<th>Adicionado por</th>
								<th>Adicionado em</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$dados = "SELECT * FROM fotos";

							if ( $query = mysqli_query( $link, $dados ) ) {
								while ( $rows = mysqli_fetch_row( $query ) ) {
									printf( '<tr>
												<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
												<td>
													<button class="btn btn-danger" type="button" onClick="excluirLinha(%s);">Excluir</button> 
													<button class="btn btn-warning" type="button">Editar</button>
												</td>
											</tr>', $rows[ 0 ], $rows[ 1 ], $rows[ 2 ], $rows[ 3 ], $rows[ 4 ], $rows[ 0 ] );
								}
							}
							?>
						</tbody>
					</table><br>
					<!-- TABELA DE EDIÇÃO -->
					<div class="hidden" id="form_Editar" style="margin-top: -6%; margin-left: 51.5%; position: absolute; width: 100%;">
						<form method="post" action="../php/editar-foto.php" class="form-horizontal form-label-left" id="edit_form">
							<div class="form-group">
								<div id="form_field_3" style="width: 10.5%;">
									<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nome" placeholder="Novo dono">
								</div>
								<button type="submit" class="btn btn-success" style=" margin-left: 1%;">Atualizar dados</button>
								<button type="reset" class="btn btn-warning">Zerar campos</button>
								<br><br><button type="button" class="btn btn-danger" style="margin-left: 11.5%;" onClick="cancelarEdicao();">Cancelar</button>
							</div>
						</form>
					</div>
					<!-- -------------- -->
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

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<script src="../js/dropzone.js"></script>
	<script src="../js/custom.min.js"></script>
	<script type="text/javascript">
		function excluirLinha( id ) {
			decisao = confirm( "Tem certeza que deseja excluir a linha " + id + "!" );
			if ( decisao ) {
				$.ajax( {
					type: 'post',
					url: '../php/excluir-foto.php',
					data: "postID=" + id,
					error: function ( texto ) {
						alert( "Houve algum na exclusão. Descrição: " + texto );
					},
					success: function () {
						//alert("Funcionou" + texto);
						alert( "Linha excluída com sucesso. Atualizando a página" );
						location.reload();
					}
				} );
			} else {
				alert( "Você decidiu não excluir! Operação cancelada com sucesso." );
			}
		}

		function editarLinha( id ) {
			$('#form_Editar').removeClass('hidden');
			$('#editar_foto').addClass('hidden');
		}
		
		function cancelarEdicao(){
			$('#form_Editar').addClass('hidden');
		}

		Dropzone.options.imageUpload = {
			method: "post",
			timeout: 30000,
			parallelUploads: 2,
			maxFilesize: 10, //MB
			paramName: "file",
			maxThumbnailFilesize: 1,
			resizeWidth: null,
			resizeHeight: null,
			resizeQuality: 0.8,
			maxFiles: null,
			params: {},
			headers: null,
			acceptedFiles: '.jpg, .png, .jpeg, .gif',
			addRemoveLinks: true,
			capture: true,
			dictDefaultMessage: "Arraste aqui imagem para upload. Arquivos aceitos .jpg, .jpeg, .png e .gif",
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