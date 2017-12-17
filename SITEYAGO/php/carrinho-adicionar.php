<?php
if(!isset($_SESSION)) session_start();

$id = $_POST['id'];
$qntd = $_POST['qntd'];

$sessionProdID = $_SESSION['Produtos']['idprodutos'];
$sessionQntdID = $_SESSION['Produtos']['quantidade'];

if(substr_count($sessionProdID, $id) >= 1){
	$posIItem = strpos($sessionProdID, $id);
	$posFItem = strpos($sessionProdID, ",", $posIItem);

	$qntdatual = substr($sessionProdID, -3, -2);
	$prodqntd = $qntdatual + 1;

	$substituir = $id."[$prodqntd]";

	$edicao = substr_replace($sessionProdID, $substituir, $posIItem, $posFItem);
	if($edicao[strlen($edicao)-1] == ","){
		$_SESSION['Produtos']['idprodutos'] = $edicao;	
	} else{
		$_SESSION['Produtos']['idprodutos'] = $edicao.",";
	}

	printf("Pos I Item: %s
			Pos F Item: %s
			Quantidade: %s (%s)
			Substituição: %s
			String Editada: %s
			Sessão completa: %s", $posIItem, $posFItem, $prodqntd, $qntdatual, $substituir, $edicao, $_SESSION['Produtos']['idprodutos']);
} else{
	$_SESSION['Produtos']['idprodutos'] .= $id."[1],";
	printf("Item adicionado
			Sessão completa: %s", $_SESSION['Produtos']['idprodutos']);
}

$_SESSION['Produtos']['quantidade'] = $qntd;

?>