<?php
include("funcoes.php");
include("conexoes/user-access.php");

if (!isset($_SESSION)) session_start();

$erroID = 0;

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = criptografar($_POST['senha']);
$nomemae = $_POST['nomeMae'];
$cpf = criptografar($_POST['cpf']);
$zonae = $_POST['zonaE'];
$codigoa = $_POST['codigoA'];

$dados = "SELECT cpf FROM users WHERE cpf='$cpf'";
$query = mysqli_query($link, $dados);
$rowsCPF = mysqli_num_rows($query);

$dados = "SELECT email FROM users WHERE email='$email'";
$query = mysqli_query($link, $dados);
$rowsEMAIL = mysqli_num_rows($query);

$dados = "INSERT INTO users (nome, email, senha, nomeMae, cpf, zonaEleitoral, codigoAcesso) VALUE ('$nome', '$email', '$senha', '$nomemae', '$cpf', '$zonae', '$codigoa')";


if($rowsCPF > 0 and $rowsEMAIL > 0){
	$erroID = 3;
} else if($rowsCPF > 0){
	$erroID = 1;
} else if($rowsEMAIL > 0){
	$erroID = 2;
}

if($erroID == 0){
	if($connect = mysqli_query($link, $dados)){
		echo("Dados enviados com sucesso!");
		header("Location: ../painel.php");
	} else{
		echo("Houve algum erro!<br>");
		echo "Debugging error: " . mysqli_error($link) . "<br>";
		$erroID = -1;
		header("Location: ../acesso.php");
	}
} else{
	echo "Information error: " . erroRegistro($erroID) . "<br>";
	header("Location: ../acesso.php");
}

$_SESSION['User']['Erro'] = $erroID;

session_write_close();
mysqli_free_result($query);
mysqli_close($link);
?>