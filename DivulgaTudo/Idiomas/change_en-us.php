<?php 
	setcookie('lang', '', (time() + 0));
	setcookie('lang', 'en-us', (time() + (7 * 24 * 3600)));
	$back = $_SERVER['HTTP_REFERER'];
	header('Location: ../Index.php' );
?>