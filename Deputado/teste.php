<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	<div class="container">
		<form method="post" style="margin-left: 25%">
			<input name="string">
			<button type="submit">Converter</button>
		</form>
	</div>
</body>
</html>


<?php
		$string = $_POST['string'];
		for($i=0; $i <= 256; $i++){
			$findme1 = $i;
			$findme2 = ";";
			$pos1 = strpos($string, $findme1);
			$pos2 = strpos($string, $findme2);
			printf('<input value="<option value="%s">%s</option>">', substr($string, $pos1, strlen($pos1)), substr($string, $pos2, strlen($string)));
			
		}
?>