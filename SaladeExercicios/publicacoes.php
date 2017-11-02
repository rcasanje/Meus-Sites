<!doctype html>
<html>
<head>
<?php
include("php/verificar.php");
if(!isset($_SESSION)) session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercícios :: Sala de Exercícios</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <?php include("php/barra_de_menu.php"); ?>
</header>
<div class="container" id="principal">
  <form method="get" style="margin-bottom:10px;">
    <div class="row">
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Matéria</span>
          <select class="form-control" name="category">
            <option value="">Selecione</option>
            <option value="portugues">Português</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Tags</span>
          <input class="form-control" type="text" name="tags">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Mostar</span>
          <select class="form-control" name="show">
            <option value="10">10 artigos</option>
            <option value="15">15 artigos</option>
            <option value="20">20 artigos</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Ordem</span>
          <select class="form-control" name="order">
            <option value="1">Decrescente</option>
            <option value="2">Crescente</option>
          </select>
        </div>
      </div>

      <div class="col-sm-1">
        <button type="submit" class="btn btn-warning">Filtrar</button>
      </div>
    </div>
  </form>
  <?php
      include("php/conexao_publicacoes.php");
    
    $server = $_SERVER['SERVER_NAME'];
    $endurl = $_SERVER ['REQUEST_URI'];
    
    if(isset($_GET['category'])){
      $url = "category=".$_GET['category']."&tags=".$_GET['tags']."&show=".$_GET['show']."&order=".$_GET['order'];
    } else{
      $url = "";
    }
    
    $page = 0;
    $showpage = 10;
    $pagina = 1;
    
    if(isset($_GET['category'])){
      $categoria = $_GET['category'];
      $tags = $_GET['tags'];
      $showpage = $_GET['show'];
    }
    
    if(isset($_GET['category'])){
      if($_GET['category'] == "" and $_GET['tags'] == ""){
        $totalpost = "SELECT id FROM postagens";
      } else if($_GET['category'] == "" and $_GET['tags'] != ""){
        $totalpost = "SELECT id FROM postagens WHERE tags='$tags'";
      } else if($_GET['category'] != "" and $_GET['tags'] == ""){
        $totalpost = "SELECT id FROM postagens WHERE materia='$categoria'";
      } else if($_GET['category'] != "" and $_GET['tags'] != ""){
        $totalpost = "SELECT id FROM postagens WHERE materia='$categoria' AND tags='$tags'";
      }
    } else {
      $totalpost = "SELECT id FROM postagens";
    }
    
    if($rows = mysqli_query($conn, $totalpost)){
      $tposts = mysqli_num_rows($rows);
    }
    
    if($tposts > $showpage){
      $pagina++;
      $temp = 0;
      for($i=$tposts; $i >= $showpage; $i--){
        $temp++;
        if($temp == $showpage){
          $pagina++;
          $temp = 0;
        }
      }
    } else {
      $pagina = 0;
    }
    
    if(isset($_GET['page'])){
      $page = ($_GET['page']-1)*$showpage;
    }
    
    //echo("Posts: ".$tposts);
    //echo("<br>showpage: ".$showpage);
    //echo("<br>Páginas: ".$pagina);
    if(isset($_GET['id'])){
      $gid = $_GET['id'];
      $post = "SELECT titulo, conteudo, tags FROM postagens WHERE id='$gid'";
      $pegarpost = mysqli_query($conn, $post);
      $mpost = mysqli_fetch_array($pegarpost, MYSQL_ASSOC);  
      $conteudo = nl2br($mpost['conteudo']);
      printf('
      <div style="margin-top:-20px; margin-bottom:10px;"><a href="Publicacoes.php" class="btn btn-primary" role="button">Voltar</a></div>
      <div class="well">
        <h2>%s</h2>
        <p>%s</p>
      </div>', $mpost['titulo'], $conteudo);
    }else{
      if(isset($_GET['category'])){        
        switch($_GET['order']){
          case 1:
            $ordem = "ORDER by id DESC";
            break;
          case 2;
            $ordem = "ORDER by id ASC";
            break;
        }
        
        if($_GET['category'] == "" and $_GET['tags'] == ""){
          $post = "SELECT id, apelido, titulo, conteudo, materia, tags, data FROM postagens $ordem LIMIT $page, $showpage";
        } else if($_GET['category'] == "" and $_GET['tags'] != ""){
          $post = "SELECT id, apelido, titulo, conteudo, materia, tags, data FROM postagens WHERE tags='$tags' $ordem LIMIT $page, $showpage";
        } else if($_GET['category'] != "" and $_GET['tags'] == ""){
          $post = "SELECT id, apelido, titulo, conteudo, materia, tags, data FROM postagens WHERE materia='$categoria' $ordem LIMIT $page, $showpage";
        } else if($_GET['category'] != "" and $_GET['tags'] != ""){
          $post = "SELECT id, apelido, titulo, conteudo, materia, tags, data FROM postagens WHERE materia='$categoria' AND tags='$tags' $ordem LIMIT $page, $showpage";
        }
      }else{
        $post = "SELECT id, apelido, titulo, conteudo, materia, tags, data FROM postagens ORDER by id DESC LIMIT $page, $showpage";
      }
      
      $pegarpost = mysqli_query($conn, $post);
      while($mpost = mysqli_fetch_array($pegarpost, MYSQL_ASSOC)){      
        $descricao = substr($mpost['conteudo'], 0, 430);
        
        $desc = strip_tags($descricao);
        $idpost = "?id=".$mpost['id'];
        if($mpost['conteudo'] != ""){
          printf(
          '
          <div class="panel panel-default">
            <div class="panel-heading">%s</div>
            <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
              <p>%s</p>
              <p><a href="%s" class="btn btn-primary" role="button">Ler mais</a></p>
              </div>
              <div class="col-sm-4">
              <h6>Posted by: <a href="#">%s</a>. Em: %s GMT -3</h6>
              </div>
            </div>
            </div>
          </div>', $mpost['titulo'],$desc, $idpost, $mpost['apelido'], $mpost['data']);
        }
      }
    }
    
    if($pagina > 1){
      $classn = "";
      $classp = "disabled";
      $next = $url."page=2";
      $previous = $server.$endurl;
    
      if(isset($_GET['page'])){
        if($_GET['page'] >= $pagina){
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
        for($i=1; $i<=$pagina; $i++){
          printf('<li><a href="?%s&page=%s">%s</a></li>', $url, $i, $i);
        }
      printf('
            <li class="%s"><a href="?%s" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
          </ul>
        </nav>', $classn, $next);
    }
  ?>
</div>
<?php include("php/rodape.php"); ?>
</body>
<script>
var tempoms = 250;
var divs = 1;
var expansion = [];
while(document.getElementById('conteudo'+divs) != null){
  $("#conteudo"+divs).hide(0);
  expansion[divs] = 0;
  divs++;
}
function expandirDiv(num){
  if (expansion[num] == 0){
    expansion[num] = 1;
    $("#conteudo"+num).show(tempoms);
    //console.log("Crescendo");
  } else {
    expansion[num] = 0;
    $("#conteudo"+num).hide(tempoms);
    //console.log("Diminuindo");
  }
}
</script>
</html>