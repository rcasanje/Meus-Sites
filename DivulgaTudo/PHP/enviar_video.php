<html>
<head>
<meta charset="utf-8">

<?php
	if(!isset($_SESSION)) session_start();
	include("PHP/conexao.php");
	
	if ($result = mysqli_query($link, "SELECT id FROM videos")) {
		$row_count = mysqli_num_rows($result);
		printf("Registros: %d.<br>", $row_count);
	}
	
	$user = $_SESSION['User']['apelido'];
	$nome = mysqli_real_escape_string($link, $_POST['nome']);
	$lurl = $_POST['link'];
	$categoria = mysqli_real_escape_string($link, $_POST['category']);
	$subcategoria = mysqli_real_escape_string($link, $_POST['subcategory']);
	$comentario = mysqli_real_escape_string($link, $_POST['comentario']);
	$rcaptcha = $_POST['vcaptcha'];
	
	$dados_video = "INSERT INTO videos(id, apelido, nome, link, categoria, subcategoria, comentario, gostei, odiei, visitantes) VALUES ('$row_count', '$user', '".$nome."', '$lurl', '$categoria', '$subcategoria', '$comentario', 0, 0, 0)";
	if($_SESSION['User']['captcha'] == $rcaptcha){
		if($teste = mysqli_query($link, $dados_video) or die(mysqli_error($link))){
			echo("Enviado com sucesso");
			$_SESSION['User']['erro'] = -1;
			session_write_close();
			header("Location: ../Painel.php");
		}
	}else{
		$_SESSION['User']['erro'] = 1;
		header("Location: ../Painel.php");
	}
	
	mysqli_close($link);
	session_write_close();
?>
</head>
</html>