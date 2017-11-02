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
<link rel="stylesheet" type="text/css" href="CSS/Index.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="principal">
  <section class="jumbotron" id="jumbobox_logo">
    <h1>DivulgaTube</h1>
    <p>Site de recursos e divulgação do Youtube</p>
  </section>
  <h2>Últimos Uploads</h2>
  <div class="row">
  	<?php
		include("PHP/conexao.php");
		
		$precentes = "SELECT id, apelido, nome, link, comentario FROM videos ORDER by id DESC LIMIT 4";
		$qrecentes = mysqli_query($link, $precentes);
		
		while($mrecentes = mysqli_fetch_array($qrecentes, MYSQL_ASSOC)){
			$linkv = substr($mrecentes['link'], 32);
			$comentario = $mrecentes['comentario'];
			printf(
			'<div class="col-sm-3">
				<div class="thumbnail">
				  <img src="http://img.youtube.com/vi/%s/mqdefault.jpg">
				  <div class="caption">
					<h3>%s</h3>
					<p>%s</p>
					<h6>posted by: <a href="Perfil.php?perfil=%s">%s</a></h6>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#video_%s">Ver vídeo</button>
				  </div>
				</div>
			</div>', $linkv, $mrecentes['nome'], $comentario, $mrecentes['apelido'], $mrecentes['apelido'], $mrecentes['id']);
			
			printf(
			'<div class="modal fade" id="video_%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
				  	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <h4>%s</h4>
				  </div>
				  <div class="modal-body">
				    <div><iframe width="570" height="370" src="https://www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe></div>
				  </div>
				  <div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				  </div>
				</div>
			  </div>
			</div>', $mrecentes['id'], $mrecentes['nome'], $linkv);
		}
	?>
  </div>
  <footer class="panel-footer">
    <?php include("PHP/rodape.php");?>
  </footer>
</div>
</body>
</html>
