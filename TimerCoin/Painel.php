<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Painel :: TimerCoin</title>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/Painel.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body onLoad="controles();">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="principal" style="margin-top:60px;">
  <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" id="menu">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Menu</h4>
          <div class="media" align="center">
            <div class="media-left"><img class="media-object" src="Imagens/freebitcoin.jpg" alt="Foto de perfil" width="128" height="128"></div>
          </div>
          <ul id="menu_link">
            <li><a href="javascript:void(0)" id="link_Incio">Inicio</a></li>
            <li><a href="javascript:void(0)" id="link_Perfil">Perfil</a></li>
            <li><a href="javascript:void(0)" id="link_Contadores">Contadores</a></li>
            <li><a href="javascript:void(0)" id="link_Config">Configurações</a></li>
            <li><a href="javascript:void(0)" id="link_Sair">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9" id="teste">
      <div class="panel panel-default">
        <div class="panel-body" id="conteudo">
          <div id="inicio">
            <p>Página situacional</p>
          </div>
          <div id="perfil">
            <p>Perfil 
          </div>
          <div id="contadores">
            <h4>Adicionar contador</h4>
            <form method="post" id="enviar_contador">
              <div class="input-group" id="namecount"> <span class="input-group-addon" id="basic-addon1">Nome do contador</span> <span id="toggler">
                <input type="text" class="form-control" name="nome_count" placeholder="Ex.: Criptomoedas (Faucets) | Datas Importantes" aria-describedby="basic-addon1" maxlength="100" autocomplete="off" required>
                </span> </div>
                <br>
                <div class="input-group"> <span class="input-group-addon">
                Terminar em
                </span>
                <div id="termino">
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="AnoT">
                    <option value="0000">Ano</option>
                    <?php	
          						$ano1 = date('Y');
                      for($i = 0; $i <= 5; $i++){
          							if($i < 10)	$zero = "000".$i; else $zero = "00".$i;
          							printf('<option value="%s">%s</option>', $zero, $ano1+$i);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="MesT">
                    <option value="00">Mês</option>
                    <?php
          						for($i = 1; $i <= 12; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="DiaT">
                    <option value="00">Dia</option>
                    <?php
          						for($i = 1; $i <= 31; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="HoraT" required>
                    <option value="00">Hora</option>
                    <?php 
          						for($i = 0; $i <= 23; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="MinutoT" required>
                    <option value="00">Minuto</option>
                    <?php 
          						for($i = 0; $i <= 59; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="SegundoT" required>
                    <option value="00">Segundo</option>
                    <?php 
          						for($i = 0; $i <= 59; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                </div>
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon">
                <input id="checkbox_01" type="checkbox" aria-label="..." name="repetir"> Repetir ?
                </span>
                <div id="repetir">
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="AnoR">
                    <option value="0000">Ano</option>
                    <?php 
          						$ano1 = date('Y');
          						for($i = 0; $i <= 5; $i++){
                        if($i < 10) $zero = "000".$i; else $zero = "00".$i;
                        printf('<option value="%s">%s</option>', $zero, $ano1+$i);
                      }
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="MesR">
                    <option value="00">Mês</option>
                    <?php
          						for($i = 1; $i <= 12; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="DiaR">
                    <option value="00">Dia</option>
                    <?php
          						for($i = 1; $i <= 31; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="HoraR">
                    <option value="00">Hora</option>
                    <?php 
          						for($i = 1; $i <= 23; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="MinutoR">
                    <option value="00">Minuto</option>
                    <?php 
          						for($i = 1; $i <= 59; $i++){
          							if($i < 10)	$zero = "00".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
                <label class="checkbox-inline" style="margin-left:-15px;">
                  <select class="form-control" name="SegundoR">
                    <option value="00">Segundo</option>
                    <?php 
          						for($i = 1; $i <= 59; $i++){
          							if($i < 10)	$zero = "0".$i; else $zero = $i;
          							printf('<option value="%s">%s</option>', $zero, $zero);
          						}
          					?>
                  </select>
                </label>
              </div>
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon">
                <input type="checkbox" aria-label="..." name="redirect"> Redirecionar quando acabar ?
                </span>
                <input type="text" class="form-control" aria-label="..." placeholder="https://www.google.com" pattern="https?://.+" name="redirect_link" value="">
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon">
                Imagem do cronometro
                </span>
                <input type="text" class="form-control" aria-label="..." placeholder="https://s-media-cache-ak0.pinimg.com/564x/80/83/8a/80838a5b5c12aef48678ab8b0266a3e4.jpg" pattern="https?://.+" name="image_link" value="">
              </div>
              <br>
              <button class="btn btn-success" type="submit">Enviar</button>
              <button class="btn btn-warning" type="reset">Resetar</button>
            </form>
          </div>
          <div id="configuracoes">
            <p>Configurações
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function () {
	$('#repetir').find('select').prop('disabled', true);
	
	$("#checkbox_01").click(function () {  
		if( $("#checkbox_01").is(':checked') ){
			$('#repetir').find('select').prop('disabled', false);
		} else {
			$('#repetir').find('select').prop('disabled', true);
		}
    });
   
   jQuery("#enviar_contador").submit(function(){
	   var dados = jQuery(this).serialize();
	   jQuery.ajax({
		   type: "POST",
		   url: "PHP/enviar_contador.php",
		   data: dados,
		   success: function(data){
			   alert(data);
		   }
	   });
	   return false;
   });
});

function controles(){
	var tempo_ms = 250;
	
	$("#perfil").hide(0);
	$("#contadores").hide(0);
	$("#configuracoes").hide(0);
	$("#repeticao").hide(0);
	
	$("#link_Incio").click(function(event){
	  event.preventDefault();
	  $("#inicio").show(tempo_ms);
	  $("#perfil").hide(tempo_ms);
	  $("#contadores").hide(tempo_ms);
	  $("#configuracoes").hide(tempo_ms);
	});
	$("#link_Perfil").click(function(event){
	  event.preventDefault();
	  $("#inicio").hide(tempo_ms);
	  $("#perfil").show(tempo_ms);
	  $("#contadores").hide(tempo_ms);
	  $("#configuracoes").hide(tempo_ms);
	});
	$("#link_Contadores").click(function(event){
	  event.preventDefault();
	  $("#inicio").hide(tempo_ms);
	  $("#perfil").hide(tempo_ms);
	  $("#contadores").show(tempo_ms);
	  $("#configuracoes").hide(tempo_ms);
	});
	$("#link_Config").click(function(event){
	  event.preventDefault();
	  $("#inicio").hide(tempo_ms);
	  $("#perfil").hide(tempo_ms);
	  $("#contadores").hide(tempo_ms);
	  $("#configuracoes").show(tempo_ms);
	});
}
</script>
</html>