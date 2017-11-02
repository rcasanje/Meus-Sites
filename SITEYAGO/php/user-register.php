<?php
include("conexoes/user-access.php");

if(isset($_SESSION)) session_start();
if(isset($_POST['termos'])) $termos = 1; else $termos = 0;

$continuar = 0;

$senha = $_POST['password'];
$csenha = $_POST['cpassword'];
$email = $_POST['email'];
$cemail = $_POST['cemail'];

verificarSenha($senha, $csenha);
verificarEmail($email, $cemail);

if($continuar > 0){
	switch($continuar){
		case 1:
			exit('As senhas informados não são iguais');
			break;
		case 2:
			exit('Os email informadas não são iguais');
			break;
		case 3:
			exit('As senhas e email informados não são iguais');
			break;
	}
} else{
	if($termos == 1){
		$nome = $_POST['nomecomp'];
		$login = $_POST['login'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$cep = $_POST['cep'];
		$rua = $_POST['endereco'];
		$numero = $_POST['numero'];
		$complemento = $_POST['compl'];
		$bairro = $_POST['bairro'];
		$municipio = $_POST['municipio'];
		$uf = $_POST['estado'];
		$dataNasc = $_POST['dataNasc'];

		$endereco = $rua.", ".$numero.", ".$complemento;
		$cidade = $uf.", ".$municipio.", ".$bairro;


		if(isset($_POST['newsletter']))	$newsletter = 1; else $newsletter = 0;
		if(isset($_POST['promocoes'])) $promocao = 1; else $promocao = 0; 

		$dados = "INSERT INTO usuarios(nome_user, login_user, senha_user, email_user, rg_user, cpf_user, telefone_user, celular_user, cep_user, endereco_user, cidade_user, newsletter_user, promocao_user, dataNasc_user) VALUES ('$nome', '$login', '$senha', '$email', '$rg', '$cpf', '$telefone', '$celular', '$cep', '$endereco', '$cidade', '$newsletter', '$promocao', '$dataNasc')";

		if($query = mysqli_query($conn, $dados)){
			exit('Sucesso! Dados enviado com êxito');
			$_SESSION['User']['Nome'] = $nome;
			$_SESSION['User']['Login'] = $login;
			$_SESSION['User']['Permissao'] = 0;
		} else{
			if (mysqli_errno($conn) == 1366){
				printf("Por favor preencha todos os campo obrigatórios");
			} else{
				printf("Houve algum erro com a conexão com o banco de dados! \nContate um administrador da página ou tente novamente mais tarde \n\nCódigo do Erro: %s \nDescrição do erro: %s", mysqli_errno($conn), mysqli_error($conn));
			}
		}

	} else{
		exit('Leia e aceite os termos de uso para se cadastrar.');
	}
}

session_write_close();
mysqli_free_result($query);
mysqli_close($conn);

function verificarSenha($pass1, $pass2){
	if($pass1 != $pass2){
		$continuar[0] = 1;
	}
}

function verificarEmail($email1, $email2){
	if($email1 != $email2){
		$continuar[1] = 1;
	}
}
?>