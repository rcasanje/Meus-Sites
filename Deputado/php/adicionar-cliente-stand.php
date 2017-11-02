<?php
include("funcoes.php");
include("conexoes/user-access.php");

if (!isset($_SESSION)) session_start();

$erroID = 0;

$nome = $_POST['nome'];
$nomeMae = $_POST['nomeMae'];
$nomePai = $_POST['nomePai'];
$dataNasc = $_POST['dataNasc'];
$endereco = $_POST['rua'];
$municipio = $_POST['municipio'];
$bairro = $_POST['bairro'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$codigoA = $_POST['codigoA'];
$data = date('Y-m-d');

$dados = "SELECT email_cli FROM clientes WHERE email_cli='$email'";
$query = mysqli_query($link, $dados);
$rowsEMAIL = mysqli_num_rows($query);

$dados = "INSERT INTO clientes (nome_cli, nomeMae_cli, nomePai_cli, dataNasc_cli, endereco_cli, municipio_cli, bairro_cli, telefone_cli, email_cli, indicacao_cli, ingressado_cli) VALUES ('$nome', '$nomeMae', '$nomePai', '$dataNasc', '$endereco', '$municipio', '$bairro', '$telefone', '$email', '$codigoA', '$data')";

if($rowsEMAIL > 0){
	$erroID = 2;
}

if($erroID == 0){
	if($connect = mysqli_query($link, $dados)){
		echo("Dados enviados com sucesso!");
		$erroID = 11;
	} else{
		echo("Houve algum erro!<br>");
		echo "Debugging error: " . mysqli_error($link) . "<br>";
		echo "Debugging errno: " . mysqli_errno($link) . "<br>";
		$erroID = mysqli_errno($link);
		$erroSTR = mysqli_error($link);
	}
} else{
	echo "Information error: " . erroRegistroCliente($erroID) . "<br>";
}

header("Location: ../acesso.php");
$_SESSION['Cliente']['Register'] = $erroID." Com a descrição: ".$erroSTR;
	
session_write_close();
mysqli_free_result($query);
mysqli_close($link);
?>