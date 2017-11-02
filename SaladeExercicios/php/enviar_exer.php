<?php
	include("PHP/conexao_publicacoes.php");
	$conn = mysqli_connect("root_exercicios.mysql.dbaas.com.br","root_public","R@f@el2010","root_public");
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	if(!isset($_SESSION)) session_start();
	
	$apelido = $_SESSION['User']['apelido'];
	$question = mysqli_real_escape_string($conn, $_POST['questao']);
	$gabarito = mysqli_real_escape_string($conn, $_POST['gabarito']);
	$materia = $_POST['materia'];
	$tags = mysqli_real_escape_string($conn, $_POST['tags']);
	$objetiva = $_POST['objetiva'];	
	
	if($objetiva == "on"){
		$bool_obj = 1;
	} else{
		$bool_obj = 0;
	}

	$enviarp = "INSERT INTO root_exercicios(apelido, questao, gabarito, materia, tags, objetiva) VALUES ('$apelido', '$question', '$gabarito', '$materia', '$tags', '$bool_obj')";
	
	if(mysqli_query($conn, $enviarp) or die(mysqli_error($conn))){
		echo("Enviado com sucesso");
		$_SESSION['Server']['erro'] = -10;
	} else{
		$_SESSION['Server']['erro'] = -11;
	}
	
	header("Location: ../Postagens.php");
?>