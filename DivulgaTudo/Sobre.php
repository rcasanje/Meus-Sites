<?php
	if(!isset($_SESSION)) session_start();
	include("PHP/Cookies.php");
	session_write_close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inicio :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Sobre.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="conteudo">
<div id="quemsomos">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Quem somos</h3>
    </div>
    <div class="panel-body">
      <p>Somos um site para divulgação em massa de Produtores de Conteúdo de todo o YouTube. Estamos online desde de dd/mm/yyyy e vamos proporcionar todo um ambiente para qualquer youtuber usar nossa plataforma. Oferecemos vários kits de produção (como músicas, programas, imagens e conhecimentos) sem DIREITO AUTORAL para o total uso e aproveitamento do conteúdo.</p>
      <p>Qualquer dúvida sobre nossos serviços podem ser conferida em nosso <a href="FAQ.php">F.A.Q.</a> e caso isso não resolva seus problemas entre em <a href="Contato.php">contato</a> conosco e estaremos muito felizes em resolver suas dúvidas sobre o Youtube.</p>
    </div>
  </div>
  <footer class="panel-footer">
    <?php include("PHP/rodape.php");?>
  </footer>
</div>
</body>
</html>
