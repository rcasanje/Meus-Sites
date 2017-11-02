<?php
include("conexoes/admin-access.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$nomeMae = $_POST['nomeMae'];
$nomePai = $_POST['nomePai'];
$dataNasc = $_POST['dataNasc'];
$endereco = $_POST['rua'];
$municipio = $_POST['municipio'];
$bairro = $_POST['bairro'];
$telefone= $_POST['telefone'];
$email = $_POST['email'];
$zonaE = $_POST['zonaE'];
$codigoA = $_POST['codigoA'];
$permissao = $_POST['permissao'];

$dadosq['query'] = ['UPDATE clientes SET ', '', '', '', '','','','','','','','','','',''];

$confirmacao = 13;
$strings = $confirmacao;

if($nome != ""){
	$dadosq['query'][1] = "nome_cli='$nome'";
	$confirmacao--;
}

if($nomeMae != ""){
	$dadosq['query'][2] = "nomeMae_cli='$nomeMae'";
	$confirmacao--;
}

if($nomeMae != ""){
	$dadosq['query'][32] = "nomePai_cli='$nomeMae'";
	$confirmacao--;
}

if($dataNasc != ""){
	$dadosq['query'][4] = "dataNasc_cli='$dataNasc'";
	$confirmacao--;
}

if($endereco != ""){
	$dadosq['query'][5] = "endereco_cli='$endereco'";
	$confirmacao--;
}

if($municipio != ""){
	$dadosq['query'][6] = "municipio_cli='$municipio'";
	$confirmacao--;
}

if($bairro != ""){
	$dadosq['query'][7] = "bairro_cli='$bairro'";
	$confirmacao--;
}

if($telefone != ""){
	$dadosq['query'][8] = "telefone_cli='$telefone'";
	$confirmacao--;
}

if($email != ""){
	$dadosq['query'][9] = "email_cli='$email'";
	$confirmacao--;
}

if($zonaE != ""){
	$dadosq['query'][10] = "zonaE_cli=$zonaE";
	$confirmacao--;
}

if($codigoA != ""){
	$dadosq['query'][11] = "indicacao_cli='$codigoA'";
	$confirmacao--;
}

if($permissao != ""){
	$dadosq['query'][12] = "permissao_cli='$permissao'";
	$confirmacao--;
}

$virgula = 10-$confirmacao;
for($i=2;$i<=$strings-1;$i++){
	if($virgula > 0){
		if($dadosq['query'][$i] != ""){
			$dadosq['query'][$i] = $dadosq['query'][$i].', ';
			$virgula--;
		}
	}
}

$dadosq['query'][$strings] = " WHERE id_cli=$id";

$manual = true;

if($confirmacao != 11 and $manual == true){
	$dados = $dadosq['query'][0].$dadosq['query'][1].$dadosq['query'][2].$dadosq['query'][3].$dadosq['query'][4].$dadosq['query'][5].$dadosq['query'][6].$dadosq['query'][7].$dadosq['query'][8].$dadosq['query'][9].$dadosq['query'][10].$dadosq['query'][11].$dadosq['query'][12];

	if($query = mysqli_query($link, $dados)){
		echo "Sucesso";
	} else{
		echo "Algo deu errado: ".mysqli_error($link);
	}
} else{
	echo "Não foi enviado por que não houve alterações";
}

mysqli_close($link);

header("Location: ../zAdministrativa/usuarios-cliente.php");
?>