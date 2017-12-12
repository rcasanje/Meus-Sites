<?php
include("conexoes/user-access.php");
include("comandos.php");

if(!isset($_SESSION)) session_start();

$apelido = $_POST['apelido'];
$senha = encryptInfo($_POST['senha']);

$dados = "SELECT * FROM contas WHERE apelido_con='$apelido'";

if($query = mysqli_query($conn, $dados)){
	if(mysqli_fetch_array($query, MYSQLI_ASSOC)){
		printf('Login efetuado com sucesso');
		$_SESSION['Erro']['login'] = "Login efetuado com sucesso";
		$_SESSION['User']['ID'] = $apelido;
		printf('ID Conta: %s', $apelido);
		session_write_close();
		header("Location: ../painel.php");
	} else{
		printf('Usuário inexistente');
		$_SESSION['Erro']['login'] = 'Usuário inexistente';
		session_write_close();
		header("Location: ../acesso.php");
	}
} else{
	printf('Erro #:%s<br>Descrição: %s<br>', mysqli_errno($conn), mysqli_error($conn));
	$_SESSION['Erro']['login'] = mysqli_error($conn);
	header("Location: ../acesso.php");
}
?>