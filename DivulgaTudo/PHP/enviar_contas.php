<html>
<head>
<meta charset="utf-8">
</head>
</html>
<?php	
	if(!isset($_SESSION)) session_start();
	$link = mysqli_connect('localhost','root','vertrigo','divulgatube');
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$nome1 = $_POST['name']['first'];
	$nome2 = $_POST['name']['last'];
	$nick = mysqli_real_escape_string($link, $_POST['apelido']);
	$password = mysqli_real_escape_string($link, $_POST['senha']);
	$email = $_POST['email'];
	$dia = $_POST['ddia'];
	$mes = $_POST['dmes'];
	$ano = $_POST['dano'];
	$canalyt = $_POST['linkch'];
	$gender = $_POST['sexo'];
	
	$birthday = $dia."/".$mes."/".$ano;
	$nome = $nome1." ".$nome2;
	$token_idkey = md5(uniqid(rand(), true));
	$data = date('d/m/Y H:i:s');
	
	$dados = "INSERT INTO contas(idkey, nome, apelido, email, senha, aniversario,  sexo, youtubech, status, timezone, ultimologin) VALUES ('$token_idkey','$nome','$nick','$email','$password','$birthday','$gender','$canalyt','0', 'America/Sao_Paulo','$data')";
	
	$verificaremail = false;
	$verificalnick = false;
	$continuar = true;
	
	if($existeemail = mysqli_query($link, "SELECT * FROM contas WHERE email='$email'")){
		$linhaemail = mysqli_num_rows($existeemail);
		if($linhaemail > 0){
			$verificaremail = true;
		}
	}
	if($existenick = mysqli_query($link, "SELECT * FROM contas WHERE apelido='$nick'")){
		$linhanick = mysqli_num_rows($existenick);
		if($linhanick > 0){
			$verificalnick = true;
		}
	}
	
	if($dia > 31){
		$continuar = false;
		$_SESSION['User']['erro'] = 10;
	}
	
	if($mes > 12){
		$continuar = false;
		$_SESSION['User']['erro'] = 11;
	} else{
		if($mes == 2){
			if($dia > 28){
				$continuar = false;
				$_SESSION['User']['erro'] = 12;
			}
		}
	}
	
	if($ano > date('Y')){
		$continuar = false;
		$_SESSION['User']['erro'] = 13;
	}
	
	if ($continuar == true){
		if($verificaremail == false and $verificalnick == false and $nick != ""){
			if(mysqli_query($link,$dados) or die(mysqli_error($link))){
				$_SESSION['User']['chave'] = $token_idkey;
				$_SESSION['User']['apelido'] = $nick;
				$_SESSION['User']['erro'] = 0;
			}
		}else{
			$_SESSION['User']['erro'] = 1;
		}
	}
	header("Location: ../Painel.php");
	mysqli_close($link);
	session_write_close();
?>