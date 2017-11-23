<?php
include("conexoes/user-access.php");

if(isset($_SESSION)) session_start();

$termUse = false;
$termPrivacy = false;;
$newsletter = false;


$apelido = $_POST['apelido'];
$senha = $_POST['senha'];
$csenha = $_POST['csenha'];
$email = $_POST['email'];
$cemail = $_POST['cemail'];

$nome = $_POST['nomecompleto'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$datanascimento = $_POST['datanascimento'];
$sexo = $_POST['genero'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$logradouro = $_POST['endereco'];
$numero = $_POST['numero'];

$termouso = $_POST['termuse'];
$termoprivacidade = $_POST['termprivacy'];
$newsletter = $_POST['newsletter'];

if(isset($termouso)){
	$termUse = true;
}

if(isset($termoprivacidade)){
	$termPrivacy = true;
}



?>