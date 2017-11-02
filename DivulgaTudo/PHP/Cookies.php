<?php
	if(!isset($_SESSION['User']['chave'])){
		$_SESSION['User']['chave'] = "null";
	}
	if(!isset($_SESSION['User']['erro'])){
		$_SESSION['User']['erro'] = 0;
	}
	if(!isset($_SESSION['User']['permissao'])){
		$_SESSION['User']['permissao'] = 0;
	}
?>