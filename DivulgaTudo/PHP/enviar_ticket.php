<?php
/*$_SESSION['User']['erro'] = -1;
header("Location: ../Contato.php");*/

include ("conexao.php");

if(!isset($_SESSION)) session_start();
$email_remetente = $_POST['email'];
$assunto = $_POST['assunto'];
$problema = $_POST['problema'];
$email_conteudo = $_POST['descricao'];
$rcaptcha = $_POST['vcaptcha'];

if(isset($_SESSION['User']['apelido'])){
	$apelido = $_SESSION['User']['apelido'];
} else{
	$apelido = "Não registrado";
}

$status = "Aberto";

$query = "INSERT INTO ticket(apelido, email, assunto, problema, descricao, status) VALUES ('$apelido','$email_remetente','$assunto','$problema','$email_conteudo', '$status')";
if($inserir = mysqli_query($link, $query) or die(mysqli_error($link))){
	$_SESSION['User']['erro'] = 1;
}

header("Location: ../Contato.php");
?>