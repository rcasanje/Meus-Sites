<?php
include("conexoes/cdc-access.php");
if(!isset($_SESSION)) session_start();
$nomeDono = $_SESSION['Admin']['Nome'];

$uploadDir = '../Upload/Videos';

if (!empty($_FILES)) {
	$nomeOriginal = $_FILES['file']['name'];
	
 	$tmpFile = $_FILES['file']['tmp_name'];
 	$filename = $uploadDir.'/'.time().'-'. $nomeOriginal;
 	move_uploaded_file($tmpFile,$filename);
	
	$dados = "INSERT INTO videos (nomeArquivo, caminhoArquivo, postado) VALUES ('$nomeOriginal', '$filename', '$nomeDono')";
	$query = mysqli_query($link, $dados);
}

session_write_close();
mysqli_close($link);
?>