<?php
function txtToArray($caminho, $separador = ";"){
	$linha = "";
	
	$linha = explode($separador, file_get_contents($caminho));
	
	return $linha;
}
?>