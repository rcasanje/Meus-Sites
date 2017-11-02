<?php
include("conexoes/user-access.php");
if(!isset($_SESSION)) session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];;

$dados = "SELECT nome_user, login_user, senha_user, permissao_user FROM usuarios WHERE login_user='$login' and senha_user='$senha'";
if($query = mysqli_query($conn, $dados)){
	if ($info = mysqli_fetch_array($query, MYSQL_ASSOC)){
		$_SESSION['User']['Nome'] = $info['nome_user'];
		$_SESSION['User']['Login'] = $info['login_user'];
		$_SESSION['User']['Permissao'] = $info['permissao_user'];
	} else{
		$_SESSION['Erro']['Login'] = 10;
	}
	
} else{
	$_SESSION['Erro']['Login'] = mysqli_errno($conn);
}

header("Location: ../conta.php");

session_write_close();
mysqli_free_result($query);
mysqli_close($conn);
?>