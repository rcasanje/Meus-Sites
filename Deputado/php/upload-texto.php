<?php
include("conexoes/cdc-access.php");
if(!isset($_SESSION)) session_start();
$nomeDono = $_SESSION['Admin']['Nome'];

$conteudo = $_POST['conteudo'];

$dados = "INSERT INTO texto (conteudo, postado) VALUES ('$conteudo', '$nomeDono')";
if($query = mysqli_query($link, $dados)){
	echo "Tudo ocorreu bem";
}

header("Location: ../zAdministrativa/midia-texto.php")

session_write_close();
mysqli_close($link);
?>