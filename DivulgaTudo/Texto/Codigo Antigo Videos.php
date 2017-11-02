<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vídeos :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Index.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao" aria-expanded="false"> <span class="sr-only">Mostrar/Ocultar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="Index.php" class="navbar-brand">DivulgaTube</a> </div>
      <div class="collapse navbar-collapse" id="navegacao">
        <ul class="nav navbar-nav">
          <li><a href="Index.php">Inicio</a></li>
          <li class="dropdown">
          <li class="active"><a href="Videos.php" >Vídeos</a></li>
          <li><a href="Sobre.html">Sobre</a></li>
          <li><a href="Contato.html">Contato</a></li>
          <li><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Ferrementas<span class="glyphicon glyphicon-menu-down"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Musicas.html">Músicas</a></li>
              <li><a href="Imagens.html">Imagens</a></li>
              <li><a href="Programas.html">Programas</a></li>
              <li><a href="Aprendizado.html">Aprendizado</a></li>
            </ul>
          </li>
          <li><a href="Painel.php">Painel</a></li>
          <li><a href="#">Idioma</a></li>
          </li>
        </ul>
        <form action="" class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <div class="btn-group">
              <button type="button" class="btn btn-danger">Conta</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">User</span> </button>
              <ul class="dropdown-menu">
                <li><a href="PHP/sair_conta.php">Sair</a></li>
              </ul>
            </div>
            <input type="text" class="form-control" placeholder="Buscar">
            <button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-search"></span></button>
          </div>
        </form>
      </div>
    </div>
  </nav>
</header>
<div class="container" id="principal" style="margin-top:60px;">
  <div id="filtrop" style="margin-bottom:10px;">
  <form method="get">
    <div class="row">
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon">Categoria</span>
          <select class="form-control" name="category">
            <option value="">Todas</option>
            <option value="Educacional">Educacional</option>
            <option value="Jogos">Jogos</option>
            <option value="Música">Música</option>
            <option value="Entreterimento">Entreterimento</option>
            <option value="Outros"> Outros</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon">Sub-categoria</span>
          <select class="form-control" name="subcategory">
            <option value="">Todas</option>
            <optgroup label="** Jogos **"></optgroup>
            <option value="GTAV">Grand Theft Auto V</option>
            <option value="HappyWheels">Happy Wheels</option>
            <option value="Minecraft">Minecraft</option>
            <option value="MortalKombat">Mortal Kombat</option>
            <option value="League of Legends">League of Legends</option>
            <optgroup label="** Música **"></optgroup>
            <option value="Eletrônica">Eletrônica</option>
            <option value="Funk">Funk</option>
            <optgroup label="** Entreterimento **"></optgroup>
            <option value="Comedia">Comédia</option>
            <option value="Vlogs">Vlogs</option>
            <optgroup label="** Outros **"></optgroup>
            <option value="Outros">Outros</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <p>Rating</p>
      </div>
      <div class="col-sm-2">
        <p>Visitados</p>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success" style="width:165px;">Filtar</span> </span></button>
      </div>
    </div>
    </div>
  </form>
  <?php
  	$showppage = 10;  
  	$server = $_SERVER['SERVER_NAME'];
	$endurl = $_SERVER ['REQUEST_URI'];

	if(isset($_GET['category'])) $categoria = $_GET['category'];
	if(isset($_GET['subcategory'])) $subcat = $_GET['subcategory'];
	$i = 0;
	$tipo = 0;
	$linkv = "";
	
	$paginas = 0;
	
	$inicio = 8;
	$fim = 0;
	
	$rowsc;
	$totalc = 0;
	
	if(isset($_GET['category'])){
		 $url = "category=".$_GET['category']."&subcategory=".$_GET['subcategory'].""; 
	}else {
		$url = "";
	}
	
		$link = mysqli_connect('localhost','root','vertrigo','divulgatube');
	
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		if(isset($_GET['category'])){
			if($_GET['category'] == "" and $_GET['subcategory'] == ""){
				$nrowc = "SELECT id FROM videos";
				$tipo = 0;
			} else if($_GET['category'] != "" and $_GET['subcategory'] == ""){
				$nrowc = "SELECT id FROM videos WHERE categoria='$categoria'";
				$tipo = 1;
			} else if($_GET['category'] == "" and $_GET['subcategory'] != ""){
				$nrowc = "SELECT id FROM videos WHERE subcategoria='$subcat'";
				$tipo = 2;
			} else if($_GET['category'] != "" and $_GET['subcategory'] != ""){
				$nrowc = "SELECT id FROM videos WHERE categoria='$categoria' AND subcategoria='$subcat'";
				$tipo = 3;
			}
			if($tipo > 0){
				if($rowsc = mysqli_query($link, $nrowc)){
					$nvideosc = mysqli_num_rows($rowsc);
				}
			}
		}
		$row = "SELECT id FROM videos";
		
		if($rows = mysqli_query($link, $row)){
			$nvideos = mysqli_num_rows($rows);
		}
		
		if(isset($_GET['category'])){
			if($tipo > 0){
				if($nvideosc <= $showppage-1){
					echo($totalc);
					$inicio = $nvideos;
					$fim = 0;
				}else{
 					$paginas = 2;
					
				}
			} else{
				$inicio = $showppage - 1;
				$fim = 0;
			}
		}else{
			if($nvideos > $showppage){
				$paginas+=2;
				$temp = 0;
				$limitador = $nvideos;
				for($i=$nvideos; $i>=$showppage; $i--){
					$limitador--;
					$temp++;
					if($temp == $showppage){
						$paginas++;
						$temp = 0;
					}
				}
			}
			
			if(isset($_GET['page'])){
				$inicio = ($_GET['page'] * $showppage) - 1;
				$fim = ($_GET['page'] - 1) * $showppage;
			}else{
				$inicio = $showppage - 1;
				$fim = 0;
			}
		}
		for($i=$inicio; $i>=$fim; $i--){
			if(isset($_GET['category'])){
				if($_GET['category'] == "" and $_GET['subcategory'] == ""){
					$pegar = "SELECT apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE id='$i'";
				} else if($_GET['category'] != "" and $_GET['subcategory'] == ""){
					$pegar = "SELECT apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE id='$i' AND categoria='$categoria'";
				} else if($_GET['category'] == "" and $_GET['subcategory'] != ""){
					$pegar = "SELECT apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE id='$i' AND subcategoria='$subcat'";
				} else if($_GET['category'] != "" and $_GET['subcategory'] != ""){
					$pegar = "SELECT apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE id='$i' AND categoria='$categoria' AND subcategoria='$subcat'";
				}
			}else{
				$pegar = "SELECT apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE id='$i'";
			}
			
			$pvideos = mysqli_query($link, $pegar);
			$avideos = mysqli_fetch_array($pvideos, MYSQL_ASSOC);
			$linkv = substr($avideos['link'], 32);
			
			if($linkv != ""){
				printf ('<div class="panel panel-default"><div class="media">
						<div class="media-left">
							<a href="#"><img class="media-object" src="http://img.youtube.com/vi/%s/mqdefault.jpg" height="120" width="200"></a>
						  </div>
						  <div class="media-body">
							<h4 class="media-heading">%s</h4>
							<p>%s</p>
							<h6>posted by: %s</h6>
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
					</div>', $linkv, $avideos['nome'], $avideos['comentario'], $avideos['apelido'], "100%", $i, $avideos['categoria'], $avideos['subcategoria']);
				
				printf('<div class="modal fade" id="vervideo_%s" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
	</div>', $i, $avideos['nome'], $linkv, $linkv, $i);
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
    
  <footer class="panel-footer">Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. Isso é um rodapé. </footer>
</div>
</body>
</html>
<script>
  $('#gostei').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>