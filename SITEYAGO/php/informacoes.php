<?php
function errosLogin($num){
	$erro = "";
	switch($num){
		case 10:
			$erro = "Login ou senha incorretos";
			break;
		default:
			$erro = "Erro desconhecido! Número do erro: ".$num;
	}
	return $erro;
}
?>