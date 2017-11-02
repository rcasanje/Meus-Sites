<?php
	if(!isset($_SESSION)) session_start();
	include("PHP/Cookies.php");
	if($_SESSION['User']['chave'] == "null"){
		header("Location: Acesso.php");
	}
	$qidkey = $_SESSION['User']['chave'];
	$qapelido = $_SESSION['User']['apelido'];
	
	$link = mysqli_connect('localhost','root','vertrigo','divulgatube');
	$pnome = "SELECT nome, aniversario, youtubech, timezone, ultimologin, permissao FROM contas WHERE idkey='$qidkey' AND apelido='$qapelido'";
	$qnome = mysqli_query($link, $pnome);
	$unome = mysqli_fetch_array($qnome, MYSQL_ASSOC);
	$linkyt = substr($unome['youtubech'], 29);
	$_SESSION['User']['permissao'] = $unome['permissao'];
	mysqli_close($link);
?>
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
</head>
<body id="site">
<header id="navbar">
<?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" style="margin-top:60px;">
<div id="tudo">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Perfil</a></li>
    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Enviar vídeo</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Mensagens</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Configurações</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <div class="panel panel-default">
            <div class="panel-body"><a href="#" class="thumbnail"><img src="Imagens/fiora-base-painting.jpg"></a>
              <p><?php printf("Nome: %s",$unome['nome'])?></p>
              <p>Canal Youtube:<a href="http://youtube.com/user/<?php echo($linkyt) ?>" target="_blank"><?php echo($linkyt)?></a></p>
              <p><?php printf("Aniversário: %s",$unome['aniversario'])?></p>
              <p><?php printf("Ultimo login: %s",$unome['ultimologin'])?></p>
            </div>
            <div class="panel-footer">
              <p><a href="#">Editar</a></p>
            </div>
          </div>
        </div>
        <div>
          <p>Conteudo ao Lado da foto</p>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="videos">
      <form action="PHP/enviar_video.php" class="formoid-default-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
        <div class="title">
          <h2>Enviar vídeo</h2>
        </div>
        <div>
          <?php 
		  	if($_SESSION['User']['erro'] == 1){
				printf('<div class="alert alert-danger" role="alert">Captcha errado! Leia e escreva corretamente. </div>');
				$_SESSION['User']['erro'] = 0;
		  	} else if($_SESSION['User']['erro'] == -1){
				printf('<div class="alert alert-success" role="alert">Vídeo enviado com sucesso. </div>');
				$_SESSION['User']['erro'] = 0;
			}
		  ?>
        </div>
        <div class="element-input">
          <label class="title">Nome do vídeo (Opcional)</span></label>
          <input class="large" type="text" name="nome"/>
        </div>
        <div class="element-url">
          <label class="title">Link do vídeo<span class="required">*</span></label>
          <input class="large" type="url" name="link" value="" required="required" placeholder="https://www.youtube.com/watch?v=PGwUI-ch-gM"/>
        </div>
        <div class="element-select">
          <label class="title">Categoria<span class="required">*</span></label>
          <div class="large"><span>
            <select class="form-control" name="category">
              <option value="">Todas</option>
              <option value="Animais">Animais</option>
              <option value="C&T">Ciência e Tecnologia</option>
              <option value="Educacional">Educacional</option>
              <option value="Entreterimento">Entreterimento</option>
              <option value="F&M">Filmes/Desenhos</option>
              <option value="G&E">Guias/Estilo</option>
              <option value="Jogos">Jogos</option>
              <option value="Música">Música</option>
              <option value="N&P">Notícias/Política</option>
              <option value="Outros">Outros</option>
              <option value="SFL">Sem Fins Lucativos/Ativismo</option>
            </select>
            <i></i></span></div>
        </div>
        <div class="element-select">
          <label class="title">Sub-Categoria<span class="required">*</span></label>
          <div class="large"><span>
            <select class="form-control" name="subcategory">
              <option value="">Todas</option>
              <optgroup label="** Entreterimento **"></optgroup>
              <option value="Comedia">Comédia</option>
              <option value="Vlogs">Vlogs</option>
              <optgroup label="** Jogos **"></optgroup>
              <option value="Dota2">Dota2</option>
              <option value="GTAV">Grand Theft Auto V</option>
              <option value="Happy_Wheels">Happy Wheels</option>
              <option value="League_of_Legends">League of Legends</option>
              <option value="Minecraft">Minecraft</option>
              <option value="Mortal_Kombat">Mortal Kombat</option>
              <optgroup label="** Música **"></optgroup>
              <option value="Dubstep">Dupsteb</option>
              <option value="Eletronica">Eletrônica</option>
              <option value="Funk">Funk</option>
              <option value="K-Pop">K-Pop</option>
              <option value="Pop">Pop</option>
              <optgroup label="** Outros **"></optgroup>
              <option value="Outros">Outros</option>
            </select>
            <i></i></span></div>
        </div>
        <div class="element-textarea">
          <label class="title">Comentários (Opcional)</label>
          <textarea class="small" name="comentario" cols="20" rows="2" maxlength="150"></textarea>
          <label class="title">150 chars</label>
        </div>
        <div>
          <label class="title">
            <?php include("PHP/captcha.php"); $captcha;?>
          </label>
          <input class="large" type="text" name="vcaptcha">
        </div>
        <div class="submit">
          <input type="submit" value="Enviar"/>
        </div>
      </form>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="messages">Teste03</div>
    <div role="tabpanel" class="tab-pane fade" id="settings">
      <h4>Configurações</h4>
      <div>
        <div class="form-group">
        	<label for="fun" class="control-label text-right">Receber notificações da administração: </label>
    		<div>
    			<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm active" data-toggle="fun" data-title="Y">YES</a>
                        <a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="X">I don't know</a>
    					<a class="btn btn-primary btn-sm notActive" data-toggle="fun" data-title="N">NO</a>
    				</div>
    				<input type="hidden" name="fun" id="fun">
    			</div>
    		</div>
    	</div>
      </div>
    </div>
  </div>
</div>
<footer class="panel-footer">
  <?php include("PHP/rodape.php");?>
</footer>
</div>
</body>
<script type="text/javascript">
$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>
</html>