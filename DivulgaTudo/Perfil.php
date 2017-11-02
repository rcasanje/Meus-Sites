<?php
	if(!isset($_SESSION)) session_start();
	include("PHP/Cookies.php");
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
<?php
include("PHP/conexao.php");

$nomep = $_GET['perfil'];
$sperfil = "SELECT apelido, aniversario, sexo, youtubech, status, ultimologin FROM contas WHERE apelido='$nomep'";
$perfil = mysqli_query($link, $sperfil);
$mperfil = mysqli_fetch_array($perfil);

$nomech = substr($mperfil['youtubech'], 29);

if($mperfil['status'] == 0){
	$status = "Ativo";
}
?>
<div class="container">
  <ul class="nav nav-tabs" role="tablist" id="tudo">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Perfil</a></li>
    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Vídeos</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Mensagens</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Configurações</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="row">
        <div class="col-xs-6 col-md-3">
          <div class="panel panel-default">
            <div class="panel-body"> <a href="#" class="thumbnail"><img src="Imagens/fiora-base-painting.jpg"></a>
              <p><?php printf("Nome: %s",$mperfil['apelido'])?></p>
              <p>Canal Youtube: <a href="<?php echo($mperfil['youtubech']) ?>" target="_blank"><?php echo($nomech);?></a></p>
              <p><?php printf("Aniversário: %s",$mperfil['aniversario'])?></p>
              <p><?php printf("Status: %s",$status)?></p>
              <p><?php printf("Ultimo login: %s",$mperfil['ultimologin'])?></p>
            </div>
          </div>
        </div>
        <div>
          <p>Conteudo ao Lado da foto</p>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="videos">
    	<?php
			$paginas = 0;
			$showpage = 10;
			$url = "perfil=$nomep";
			
			$row = "SELECT id FROM videos";
			if($rows = mysqli_query($link, $row)){
				$nvideos = mysqli_num_rows($rows);
				//echo("Total: ".$nvideos."<br>");
			}
			
			if($nvideos >= $showpage){
				$paginas += 2;
				$inicio = 0;
				$temp = 0;
				for($i=$nvideos; $i>=$showpage; $i--){
					$temp++;
					if($temp == $showpage){
						$paginas++;
						$temp = 0;
					}
				}
			} else{
				$inicio = 0;
			}
			if(isset($_GET['page'])){
				$inicio = ($_GET['page'] -1)*$showpage;
			}
			
			$videos = "SELECT id, apelido,nome, link, categoria, subcategoria, comentario, gostei, odiei FROM videos WHERE apelido='$nomep' LIMIT $inicio, $showpage";
			$pvideos = mysqli_query($link, $videos);
			
			while($avideos = mysqli_fetch_array($pvideos, MYSQL_ASSOC)){
				//echo("ID Vídeo: ".$avideos['id']."<br>");
				$linkv = substr($avideos['link'], 32);
					
				if($linkv != ""){
					printf ('
					<div class="panel panel-default">
					  <div class="media">
						<div class="media-left">
						  <a href="#"><img class="media-object" src="http://img.youtube.com/vi/%s/mqdefault.jpg" height="120" width="200"></a>		    </div>
						<div class="media-body">
						  <h4 class="media-heading">%s</h4>
						  <p>%s</p>
						  <h6>posted by: <a href="Perfil.php?perfil=%s">%s</a></h6>
						  <table width="%s">
							<tbody>
							  <tr>
								<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#vervideo_%s">Ver vídeo</button></td>
								<td align="right"><h6>%s >> %s</h6></td>
							  </tr>
							</tbody>
						  </table>
						</div>
					  </div>
					</div>', $linkv, $avideos['nome'], $avideos['comentario'], $avideos['apelido'], $avideos['apelido'], "100%", $avideos['id'], $avideos['categoria'], $avideos['subcategoria']);
						
					printf('
					<div class="modal fade" id="vervideo_%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">%s</h4>
						  </div>
						  <div class="modal-body">
							<div><iframe width="570" height="370" src="https://www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe></div>
							<div style="margin-top:10px;">
							  <button type="button" class="btn btn-primary" id="gostei" data-loading-text="Loading..." autocomplete="off" style="width:100px; height:30px; background-color:#00FF00;"> <span class="glyphicon glyphicon-thumbs-up"></span> </span></button>
							  <button type="button" class="btn btn-primary" id="odiei" data-loading-text="Loading..." autocomplete="off" style="width:100px; height:30px; background-color:#FF0000;"> <span class="glyphicon glyphicon-thumbs-down"></span> </span></button>
							</div>
						  </div>
						  <div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						  </div>
						</div>
					  </div>
					</div>', $avideos['id'], $avideos['nome'], $linkv, $linkv, $avideos['id']);
				}
			}
			$classn = "";
				$classp = "disabled";
				$next = $url."page=2";
				$previous = "#";
				
				if(isset($_GET['page'])){
					if($_GET['page'] >= $paginas){
						$classn = "disabled";
						$next = $url."page=".$_GET['page'];
					}else{
						$next = $url."page=".($_GET['page'] + 1);
					}
					if($_GET['page'] <= 1){
						$classp = "disabled";
						$previous = $url."page=".$_GET['page']; 
					}else{
						 $classp = "";
						 $previous = $url."page=".($_GET['page'] - 1);
					}
				}
				
				printf('
					<nav>
						<ul class="pagination">
							<li class="%s"><a href="?%s" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>', $classp, $previous);
					for($i=1; $i<=$paginas; $i++){
						printf('<li><a href="?%s&page=%s">%s</a></li>', $url, $i, $i);
					}
				printf('
							<li class="%s"><a href="?%s" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
						</ul>
					</nav>
				', $classn, $next);
		?>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="messages">Teste03</div>
    <div role="tabpanel" class="tab-pane fade" id="settings">
      <h4>Configurações</h4>
    </div>
  </div>
  <footer class="panel-footer">
    <?php include("PHP/rodape.php");?>
  </footer>
</div>
</body>
</html>