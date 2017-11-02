<?php
	include("conexao_user.php");

	$nome = $_POST['nome_count'];
	$dono = "casanje";
	$imagem = $_POST['image_link'];
	
	$AnoT = $_POST['AnoT'];
	$MesT = $_POST['MesT'];
	$DiaT = $_POST['DiaT'];
	//$HoraT = $_POST['HoraT'];
	$HoraT = $_POST['HoraT'] - 3;
	$MinutoT = $_POST['MinutoT'];
	$SegundoT = $_POST['SegundoT'];

	$AnoA = date("Y");
	$MesA = date("m");
	$DiaA = date("d");
	$HoraA = date("H");
	$MinutoA = date("i");
	$SegundoA = date("s");
	
	$termino = date("Y-m-d H:i:s", strtotime("+$AnoT years +$MesT months +$DiaT days +$HoraT hours +$MinutoT minutes +$SegundoT seconds"));
	echo($AnoT);
	If($AnoT == 0) $Ano = 0; else $Ano = $AnoT * 24 * 3600 * 365;
	If($MesT == 0) $Mes = 0; else $Mes = $MesT * 30 * 24 * 3600;
	If($DiaT == 0) $Dia = 0; else $Dia = $DiaT * 24 * 3600;
	If($HoraT == 0) $Hora = 0; else $Hora = $HoraT * 3600;
	If($MinutoT == 0) $Minuto = 0; else $Minuto = $MinutoT * 60;
	If($SegundoT == 0) $Segundo = 0; else $Segundo = $SegundoT;

	$sombrats = $Ano+$Mes+$Dia+$Hora+$Minuto+$Segundo;

	if(isset($_POST['checkbox_01'])){
		$repeticao = $AnoR.$MesR.$DiaR.":".$HoraR.$MinutoR.$SegundoR;		
		$AnoR = $_POST['AnoR'];
		$MesR = $_POST['MesR'];
		$DiaR = $_POST['DiaR'];
		$HoraR = $_POST['HoraR'];
		$MinutoR = $_POST['MinutoR'];
		$SegundoR = $_POST['SegundoR'];
	} else {
		$repeticao = "0000-00-00 00:00:00";
	}
	
	if(isset($_POST['redirect'])){
		$linkred = "#";
	} else{
		$linkred = $_POST['redirect_link'];
	}
	
	//$termino = $AnoT."-".$MesT."-".$DiaT." ".$HoraT.":".$MinutoT.":".$SegundoT;
	
	$token = md5(uniqid(rand(), true));

	printf('Nome: %s || Dono: %s || Link: %s ||| Termino: %s || Repetir: %s || Sombra = %s <br>', $nome, $dono, $linkred, $termino, $repeticao, $sombrats);
	
	$dados_count = "INSERT INTO timers(idkey, apelido, nome, carimbodh, trecarga, sombrats, redlink, imagem) VALUES ('$token','$dono', '$nome', '$termino', '$repeticao', $sombrats, '$linkred', '$imagem')";
	
	if($query = mysqli_query($link, $dados_count) or die(mysqli_error($link))){
		echo("Dados enviados com sucesso");
	}
?>