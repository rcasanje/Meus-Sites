<?php
if(!isset($_SESSION)) session_start();

$qntd = $_POST['qntd'];

$_SESSION['Produtos']['quantidade'] = $qntd;

$dados = "SELECT * FROM `produtos` WHERE `codigo_prod` in ('10100','10101','10102','10103')";
?>