<?php
$letras = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$numeros = array(0,1,2,3,4,5,6,7,8,9);

$captcha = "";

for($i=0; $i<=3; $i++){
	$rand1 = rand(1,25);
	$rand2 = rand(0,9);
	$captcha = $captcha.$letras[$rand1].$numeros[$rand2];
}

if(isset($_SESSION)){
	$_SESSION['User']['captcha'] = $captcha;
}
echo("Captcha: ".$captcha);
?>