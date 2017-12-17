<?php
if(!isset($_SESSION)) session_start();

$sessionProdID = "";
$sessionQntdID = 0;
$posIItem = 0;
$posFItem = 0;
$edicao = "";

$id = $_POST['id'];
$qntd = $_POST['qntd'];

$sessionProdID = $_SESSION['Produtos']['idprodutos'];
$sessionQntdID = $_SESSION['Produtos']['quantidade'];

$posIItem = strpos($sessionProdID, $id);

$strinfPosFItem = $id."[".$qntd."],";
$posFItem = strlen($strinfPosFItem);

$edicao = substr_replace($sessionProdID, "", $posIItem, $posFItem);

$_SESSION['Produtos']['idprodutos'] = $edicao;
$_SESSION['Produtos']['quantidade'] = $sessionQntdID - $qntd;

/*printf("Pos I Item: %s
		Tamanho da String: %s
		ID para remover: %s[%s]
		String Editada: %s
		Sessão completa: %s", $posIItem, $posFItem, $id, $qntd, $edicao, $_SESSION['Produtos']['idprodutos']);*/
?>