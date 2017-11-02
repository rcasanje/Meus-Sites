<?php
	//$conn = mysqli_connect("mysql.hostinger.com.br","u463369051_user","R@f@el2010","u463369051_user");
	$conn = mysqli_connect("root_public.mysql.dbaas.com.br","root_public","R@f@el2010","root_public");
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>