<?php
include("conexoes/admin-access.php");

$id = $_POST['id'];

$dados = "DELETE FROM scolaboradores WHERE id=$id";
if($query = mysqli_query($link, $dados)){
	echo "Sucesso";
} else{
	echo "Algo deu errado: ".mysqli_error($link);
}

mysqli_close($link);

header("Location: ../zAdministrativa/perfil-col.php?id=1&cu=AAA2017&tab=col&mode=0");
?>