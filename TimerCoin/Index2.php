<html>
<head>
<?php
if(!isset($_SESSION)) session_start();

$offline = 0;

if(isset($_SESSION['Timer']['qntd']) > 0){
	$offline = 0;
} else {
	
}

if($offline == 0){
	echo("O sistema está consultando o banco de dados... Aguarde!<br>");
} else{
	echo("O sistema está consultado os cookies... Aguarde!<br>");
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inicio :: TimerCoin</title>
<link rel="stylesheet" type="text/css" href="CSS/Index.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body onLoad="iniciar();">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container">
  <?php
		include("PHP/conexao.php");
		
		$json = array();
		$horarest = 0;
		$minrest = 0;
		$segrest = 0;
		$ntimer = 0;
		$horats = 0;

		if($offline == 0){ /*Primeira visita... sem cookies (session)*/
			$stimer = "SELECT * FROM timers";
			$ptimer = mysqli_query($link, $stimer);
			
			while($mtimer = mysqli_fetch_array($ptimer, MYSQL_ASSOC)){
				$cooldowntime = $mtimer['cooldown'];
				$timestamotime = $mtimer['timestamp'];
				
				$json[$ntimer]['id'] = $mtimer['id'];
				$json[$ntimer]['link'] = $mtimer['link'];
				$json[$ntimer]['nome'] = $mtimer['nome'];
				$json[$ntimer]['recarga'] = $cooldowntime;
				$json[$ntimer]['imagem'] = $mtimer['imagem'];
				
				
				if(substr($timestamotime, 7, 15) < date('dmY')){
					$json[$ntimer]['cooldown'] = 10000000;
					$diferenca = 0;
				} else{
					$json[$ntimer]['cooldown'] = (substr($mtimer['cooldown'], 0, 2)*3600)+(substr($mtimer['cooldown'], 2, 2)*60)+substr($mtimer['cooldown'], 4, 2);		
					$horats = (substr($timestamotime, 0, 2)*3600)+(substr($timestamotime, 2, 2)*60)+substr($timestamotime, 4, 2);
					$horaat = (date('H', strtotime("-2 hours"))*3600)+(date('i')*60)+(date('s'));
					$diferenca =  $horats-$horaat;
					//printf("<br>Hora Timestamp: %s<br>Hora Atual: %s<br>Diferença: %s <br>", $horats, $horaat, $diferenca);	
				}
						
				
						
				$horatotal = $diferenca;
					
				while ($horatotal != 0){
					if($horatotal >= 3600){
						$horarest++;
						$horatotal -= 3600;
					} elseif ($horatotal >= 60 and $horatotal < 3600){
						$minrest++;
						$horatotal -= 60;				
					} elseif ($horatotal < 60){
						$segrest = $horatotal;
						$horatotal -= $horatotal;
					}
				}
				
				$json[$ntimer]['hora'] = $horarest;
				$json[$ntimer]['minuto'] = $minrest;
				$json[$ntimer]['segundo'] = $segrest;
				$json[$ntimer]['timestamp'] = $diferenca;
				//printf("<br>Hora: %s || Minuto: %s || Segundo: %s<br>", $horarest, $minrest, $segrest);
				
				$ntimestamp = "timestamp".$ntimer;
				
				$_SESSION['Timer']['qntd'] = $ntimer;
				$_SESSION['Timer'][$ntimestamp] = $horats;
				
				$horarest = 0; /*Zera o tempo para não somar com o anterior*/
				$minrest = 0;
				$segrest = 0;
				
				$ntimer = $_SESSION['Timer']['qntd'];

				$ntimer++;
				$json['total'] = $ntimer; 
			}
		} else{ /*Segunda visita... com cookies (session)*/
			$ntimer = $_SESSION['Timer']['qntd'];

			while ($ntimer > 0){
				$ntimestamp = "timestamp".$ntimer;
				$timestamp = $_SESSION['Timer'][$ntimestamp];
				
				$horats = $timestamp;
				$horaat = (date('H', strtotime("-3 hours"))*3600)+(date('i')*60)+(date('s'));
				
				$diferenca =  $horats-$horaat;
				//printf("<br>Hora Timestamp: %s<br>Hora Atual: %s<br>Diferença: %s <br>", $horats, $horaat, $diferenca);
							
				$horatotal = $diferenca;
						
				while ($horatotal != 0){
					if($horatotal >= 3600){
						$horarest++;
						$horatotal -= 3600;
					} elseif ($horatotal >= 60 and $horatotal < 3600){
						$minrest++;
						$horatotal -= 60;				
					} elseif ($horatotal < 60){
						$segrest = $horatotal;
						$horatotal -= $horatotal;
					}
				}
				///echo("Numero do timer: ".$ntimer);
				$json[$ntimer]['hora'] = $horarest;
				$json[$ntimer]['minuto'] = $minrest;
				$json[$ntimer]['segundo'] = $segrest;
				//printf("<br>Hora: %s || Minuto: %s || Segundo: %s<br>", $horarest, $minrest, $segrest);
								
				$horarest = 0; /*Zera o tempo para não somar com o anterior*/
				$minrest = 0;
				$segrest = 0;
			}
		}
		
		for($i = 0; $i <= $_SESSION['Timer']['qntd']; $i++){
			printf('<div id="timers">
					<div class="row">
					  <div class="col-sm-2">
					    <img src="%s" alt="Sem imagem definida" width="185" height="125">
					  </div>
					  <div class="col-sm-10">
						<h4>%s</h4>
						<div class="progress">
						  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="10" aria-valuemin="5" aria-valuemax="100" id="porcem%s">
							<p id="showporc%s">porcentagem</p>
						  </div>
						</div>
						<div class="col-sm-3">
						  <div id="tempo%s">Tempo</div>
						</div>
						<div class="col-sm-3">
						  <div>
							<button class="btn btn-primary" onClick="acessarsite(%s);">Acessar site</button>
						  </div>
						</div>
						<div class="col-sm-3">
						  <div>...</div>
						</div>
						<div class="col-sm-3">
						  <div>Salvar/Alterar/Excluir</div>
						</div>
					  </div>
					</div>
				  </div>', $json[$i]['imagem'], $json[$i]['nome'], $i, $i, $i+1, $i);
		}
	?>
</div>
<script type="text/javascript">
var cron = <?php echo(json_encode($json)); ?>;
var ncron = cron['total'];

var ID = [];
var hora = [];
var minuto = [];
var segundo = [];
var contador = [];
var width = [];
var timestamp = [];
var recarga = [];
var cooldown = [];
var cstatus = [];

for(var i = ncron; i--; i>= 0){
	ID.unshift(cron[i]['id']);
	hora.unshift(cron[i]['hora']);
	minuto.unshift(cron[i]['minuto']);
	segundo.unshift(cron[i]['segundo']);
	contador.unshift(hora[i] + ":" + minuto[i] + ":" + segundo[i]);
	timestamp.unshift(cron[i]['timestamp']);
	recarga.unshift(cron[i]['recarga']);
	cooldown.unshift(cron[i]['cooldown']);
	cstatus.unshift(0);
}

console.log(segundo);

function iniciar(){
	for(var i = ncron; i--; i>= 0){	
		contador[i] = hora[i] + ":" + minuto[i] + ":" + segundo[i];
		
		if(hora[i] <= 0 && minuto[i] <= 0 && segundo[i] <= 0){
			if(timestamp[i] <= 0) {
				timestamp[i] = 0;
				segundo[i] = 0;
				contador[i] = "Acabou";
				cstatus[i] = 1;
			}
		} else if(minuto[i] <= 0 && segundo[i] <= 0){
			hora[i] -= 1;
			minuto[i] = 59;
			segundo[i] = 59;
		} else if(segundo[i] <= 0){
			minuto[i] -= 1
			segundo[i] = 59;
		} else {
			segundo[i] -= 1;
			timestamp[i] -= 1;
		}
		document.getElementById("tempo"+(i+1)).innerText = contador[i];
	}
	
	width01 = ((cooldown[0] - timestamp[0])/cooldown[0])*100;
	width02 = ((cooldown[1] - timestamp[1])/cooldown[1])*100;
	width03 = ((cooldown[2] - timestamp[2])/cooldown[2])*100;
	width04 = ((cooldown[3] - timestamp[3])/cooldown[3])*100;
	width05 = ((cooldown[4] - timestamp[4])/cooldown[4])*100;
	
	twd0 = document.getElementById("porcem0").style.width = width01 + "%";
	twd1 = document.getElementById("porcem1").style.width = width02 + "%";
	twd2 = document.getElementById("porcem2").style.width = width03 + "%";
	twd3 = document.getElementById("porcem3").style.width = width04 + "%";
	twd4 = document.getElementById("porcem4").style.width = width05 + "%";
	
	showporc0.innerText = Math.round(width01, 6) + "%";
	showporc1.innerText = Math.round(width02, 6) + "%";
	showporc2.innerText = Math.round(width03, 6) + "%";
	showporc3.innerText = Math.round(width04, 6) + "%";
	showporc4.innerText = Math.round(width05, 6) + "%";
	
	setTimeout('iniciar();', 1000);	
	
	/*var notification = new Notification("Título", {
		icon: 'http://i.stack.imgur.com/dmHl0.png',
		body: "Texto da notificação"
	});
		notification.onclick = function() {
		window.open("http://stackoverflow.com");
	}*/
}

function acessarsite(num){
	if(cstatus[num] != 0){
		window.open(cron[num]['link']);
		$.ajax({
		  type: "POST",
		  url: "PHP/atualizar_cron.php",
		  data: { identificacao: ID[num], cd: recarga[num]},
		  complete: function(data){
					//alert("Cronometro atualizado");
					window.location.href = "Index.php";
				}
		});
	} else {
		var alerta = confirm("O cronômetro ainda nao acabou! Deseja acessar o site do mesmo jeito ?");
		if(alerta == true){
			window.open(cron[num]['link']);
	}
}
}
</script> 
<script type="text/javascript">

</script>
</body>
</html>
