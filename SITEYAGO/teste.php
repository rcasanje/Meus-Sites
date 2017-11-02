<?php
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

//$data['email'] = 'minhaideiaimpressa@gmail.com';
//$data['token'] = '137A896E54C9481B9936C5654CAE616D';
$data['email'] = 'rafael.casanje@gmail.com';
$data['token'] = '60A594AC4E0544A299CEDBF1F918A5AB';
$data['currency'] = 'BRL';
$data['itemId1'] = $_POST['itemId1'];
$data['itemDescription1'] = $_POST['itemDescription1'];
$data['itemAmount1'] = $_POST['itemAmount1'];
$data['itemQuantity1'] = $_POST['itemQuantity1'];
$data['itemWeight1'] = '1';
$data['reference'] = 'REF1234';
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

echo $xml;

$code = substr($xml, 0, strpos($xml, date('Y-m-d')));
$urlpayment = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$code;
//echo "<br>".$urlpayment;
header('Location: '.$urlpayment);
?>
<html>
<head>
	<script src="js/jquery.min.js"></script>
	<meta charset="utf-8">
	<title>Teste pagseguro</title>
</head>

<body>
	<div id="contentViewer"></div>
</body>	
</html>

<script>
	/*var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		   // Typical action to be performed when the document is ready:
		   document.getElementById("contentViewer").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("GET", "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout", true);
	xhttp.send();*/
</script>