<?php 
	include ("conexao.php");
    
	$id = $_POST['identificacao'];
	$cooldown = $_POST['cd'];
	
	$hora1 = -2 + substr($cooldown, 0,2);
	$minuto1 = substr($cooldown, 2,2);
	$segundo1 = substr($cooldown, 4,2);
	
	$hora = date("H", strtotime("$hora1 hours"));
	$minuto = date("i", strtotime("$minuto1 minutes"));
	$segundo = date("s", strtotime("$segundo1 seconds"));
	
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	
	$soma = $hora.$minuto.$segundo.''.$dia.$mes.$ano;
	
	$dados = "UPDATE timers SET timestamp=$soma WHERE id=$id";
	$query = mysqli_query($link, $dados);
?>