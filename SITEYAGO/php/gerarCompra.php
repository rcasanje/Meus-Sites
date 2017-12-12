<?php
include("conexoes/user-access.php");

$continuar = false;

if(!isset($_SESSION)) session_start();

if(isset($_SESSION['User']['ID'])){
	$apelido = $_SESSION['User']['ID'];
	$continuar = true;
} else{
	$continuar = false;
	header("Location: ../acesso.php");
}

if($continuar == true){
	$dados = "SELECT nome_con, telefone_con, email_con, logradouro_con, numcasa_con, complemento_con, bairro_con, cep_con, municipio_con, estado_con, UF_con FROM contas WHERE apelido_con='$apelido'";

	if($query = mysqli_query($conn, $dados)){
		if($info = mysqli_fetch_array($query, MYSQL_ASSOC)){
			$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

			$data['email'] = 'minhaideiaimpressa@gmail.com';
			$data['token'] = '333AA1F752AE4B2B9564C03279D9E6A4';
			//$data['email'] = 'rafael.casanje@gmail.com';
			//$data['token'] = '60A594AC4E0544A299CEDBF1F918A5AB';
			$data['currency'] = 'BRL';

			$itemlimite = 1000000;
			for($i = 1;$i <= $itemlimite;$i++){
				if(isset($_POST['itemId'.$i])){
					$data['itemId'.$i] = $_POST['itemId'.$i];
					$data['itemDescription'.$i] = $_POST['itemDescription'.$i];
					$data['itemAmount'.$i] = $_POST['itemAmount'.$i];
					$data['itemQuantity'.$i] = $_POST['itemQuantity'.$i];
					$data['itemWeight'.$i] = '1';
				} else{
					$i = $itemlimite+1;
				}
			}

			$data['reference'] = '';
			$data['senderName'] = $info['nome_con'];
			$data['senderAreaCode'] = substr($info['telefone_con'], 0, 2);
			$data['senderPhone'] = substr($info['telefone_con'], 3);
			$data['senderEmail'] = $info['email_con'];
			$data['shippingType'] = '2';
			$data['shippingAddressStreet'] = $info['logradouro_con'];
			$data['shippingAddressNumber'] = $info['numcasa_con'];
			$data['shippingAddressComplement'] = $info['complemento_con'];
			$data['shippingAddressDistrict'] = $info['bairro_con'];
			$data['shippingAddressPostalCode'] = $info['cep_con'];
			$data['shippingAddressCity'] = $info['municipio_con'];
			$data['shippingAddressState'] = $info['UF_con'];
			$data['shippingAddressCountry'] = 'BRA';
			$data['redirectURL'] = 'index.php';
			
			var_dump($data);
			$data = http_build_query($data);

			$curl = curl_init($url);

			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			$xml= curl_exec($curl);

			//echo $xml;

			$xml= simplexml_load_string($xml);
			$urlpayment = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code;
			echo "<br>".$urlpayment;
			//header('Location:'.$urlpayment);
		}
	} else{
		printf('Houve algum erro na busca com o banco de dados.<br>Erro: %s<br>', mysqli_error($conn));
	}
}
?>