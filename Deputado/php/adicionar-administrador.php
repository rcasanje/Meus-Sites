<?php
include("funcoes.php");
include("conexoes/user-access.php");

if (!isset($_SESSION)) session_start();

$erroID = 0;

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$senha = criptografar($_POST['senha']);
$permissao = $_POST['permissao'];

$dados = "SELECT apelido FROM administradores WHERE apelido='$apelido'";
$query = mysqli_query($link, $dados);
$rowsApelido = mysqli_num_rows($query);

$dados = "SELECT email FROM administrador WHERE email='$email'";
$query = mysqli_query($link, $dados);
$rowsEMAIL = mysqli_num_rows($query);

$dados = "INSERT INTO administradores (nome, apelido, email, senha, level) VALUE ('$nome', '$apelido', '$email', '$senha', $permissao)";


if($rowsApelido > 0 and $rowsEMAIL > 0){
	$erroID = 3;
} else if($rowsApelido > 0){
	$erroID = 1;
} else if($rowsEMAIL > 0){
	$erroID = 2;
}

if($erroID == 0){
	if($connect = mysqli_query($link, $dados)){
		echo("Dados enviados com sucesso!");
		$erroID = 0;
	} else{
		echo("Houve algum erro!<br>");
		echo "Debugging error: " . mysqli_error($link) . "<br>";
		$erroID = -1;
	}
} else{
	echo "Information error: " . erroRegistroAdmin($erroID) . "<br>";
	
}

header("Location: ../zAdministrativa/usuarios-administradores.php");
$_SESSION['Admin']['Register'] = $erroID;

session_write_close();
mysqli_free_result($query);
mysqli_close($link);
?>