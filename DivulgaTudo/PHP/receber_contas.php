<html>
<meta charset="utf-8">
</html>
<?php
	include("conexao.php");
	
	$nick = $_POST['apelidol'];
	$senha = mysqli_real_escape_string($link, $_POST['lsenha']);
	
	/*$dados = "SELECT apelido, senha FROM contas WHERE (apelido = '". $nick ."') AND (senha = '". sha1($senha) ."') LIMIT 1";*/
	$dados = "SELECT apelido, senha FROM contas WHERE apelido='$nick' AND senha='$senha' LIMIT 1";
	
	if ($result = mysqli_query($link, $dados)) {
		$row_count = mysqli_num_rows($result);
		if (!isset($_SESSION)) session_start();
		echo("Conta: ".$row_count."<br>");
		if ($row_count == 0) {
			$_SESSION['User']['erro'] = 5;
			header("Location: ../Painel.php");
		} else {
			$dado_idtoken = "SELECT idkey, apelido, timezone, permissao FROM contas WHERE apelido='$nick' AND senha='$senha'";
			$dado_user = mysqli_query($link, $dado_idtoken);
			$pegaracc = mysqli_fetch_array($dado_user, MYSQLI_ASSOC);
			//printf("Token: %s. Apelido: %s. Erro: %s", $idtoken['idkey'], $idtoken['apelido'], mysqli_error($link));
			$dadoslogin = array($pegaracc['idkey'], $pegaracc['apelido'], $pegaracc['timezone']);
			date_default_timezone_set("$dadoslogin[2]");
			$data = date('d/m/Y H:i:s');
			
			mysqli_query($link, "UPDATE contas SET ultimologin='$data' WHERE idkey='$dadoslogin[0]' AND apelido='$dadoslogin[1]'");
			
			$_SESSION['User']['apelido'] = $dadoslogin[1];
			$_SESSION['User']['chave'] = $dadoslogin[0];
			$_SESSION['User']['permissao'] = $dadoslogin[4];
			$_SESSION['User']['erro'] = 0;
			header("Location: ../Painel.php");
		}
	}
	
	mysqli_close($link);
	session_write_close();
?>