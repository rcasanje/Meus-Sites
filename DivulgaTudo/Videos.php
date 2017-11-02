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
<title>Vídeos :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Video.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="principal" style="margin-top:60px;">
  <div id="filtrop" style="margin-bottom:10px;">
  <form method="get">
    <div class="row">
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon">Categoria</span>
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
            <option value="Outros"> Outros</option>
            <option value="SFL">Sem Fins Lucativos/Ativismo</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group"> 
          <span class="input-group-addon">Sub-categoria</span>
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
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon">Classificar</span>
          <select class="form-control" name="rating">
          	<option value="">Selecione</option>
            <option value="morelike">Mais gostei</option>
            <option value="lesslike">Menos gostei</option>
            <option value="morehate">Mais odiados</option>
            <option value="lesshate">Menos odiados</option>
            <option value="morevisit">Mais visitados</option>
            <option value="lessvisit">Menos visitados</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success" style="width:165px;">Filtar</span> </span></button>
      </div>
    </div>
    </div>
  </form>
  <?php
 	$link = mysqli_connect('localhost','root','vertrigo','divulgatube');
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$server = $_SERVER['SERVER_NAME'];
	$endurl = $_SERVER ['REQUEST_URI'];
	
	$paginas = 0;
	$showpage = 10;
	$inicio = 0;
	
	if(isset($_GET['category'])) $categoria = $_GET['category'];
	if(isset($_GET['subcategory'])) $subcat = $_GET['subcategory'];
	
	if(isset($_GET['category'])){
		 $url = "category=".$_GET['category']."&subcategory=".$_GET['subcategory']."&rating=".$_GET['rating'].""; 
	}else {
		$url = "";
	}
	
	if(isset($_GET['category'])){
		if($_GET['category'] == "" and $_GET['subcategory'] == ""){
			$row = "SELECT id FROM videos";
		} else if($_GET['category'] != "" and $_GET['subcategory'] == ""){
			$row = "SELECT id FROM videos WHERE categoria='$categoria'";
		} else if($_GET['category'] == "" and $_GET['subcategory'] != ""){
			$row = "SELECT id FROM videos WHERE subcategoria='$subcat'";
		} else if($_GET['category'] != "" and $_GET['subcategory'] != ""){
			$row = "SELECT id FROM videos WHERE categoria='$categoria' AND subcategoria='$subcat'";
		}
		
		if($_GET['rating'] == ""){
			$ordem = "ORDER by id DESC";
		} else if ($_GET['rating'] == "morelike"){
			$ordem = "ORDER BY gostei DESC";
		} else if ($_GET['rating'] == "lesslike"){
			$ordem = "ORDER by gostei ASC";
		} else if ($_GET['rating'] == "morehate"){
			$ordem = "ORDER by odiei DESC";
		} else if ($_GET['rating'] == "lesshate"){
			$ordem = "ORDER by odiei ASC";
		} else if ($_GET['rating'] == "morevisit"){
			$ordem = "ORDER by visitantes DESC";
		} else if ($_GET['rating'] == "lessvisit"){
			$ordem = "ORDER by visitantes ASC";
		}
	} else{
		$row = "SELECT id FROM videos";
	}
	
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
	
	if(isset($_GET['category'])){
		if($_GET['category'] == "" and $_GET['subcategory'] == ""){
			$videos = "SELECT id, apelido, nome, link, categoria, subcategoria, comentario FROM videos $ordem LIMIT $inicio, $showpage";
		} else if($_GET['category'] != "" and $_GET['subcategory'] == ""){
			$videos = "SELECT id, apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE categoria='$categoria' $ordem LIMIT $inicio, $showpage";
		} else if($_GET['category'] == "" and $_GET['subcategory'] != ""){
			$videos = "SELECT id, apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE subcategoria='$subcat' $ordem LIMIT $inicio, $showpage";
		} else if($_GET['category'] != "" and $_GET['subcategory'] != ""){
			$videos = "SELECT id, apelido, nome, link, categoria, subcategoria, comentario FROM videos WHERE categoria='$categoria' AND subcategoria='$subcat' $ordem LIMIT $inicio, $showpage";
		}
	}  else{
		$videos = "SELECT id, apelido, nome, link, categoria, subcategoria, comentario FROM videos ORDER by id DESC LIMIT $inicio, $showpage";
	}
	
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
			      <h4 class="media-heading" >%s</h4>
				  <p>%s</p>
				  <h6>posted by: <a href="Perfil.php?perfil=%s">%s</a></h6>
				  <table width="%s">
				    <tbody>
					  <tr>
					    <td><div class="video-link" data-video-id="y-%s" data-video-width="" data-video-height="">Ver vídeo</div></td>
					    <td align="right"><h6>%s >> %s</h6></td>
					  </tr>
			        </tbody>
				  </table>
			    </div>
			  </div>
		    </div>', $linkv, $avideos['nome'], $avideos['comentario'], $avideos['apelido'], $avideos['apelido'], "100%", $linkv, $avideos['categoria'], $avideos['subcategoria']);
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
    
  <footer class="panel-footer">
    <?php include("PHP/rodape.php");?>
  </footer>
</div>
</body>
<script src="Js/videoLightning.js"></script>
<script>
  $(function() {
    $(".video-link").jqueryVideoLightning({
        id: "y-PKffm2uI4dk",
        autoplay: true,
        color: "white"
    });
  });
</script>
</html>