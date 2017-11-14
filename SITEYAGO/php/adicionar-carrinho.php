<?php
if(!isset($_SESSION)) session_start();

$id = $_POST['id'];
$qntd = $_POST['qntd'];

$_SESSION['Produtos']['quantidade'] = $qntd;
$_SESSION['Produtos']['idprodutos'] .= $id.",";
?>