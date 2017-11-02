<?php
	include("PHP/conexao_publicacoes.php");

	if(!isset($_SESSION)) session_start();
	
	date_default_timezone_set('America/Sao_Paulo');
	
	$apelido = $_SESSION['User']['apelido'];
	$title = mysqli_real_escape_string($conn, $_POST['titulo']);
	$conteudo = mysqli_real_escape_string($conn, $_POST['conteudo']);
	$materia = $_POST['materia'];
	$tags = mysqli_real_escape_string($conn, $_POST['tags']);
	$data = date('Y-m-d H:i:s');
	
	$enviar_post = "INSERT INTO postagens(apelido, titulo, conteudo, materia, tags, data) VALUES('$apelido', '$title', '$conteudo', '$materia', '$tags', '$data')";
	
	if(mysqli_query($conn, $enviar_post) or die(mysqli_error($conn))){
		echo("Enviado com sucesso!");
		$_SESSION['Server']['erro'] = -12;
	} else{
		echo("Algo deu errado!");
		$_SESSION['Server']['erro'] = -13;
	}
	
	header("Location: ../Postagens.php");
?>