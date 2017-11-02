<?php
if(!isset($_SESSION)) session_start();
include("conexao_user.php");

$apelido = mysqli_real_escape_string($conn, $_POST['nickname']);
$senha = mysqli_real_escape_string($conn, $_POST['password']);

$dados_conta = "SELECT idkey, permissao FROM contas WHERE apelido='$apelido' AND senha='$senha'";

if($dados_enviar = mysqli_query($conn, $dados_conta)  or die(mysqli_error($conn))){
	$dados_verificar = mysqli_num_rows($dados_enviar);
	if($dados_verificar == 0){
		echo("Conta inexistente");
		$_SESSION['Server']['erro'] = 10;
	}else{
		echo("Logado com sucesso<br>");
		$_SESSION['Server']['erro'] = 0;
		$dados_receber = mysqli_fetch_array($dados_enviar, MYSQL_ASSOC);
		$_SESSION['User']['idkey'] = $dados_receber['idkey'];
		$_SESSION['User']['apelido'] = $apelido;
		$_SESSION['User']['permissao'] = $dados_receber['permissao'];	
	}
}else{
	$_SESSION['Server']['erro'] = 503;
	echo("Algum erro aconteceu.");
}

header("Location: ../Painel.php");
?>