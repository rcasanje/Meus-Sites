<?php
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

//$data['email'] = 'minhaideiaimpressa@gmail.com';
//$data['token'] = '137A896E54C9481B9936C5654CAE616D';
$data['email'] = 'rafael.casanje@gmail.com';
$data['token'] = '60A594AC4E0544A299CEDBF1F918A5AB';
$data['currency'] = 'BRL';

$itemlimite = 1000000;
for($i = 1;$i <= $itemlimite;$i++){
	if($_POST['itemId'.$i]){
		$data['itemId'.$i] = $_POST['itemId'.$i];
		$data['itemDescription'.$i] = $_POST['itemDescription'.$i];
		$data['itemDescription'.$i] = $_POST['itemDescription'.$i];
		$data['itemAmount'.$i] = $_POST['itemAmount'.$i];
		$data['itemQuantity'.$i] = $_POST['itemQuantity'.$i];
		$data['itemWeight'.$i] = '1';
	} else{
		$i = $itemlimite+1;
	}
}

$data['reference'] = '';
$data['senderName'] = 'Jose Comprador';
$data['senderAreaCode'] = '11';
$data['senderPhone'] = '56273440';
$data['senderEmail'] = 'comprador@uol.com.br';
$data['shippingType'] = '1';
$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
$data['shippingAddressNumber'] = '1384';
$data['shippingAddressComplement'] = '5o andar';
$data['shippingAddressDistrict'] = 'Jardim Paulistano';
$data['shippingAddressPostalCode'] = '01452002';
$data['shippingAddressCity'] = 'Sao Paulo';
$data['shippingAddressState'] = 'SP';
$data['shippingAddressCountry'] = 'BRA';
$data['redirectURL'] = 'http://www.sounoob.com.br/paginaDeAgracedimento';

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
$urlpayment = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code;
echo "<br>".$urlpayment;
header('Location:'.$urlpayment);
?>