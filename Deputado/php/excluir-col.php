<?php
include("conexoes/admin-access.php");

$id = $_POST['id'];

$dados = "DELETE FROM funcionarios WHERE id_fun=$id";
if($query = mysqli_query($link, $dados)){
	echo "Sucesso";
} else{
	echo "Algo deu errado: ".mysqli_error($link);
}

mysqli_close($link);

header("Location: ../zAdministrativa/usuarios-funcionarios.php");
?>