<?php
if(!isset($_SESSION)) session_start();
function verificarConta($string){
	switch($string){
		case "isRegisteredLogged":
			if(!isset($_SESSION['User']['Nome'])){
				header("Location: acesso.php");
			} else{
				
			}
			break;
	}
}

session_write_close();
?>