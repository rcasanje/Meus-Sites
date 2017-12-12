<?php
function txtToArray($caminho, $separador = ";"){
	$array = array();
    $abertura = fopen($caminho, "r");
    $leitura = fread($abertura, filesize($caminho));
    fclose($abertura);
    $array = explode(";", $leitura);
	
	return $array;
}

function arrayToString($array){
	$data = "Somthing went wrong. Contact the administradtor";
	if(is_array($array)){
		$data = "Array passing to foreach";
		foreach($array as $key => $value){
			$data .= "ID ".$key.". Value: ".$value;
		}
	} else{
		$data = "The variable you passing isn't a array";
	}
	
	return $data;
}

function encryptInfo($string, $algo="sha512"){
	$encrypted = "";
	$encrypted = hash($algo, $string);
	return $encrypted;
}
?>