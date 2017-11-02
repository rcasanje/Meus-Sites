<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/Index.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<title>Inicio :: TimerCoin</title>
</head>
<body>
<header>
<?php include ("PHP/barra_de_menu.php");?>
</header>
<div class="container" style="marg">
<?php
	date_default_timezone_set('America/Sao_Paulo');
	echo(date("Y-m-d H:i:s (O)"));
	echo("<br><br>");

	$token = md5(uniqid(rand(), true));
	echo($token."		".strlen($token));
	echo("<br><br>");

	$pass = hex2bin("6b463fe384003ae6307d8952e3f3ccc0");
	$iv = hex2bin("7f7c89653cd4504534d1596cc08f6f7b");
	$toencrypt = "casanje";
	$encrypt = openssl_encrypt($toencrypt, 'aes-256-ofb', $pass, OPENSSL_RAW_DATA, $iv);
	$decrypt = openssl_decrypt($encrypt, 'aes-256-ofb', $pass, OPENSSL_RAW_DATA, $iv);
	echo($encrypt."		".$decrypt);
?>
</div>
</body>
</html>
