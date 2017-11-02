<?php
include("conexoes/admin-access.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$codigoU = $_POST['codigoU'];

$dadosq['query'] = ['UPDATE colaboradores SET ', '', '', '', '',''];

$confirmacao = 4;

if($nome != ""){
	$dadosq['query'][1] = "nome='$nome'";
	$confirmacao--;
}

if($apelido != ""){
	$dadosq['query'][2] = "apelido='$apelido'";
	$confirmacao--;
}
if($email != ""){
	$dadosq['query'][3] = "email='$email'";
	$confirmacao--;
}
if($codigoU != ""){
	$dadosq['query'][4] = "codigoUnico='$codigoU'";
	$confirmacao--;
}

$virgula = 3-$confirmacao;
for($i=2;$i<=10;$i++){
	if($virgula > 0){
		if($dadosq['query'][$i] != ""){
			$dadosq['query'][$i] = $dadosq['query'][$i].', ';
			$virgula--;
		}
	}
}

$dadosq['query'][5] = "WHERE id=$id";

$manual = true;
if($confirmacao !=4 and $manual = true){
	$dados = $dadosq['query'][0].$dadosq['query'][1].$dadosq['query'][2].$dadosq['query'][3].$dadosq['query'][4].$dadosq['query'][5];

	if($query = mysqli_query($link, $dados)){
		echo "Sucesso";
	} else{
		echo "Algo deu errado: ".mysqli_error($link);
	}
} else{
	echo "Não foi enviado por que não houve alterações";
}

mysqli_close($link);

header("Location: ../zAdministrativa/usuarios-funcionarios.php");
?>