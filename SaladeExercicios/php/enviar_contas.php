<?php
include("conexao_user.php");

if(!isset($_SESSION)) session_start();

$continuar = true;

$idkey = md5(uniqid(rand(), true));
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$apelido = mysqli_real_escape_string($conn, $_POST['apelido']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$permissao = 0;

printf("Idkey: %s <br> Nome: %s <br> Apelido: %s <br> Email: %s <br> Senha: %s <br>", $idkey, $nome, $apelido, $email, $senha);

if(strlen($nome) > 50){
	$continuar = false;
	$_SESSION['Server']['erro'] = 20;
}
if(strlen($apelido) > 16){
	$continuar = false;
	$_SESSION['Server']['erro'] = 21;
}
if(strlen($senha) > 18){
	$continuar = false;
	$_SESSION['Server']['erro'] = 22;
}

if($verificar_conta = mysqli_query($conn, "SELECT apelido FROM contas WHERE apelido='$apelido'")){
	$concluido = mysqli_num_rows($verificar_conta);
	if($concluido > 0){
		$_SESSION['Server']['erro'] = 23;
		$continuar = false;
	}
}

if($verificar_conta = mysqli_query($conn, "SELECT email FROM contas WHERE email='$email'")){
	$concluido = mysqli_num_rows($verificar_conta);
	if($concluido > 0){
		$_SESSION['Server']['erro'] = 24;
		$continuar = false;
	}
}

if($continuar == true){
	$dados = "INSERT INTO contas(idkey, nome, apelido, email, senha, permissao) VALUES ('$idkey', '$nome', '$apelido', '$email', '$senha', '$permissao')";
	if($enviar = mysqli_query($conn, $dados) or die(mysqli_error($conn))){
		$_SESSION['User']['idkey'] = $idkey;
		$_SESSION['User']['nickname'] = $apelido;
		$_SESSION['User']['permissao'] = $permissao;
		$_SESSION['Server']['erro'] = 0;
		echo("Enviado com sucesso");
	}else{
		$_SESSION['Server']['erro'] = 503;
		echo("Ocorreu alguma falha");
		mysqli_errno($conn);
	}
}else{
	echo("Algo aconteceu de errado<br>");
	echo("MySQL error: ".mysqli_error($conn));
	echo("Erro: ".$_SESSION['Server']['erro']);
}

header("Location: ../Painel.php");
?>