<?php
include("conexoes/admin-access.php");

if(!isset($_SESSION)) session_start();

$nickname = $_POST['apelido'];
$password = $_POST['senha'];

$dados = "SELECT nome_fun, codigoA_fun, permissao_fun FROM funcionarios WHERE login_fun='$nickname' and senha_fun='$password'";
	
if($query = mysqli_query($link, $dados)){
	$row  = mysqli_fetch_row($query);
	
	if($row[0] == ""){
		$_SESSION['Admin']['Erro'] = 1;	
		header("Location: ../administrador-acesso.php");
		echo("<br>Erro: Nome de login inexistente");
	} else{
		$_SESSION['Admin']['Erro'] = 0;
		$_SESSION['Staff']['Nome'] = $row[0];
		$_SESSION['Staff']['CodigoA'] = $row[1];
		$_SESSION['Staff']['Level'] = $row[2];
		echo("<br>Logado com sucesso");
		header("Location: ../index-admin.php");	
	}
} else{
	$_SESSION['Admin']['Erro'] = -1;
	echo ("<br>Debugging error: " . mysqli_error($link));
	header("Location: ../administrador-acesso.php");
}

mysqli_free_result($query);
mysqli_close($link);
?>