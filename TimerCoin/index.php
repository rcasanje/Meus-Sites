<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/Index.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<title>Inicio :: TimerCoin</title>
</head>
<body onLoad="controls();">
<header>
<?php include ("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="principal">
<?php
	include("PHP/conexao_user.php");
	//include("PHP/conexao_timers.php");
	$ntimer = 0;

	$dados = "SELECT * FROM timers";
	$query = mysqli_query($link, $dados);
	$row_cnt = mysqli_num_rows($query);

	if($row_cnt == 0){
		printf('<div class="alert alert-info">Você não tem contadores! <a href="#">Clique aqui</a> para adicionar um.</div>');
	} else {
		while($icount = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$id = $icount['id'];
			$idkey = $icount['idkey'];
			$apelido = $icount['apelido'];
			$nomec = $icount['nome'];
			$carimbot = $icount['carimbodh'];
			$trecarga = $icount['trecarga'];
			$sombrats = $icount['sombrats'];
			$linkred = $icount['redlink'];
			$imagem = $icount['imagem'];

			$anos = substr($carimbot, 0, 4);
			$mess = substr($carimbot, 5, 2);
			$dias = substr($carimbot, 8, 2);
			$horas = substr($carimbot, 11, 2);
			$minutos = substr($carimbot, 14, 2);
			$segundos = substr($carimbot, 17, 2);

			$anoa = date('Y');
			$mesa = date('m');
			$diaa = date('d');
			$horaa = date('H');
			$minutoa = date('i');
			$segundoa = date('s');
			
			$timestamp = ((($anos-$anoa)* 24 * 3600 * 365) + (($mess-$mesa)* 30 * 24 * 3600) + (($dias-$diaa)* 24 * 3600) + (($horas-$horaa)* 3600) + (($minutos-$minutoa)*60) + ($segundos-$segundoa)) - $sombrats;
			//echo($timestamp.'<br>');

			$pass = hex2bin("6b463fe384003ae6307d8952e3f3ccc0");
			$iv = hex2bin("7f7c89653cd4504534d1596cc08f6f7b");
			$toencrypt = $idkey;
			$idkeysec = openssl_encrypt($toencrypt, 'aes-256-ofb', $pass, OPENSSL_RAW_DATA, $iv);

			printf('
				<div class="panel panel-default">
					<div class="panel-heading">
					  	<h3 class="panel-title" align="center">%s</h3>
					</div>
					<div class="panel-body">
					    <div style="width: 20%%; float: left">
					    	<img src="Imagens/freebitcoin.jpg" width="98%%" height="100"/>
					    </div>
					    <div style="width: 80%%; float: right;">
					    	<button type="button" class="btn btn-primary" onclick="acessarSite(%s);">Acessar site</button>
					    	<button type="button" class="btn btn-primary" onclick="atualizar(%s);">Atualizar</button>
					    	<button type="button" class="btn btn-primary" onclick="acessarAtualizar(%s);">Acessar site e recomeçar</button>
					    	<div id="configButtons%s" style="float: right;">
						    	<button type="button" class="btn btn-info" id="%s">Configurações</button>
						    </div>
					    </div>
					    <div id="showTimes%s" style="float: left; margin-top: 4.2%%">Tempo</div>

					</div>
					<div class="panel-footer">
						<div class="progress">
							<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="3" aria-valuemax="100" style="width: 3%%">
								<p id="showPorcentagem">0%%</p>
						  	</div>
						</div>
					</div>
				</div>', $nomec, $ntimer, $ntimer, $ntimer, $ntimer, $idkeysec, $ntimer);

			$json[$ntimer]['ano'] = $anos;
			$json[$ntimer]['mes'] = $mess;
			$json[$ntimer]['dia'] = $dias;
			$json[$ntimer]['hora'] = $horas;
			$json[$ntimer]['minuto'] = $minutos;
			$json[$ntimer]['segundo'] = $segundos;
			$json[$ntimer]['timestamp'] = 0;
			$json[$ntimer]['cooldown'] = 0;
			$json[$ntimer]['secondsts'] = 0;

			$ntimer++;
			$json['ncount'] = $ntimer;
		}
	}
?>
</div>
</body>
<script>
var num;
function controls(){
	console.log("Yay!!! Você está no console do site!");
	num = 0;
}

function controleContador(){
	if(num == 0){
		var count = <?php echo(json_encode($json)); ?>;
		var ncount = count['ncount'];

		var ID = [];
		var IDKey = [];
		var nickanem = [];
		var name = [];
		var timestamp = [];
		var cooldown = [];
		var sombrats = [];

		var ano = [];
		var mes = [];
		var dia = [];
		var hora = [];
		var minuto = [];
		var segundo = [];

		var cstatus = [];

		for(var i = ncount; i--; i>= 0){
			ID.unshift(count[i]['id']);
			IDKey.unshift(count[i]['idkey']);
			timestamp.unshift(count[i]['timestamp']);
			cooldown.unshift(count[i]['cooldown']);

			ano.unshift(count[i]['ano']);
			mes.unshift(count[i]['mes']);
			dia.unshift(count[i]['dia']);
			hora.unshift(count[i]['hora']);
			minuto.unshift(count[i]['minuto']);
			segundo.unshift(count[i]['segundo']);

			contador.unshift(ano[i] + "/" + mes[i] + "/" + dia[i] + " - " + hora[i] + ":" + minuto[i] + ":" + segundo[i]);
			cstatus.unshift(0);
		}

		num = 1;
	}
}

function helping(){
	console.log("Você pediu ajuda ?");
}
</script>
</html>