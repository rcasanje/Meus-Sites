<?php
include("funcoes.php");
include("conexoes/user-access.php");

if (!isset($_SESSION)) session_start();

$erroID = 0;

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$senha = criptografar($_POST['senha']);
$codigoU = $_POST['codigoU'];
$permissao = $_POST['permissao'];

$dados = "SELECT login_fun FROM funcionarios WHERE login_fun='$apelido'";
$query = mysqli_query($link, $dados);
$rowsApelido = mysqli_num_rows($query);

$dados = "SELECT email_fun FROM funcionarios WHERE email_fun='$email'";
$query = mysqli_query($link, $dados);
$rowsEMAIL = mysqli_num_rows($query);

$dados = "SELECT codigoA_fun FROM funcionarios WHERE codigoA_fun='$$codigoU'";
$query = mysqli_query($link, $dados);
$rowCodigo = mysqli_num_rows($query);

$dados = "INSERT INTO funcionarios (nome_fun, login_fun, email_fun, senha_fun, codigoA_fun, permissao_fun) VALUES ('$nome', '$apelido', '$email', '$senha', '$codigoU', $permissao)";

if($rowsApelido > 0 and $rowsEMAIL > 0){
	$erroID = 3;
} else if($rowsApelido > 0){
	$erroID = 1;
} else if($rowsEMAIL > 0){
	$erroID = 2;
} else if($rowCodigo > 0){
	$erroID = 4;
}

if($erroID == 0){
	if($connect = mysqli_query($link, $dados)){
		echo("Dados enviados com sucesso!");
		$erroID = 0;
	} else{
		echo("Houve algum erro!<br>");
		echo "Debugging error: " . mysqli_error($link) . "<br>";
		echo "Debugging error: " . mysqli_errno($link) . "<br>";
		$erroID = mysqli_error($link);
	}
} else{
	echo "Information error: " . erroRegistroCoord($erroID) . "<br>";
}

$_SESSION['Coord']['Register'] = $erroID;
header("Location: ../zAdministrativa/usuarios-funcionarios.php");

session_write_close();
mysqli_free_result($query);
mysqli_close($link);
?>