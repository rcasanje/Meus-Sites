<?php
include("conexoes/cdc-access.php");

$postID = $_POST['postID'];

$dados = "DELETE FROM fotos WHERE id='$postID'";
if($query = mysqli_query($link, $dados)){
	echo("Linha ".$postID." deletada com sucesso");
} else{
	echo("Houve alguma falha ao deletar a linha ".$postID);
}

mysqli_close($link);
?>