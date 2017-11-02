<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>F.A.Q. :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/FAQ.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>

<body>
<header style="margin-bottom:50px;">
<?php include("PHP/barra_de_menu.php"); ?>
</header>
<div class="container">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Como postar um vídeo ?</a></h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <p>Para cadastrar um vídeo você terá que criar uma conta no site e colocar todas as informações válidas. Após o cadastro você irá no Painel/Conta e clicar em "ENVIAR VÍDEO" (e seguir as postagens de acordo com as <a href="Regras.php">regras do site</a>), coloque as informções correspondentes ao seu vídeo e está tudo pronto.</p>
        <p>OBS.: POR ENQUANTO ESTAMOS ACEITANDO VÍDEOS SOMENTE DO YOUTUBE !!</p></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Item #2</a></h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">...</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Item #3</a></h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">...</div>
    </div>
  </div>
</div>
<footer class="panel-footer">
  <?php include("PHP/rodape.php"); ?>
</footer>
</div>
</body>
</html>