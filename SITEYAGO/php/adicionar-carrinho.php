<?php
if(!isset($_SESSION)) session_start();

$id = $_POST['id'];
$qntd = $_POST['qntd'];

$sessionProdID = $_SESSION['Produtos']['idprodutos'];

if(substr_count($sessionProdID, $id) >= 1){	
	$posIItem = strpos($sessionProdID, $id);
	$posFItem = strrpos($sessionProdID, ",", $posIItem);
	
	$prodqntd = substr($sessionProdID, $posFItem-3, $posFItem-2) + 1;
		
	$substituir = $id."[$prodqntd]";
	
	$edicao = substr_replace($sessionProdID, $substituir, $posIItem, $posFItem);
	$_SESSION['Produtos']['idprodutos'] = $edicao;
	
	printf("Pos I Item: %s
			Pos F Item: %s
			Quantidade: %s
			Substituição: %s
			String Editada: %s
			Sessão completa: %s", $posIItem, $posFItem, $prodqntd, $substituir, $edicao, $_SESSION['Produtos']['idprodutos']);
} else{
	$_SESSION['Produtos']['idprodutos'] .= $id."[1],";
	printf("Item adicionado
			Sessão completa: %s", $sessionProdID);
}
 

$_SESSION['Produtos']['quantidade'] = $qntd;
?>