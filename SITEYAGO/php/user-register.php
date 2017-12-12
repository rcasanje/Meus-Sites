<?php
include("conexoes/user-access.php");
include("comandos.php");

$news = false;

if(isset($_SESSION)) session_start();

$apelido = $_POST['apelido'];
$senha = encryptInfo($_POST['senha']);
$email = $_POST['email'];

$nome = $_POST['nomecompleto'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$datanascimento = $_POST['datanascimento'];
$sexo = $_POST['genero'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

$estado = $_POST['estado'];
$municipio = $_POST['municipio'];
$uf = $_POST['UF'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$logradouro = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$referencia = "casanje";

if(isset($_POST['newsletter'])){
	$newsletter = 1;
} else{
	$newsletter = 0;
}

if(isset($_POST['promocoes'])){
	$newsletter = 1;
} else{
	$newsletter = 0;
}

$dados = "INSERT INTO contas (apelido_con, senha_con, email_con, nome_con, cpf_con, rg_con, dataNasc_con, sexo_con, telefone_con, celular_con, estado_con, municipio_con, UF_con, bairro_con, cep_con, logradouro_con, numcasa_con, complemento_con, referencia_con, newsletter_con) VALUES ('$apelido', '$senha', '$email', '$nome', '$cpf', '$rg', '$datanascimento', '$sexo', '$telefone', '$celular', '$estado', '$municipio', '$uf', '$bairro', '$cep', '$logradouro', '$numero', '$complemento', '$referencia', '$newsletter')";

if($query = mysqli_query($conn, $dados)){
	printf('Dados enviados com sucesso');
	$_SESSION['Erro']['registro'] = -1;
	$_SESSION['User']['ID'] = $apelido;
	header("Location: ../painel.php");
} else{
	printf('Dados: %s<br>Erro #:%s<br>Descrição: %s<br>', $dados, mysqli_errno($conn), mysqli_error($conn));
	$_SESSION['Erro']['registro'] = mysqli_error($conn);
	header("Location: ../acesso.php");
}
?>