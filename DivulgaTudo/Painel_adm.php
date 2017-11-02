<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Painel :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Painel.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/formoid-default-red.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>

<?php
	if(!isset($_SESSION)) session_start();
	include("PHP/Cookies.php");
	if($_SESSION['User']['chave'] == "null"){
		header("Location: Acesso.php");
	}
	$link = mysqli_connect('localhost','root','vertrigo','divulgatube');
	$pnome = "SELECT nome, aniversario, youtubech, timezone, ultimologin FROM contas WHERE idkey='".$_SESSION['User']['chave']."' AND apelido='".$_SESSION['User']['apelido']."'";
	$qnome = mysqli_query($link, $pnome);
	$unome = mysqli_fetch_array($qnome, MYSQL_ASSOC);
	$linkyt = substr($unome['youtubech'], 29);
	mysqli_close($link);
?>
</head>
<body id="site">
<header id="navbar">
<?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container">
<div id="tudo">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Vídeos</a></li>
    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Denunciados</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Contas</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Tickets</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">Vídeos</div>
    <div role="tabpanel" class="tab-pane fade" id="videos">Denuncias</div>
    <div role="tabpanel" class="tab-pane fade" id="messages">Contas</div>
    <div role="tabpanel" class="tab-pane fade" id="settings">Tickets</div>
  </div>
</div>
<footer class="panel-footer">
  <?php include("PHP/rodape.php");?>
</footer>
</div>
</body>
</html>