<?php
function criptografar($string){
	$metodo = "aes-256-ctr";
	$chave = "casanjeintels";
	$iv = "casagrandeintels";
	$encrypt = openssl_encrypt($string, $metodo, $chave, 0, $iv);
	return $encrypt;
}

function descriptografar($encstr){
	$metodo = "aes-256-ctr";
	$chave = "casanjeintels";
	$iv = "casagrandeintels";
	$decrypt = openssl_decrypt($encstr, $metodo, $chave, 0, $iv);
	return $decrypt;
}

function erroRegistro($ID){
	$erroString = "";
	switch($ID){
		case -1:
			$erroString = "Houve algum erro com a conexão com o banco de dados. Contate o administrador do site.";
			break;
		case 0:
			$erroString = "Não há nenhum erro";
			break;
		case 1:
			$erroString = "O número de CPF informado já está em uso.";
			break;
		case 2:
			$erroString = "O E-Mail informado já está em uso.";
		case 3:
			$erroString = "O E-Mail e CPF informado já está em uso.";
			break;
	}
	return $erroString;
}

function erroRegistroAdmin($ID){
	$erroString;
	switch($ID){
		case -1:
			$erroString = "Houve algum erro com a conexão com o banco de dados. Contate o administrador do site.";
			break;
		case 0:
			$erroString = "Não há nenhum erro";
			break;
		case 1:
			$erroString = "O apelido informado já está em uso.";
			break;
		case 2:
			$erroString = "O E-Mail informado já está em uso.";
		case 3:
			$erroString = "O E-Mail e apelido informado já está em uso.";
			break;
	}
	return $erroString;
}

function erroRegistroCoord($ID){
	$erroString;
	switch($ID){
		case -1:
			$erroString = "Houve algum erro com a conexão com o banco de dados. Contate o administrador do site.";
			break;
		case 0:
			$erroString = "Opa! Não há nenhum erro";
			break;
		case 1:
			$erroString = "O apelido informado já está em uso.";
			break;
		case 2:
			$erroString = "O E-Mail informado já está em uso.";
			break;
		case 3:
			$erroString = "O E-Mail e Apelido informado já está em uso.";
			break;
		case 4:
			$erroString = "Código de indicação já está em uso.";
			break;
		default:
			$erroString = "Houve algum erro! Erro: $ID";
			break;
	}
	return $erroString;
}

function erroRegistroCliente($ID){
	$erroString;
	switch($ID){
		case -1:
			$erroString = "Houve algum erro com a conexão com o banco de dados. Contate o administrador do site.";
			break;
		case 0:
			$erroString = "Não há nenhum erro";
			break;
		case 1:
			$erroString = "O apelido informado já está em uso.";
			break;
		case 2:
			$erroString = "O E-Mail informado já está em uso.";
		case 3:
			$erroString = "O E-Mail e apelido informado já está em uso.";
			break;
		case 11:
			$erroString = "Obrigado por se cadastrar no sistema.";
			break;
		default:
			$erroString = "Houve algum erro! Erro: $ID";
			break;
	}
	return $erroString;
}

function erroLoginAdmin($ID){
	$erroString;
	switch($ID){
		case -1:
			$erroString = "Houve algum erro com a conexão com o banco de dados. Contate o administrador do site.";
			break;
		case 0:
			$erroString = "Não há nenhum erro";
			break;
		case 1:
			$erroString = "Nome ou senha estão incorretos";
			break;
	}
	return $erroString;
}
?>