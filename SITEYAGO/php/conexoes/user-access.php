<?php
	//$conn = mysqli_connect("mysql.hostinger.com.br","u463369051_user","R@f@el2010","u463369051_user");
	$conn = mysqli_connect("localhost","root","vertrigo","atualmk");
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>