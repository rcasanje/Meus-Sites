<?php
	//if(!isset($_SESSION)) session_start();
	//include("PHP/Cookies.php");
	//session_write_close();
	
	$active1 = "active";
	$active2 = "";
	$active3 = "";
	$active4 = "";
	
	if(isset($_GET['contas'])){
		$active1 = "active";
	}
	if(isset($_GET['videos'])){
		$active1 = "";
		$active2 = "active";
	}
	if(isset($_GET['denuncias'])){
		$active1 = "";
		$active3 = "active";
	}
	if(isset($_GET['tickets'])){
		$active1 = "";
		$active4 = "active";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administração :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Admin.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<script src="Js/dataTables.min.js"></script>
<script src="Js/dataTables.bootstrap.min.js"></script>
</head>
<body class="site">
<header>
<?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" id="principal" style="margin-top:60px;">
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="<?php echo($active1);?>"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Contas</a></li>
  <li role="presentation" class="<?php echo($active2);?>"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Vídeos</a></li>
  <li role="presentation" class="<?php echo($active3);?>"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Denúncias</a></li>
  <li role="presentation" class="<?php echo($active4);?>"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Tickets</a></li>
</ul>
<?php 
  //SELECT * FROM clientes WHERE LOWER ( cliente_nome ) RLIKE 'EXPRESSÃO'; 
  ?>
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in <?php echo($active1);?>" id="home">
    <div id="procura" style="margin-top:10px; margin-bottom: 10px;">
      <h4>Filtros de pesquisa</h4>
      <form action="" method="get">
        <input class="hidden" type="text" value="true" name="contas">
        <div class="row">
          <div class="col-sm-2">
            <select class="form-control" name="search">
              <option value="all">Tudo</option>
              <option value="id">ID</option>
              <option value="nome">Nome</option>
              <option value="apelido">Apelido</option>
              <option value="email">Email</option>
              <option value="aniversario">Data de aniversário</option>
              <option value="sexo">Gênero</option>
              <option value="youtubech">Canal no Youtube</option>
              <option value="status">Status</option>
              <option value="ultimologin">Último Login</option>
              <option value="permissao">Permissão</option>
            </select>
          </div>
          <div class="col-sm-2">
            <select class="form-control" name="operation">
              <option value="=">Igual</option>
              <option value=">">Maior que</option>
              <option value=">=">Maior ou igual à</option>
              <option value="<">Menor que</option>
              <option value="<=">Menor ou igual à</option>
              <option value="<>">Diferente</option>
              <option value="RLIKE">Parecido</option>
            </select>
          </div>
          <div class="col-sm-3">
            <div class="input-group" style="width:100%;">
              <input type="text" class="form-control" placeholder="Pesquisa" name="restrict" maxlength="255" aria-describedby="basic-addon1" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-3">
            <select class="form-control" name="show">
              <option value="10">Mostrar 10</option>
              <option value="25">Mostrar 25</option>
              <option value="50">Mostrar 50</option>
              <option value="100">Mostrar 100</option>
              <option value="2147483647">Mostrar todos</option>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary" type="submit">Procurar</button>
          </div>
        </div>
      </form>
    </div>
    <table id="cadastro" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Apelido</th>
          <th>Email</th>
          <th>Aniversário</th>
          <th>Sexo</th>
          <th>Youtube Channel</th>
          <th>Status</th>
          <th>Último Login</th>
          <th>Permissão</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php //echo($teste) 
				$continuar = false;
				if(isset($_GET['contas'])){
					include ("PHP/conexao.php");
					
					$procurar = $_GET['search'];
					$operacao = $_GET['operation'];
					$restricao = $_GET['restrict'];
					$exibir = $_GET['show'];
					
					if($procurar == "all"){
						$query = "SELECT id, nome, apelido, email, aniversario, sexo, youtubech, status, ultimologin, permissao FROM contas LIMIT $exibir";
					} else {
						$query = "SELECT id, nome, apelido, email, aniversario, sexo, youtubech, status, ultimologin, permissao FROM contas WHERE $procurar $operacao '$restricao' LIMIT $exibir";
					}
					
					if($dados = mysqli_query($link, $query) or die(mysqli_error($link))){
						$continuar = true;
						/*$teste = $query;
						echo($teste);*/
					}
					
					while($mostrar = mysqli_fetch_array($dados, MYSQL_ASSOC)){
					printf('<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>Salvar/Alterar/Deletar</td>
							</tr>', $mostrar['id'], $mostrar['nome'], $mostrar['apelido'], $mostrar['email'], $mostrar['aniversario'], $mostrar['sexo'], $mostrar['youtubech'], $mostrar['status'], $mostrar['ultimologin'], $mostrar['permissao']);
					}
				}
		  ?>
      </tbody>
    </table>
  </div>
  <div role="tabpanel" class="tab-pane fade in <?php echo($active2);?>" id="videos">
    <div id="procura" style="margin-top:10px; margin-bottom: 10px;">
      <h4>Filtros de pesquisa videos</h4>
      <form action="" method="get">
        <input class="hidden" type="text" value="true" name="videos">
        <div class="row">
          <div class="col-sm-2">
            <select class="form-control" name="search">
              <option value="all">Tudo</option>
              <option value="id">ID</option>
              <option value="nome">Nome</option>
              <option value="apelido">Apelido</option>
              <option value="email">Email</option>
              <option value="aniversario">Data de aniversário</option>
              <option value="sexo">Gênero</option>
              <option value="youtubech">Canal no Youtube</option>
              <option value="status">Status</option>
              <option value="ultimologin">Último Login</option>
              <option value="permissao">Permissão</option>
            </select>
          </div>
          <div class="col-sm-2">
            <select class="form-control" name="operation">
              <option value="=">Igual</option>
              <option value=">">Maior que</option>
              <option value=">=">Maior ou igual à</option>
              <option value="<">Menor que</option>
              <option value="<=">Menor ou igual à</option>
              <option value="<>">Diferente</option>
              <option value="RLIKE">Parecido</option>
            </select>
          </div>
          <div class="col-sm-3">
            <div class="input-group" style="width:100%;">
              <input type="text" class="form-control" placeholder="Pesquisa" name="restrict" maxlength="255" aria-describedby="basic-addon1" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-3">
            <select class="form-control" name="show">
              <option value="10">Mostrar 10</option>
              <option value="25">Mostrar 25</option>
              <option value="50">Mostrar 50</option>
              <option value="100">Mostrar 100</option>
              <option value="2147483647">Mostrar todos</option>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary" type="submit">Procurar</button>
          </div>
        </div>
      </form>
    </div>
    <table id="cvideos" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apelido</th>
          <th>Nome</th>
          <th>Link</th>
          <th>Categoria</th>
          <th>Subcategoria</th>
          <th>Comentário</th>
          <th>Gostei</th>
          <th>Odiei</th>
          <th>Visitantes</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php //echo($teste) 
				$continuar = false;
				if(isset($_GET['videos'])){
					include ("PHP/conexao.php");
					
					$procurar = $_GET['search'];
					$operacao = $_GET['operation'];
					$restricao = $_GET['restrict'];
					$exibir = $_GET['show'];
					
					if($procurar == "all"){
						$query = "SELECT id, nome, apelido, link, categoria, subcategoria, comentario, gostei, odiei, visitantes FROM videos LIMIT $exibir";
					} else {
						$query = "SELECT id, nome, apelido, link, categoria, subcategoria, comentario, gostei, odiei, visitantes FROM videos WHERE $procurar $operacao '$restricao' LIMIT $exibir";
					}
					
					if($dados = mysqli_query($link, $query) or die(mysqli_error($link))){
						$continuar = true;
						/*$teste = $query;
						echo($teste);*/
					}
					
					while($mostrar = mysqli_fetch_array($dados, MYSQL_ASSOC)){
					printf('<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td><a href="%s">%s</a></td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>Salvar/Alterar/Deletar</td>
							</tr>', $mostrar['id'], $mostrar['apelido'], $mostrar['nome'], $mostrar['link'], $mostrar['link'], $mostrar['categoria'], $mostrar['subcategoria'], $mostrar['comentario'], $mostrar['gostei'], $mostrar['odiei'], $mostrar['visitantes']);
					}
				}
		  ?>
      </tbody>
    </table>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="messages">Teste03</div>
  <div role="tabpanel" class="tab-pane fade in <?php echo($active4);?>" id="settings">
    <div id="procura" style="margin-top:10px; margin-bottom: 10px;">
      <h4>Filtros de pesquisa</h4>
      <form action="" method="get">
        <input class="hidden" type="text" value="true" name="tickets">
        <div class="row">
          <div class="col-sm-2">
            <select class="form-control" name="search">
              <option value="all">Tudo</option>
              <option value="id">ID</option>
              <option value="apelido">Apelido</option>
              <option value="email">E-Mail</option>
              <option value="assunto">Assunto</option>
              <option value="problema">Problema</option>
              <option value="descricao">Descrição</option>
            </select>
          </div>
          <div class="col-sm-2">
            <select class="form-control" name="operation">
              <option value="=">Igual</option>
              <option value=">">Maior que</option>
              <option value=">=">Maior ou igual à</option>
              <option value="<">Menor que</option>
              <option value="<=">Menor ou igual à</option>
              <option value="<>">Diferente</option>
              <option value="RLIKE">Parecido</option>
            </select>
          </div>
          <div class="col-sm-3">
            <div class="input-group" style="width:100%;">
              <input type="text" class="form-control" placeholder="Pesquisa" name="restrict" maxlength="255" aria-describedby="basic-addon1" autocomplete="off">
            </div>
          </div>
          <div class="col-sm-3">
            <select class="form-control" name="show">
              <option value="10">Mostrar 10</option>
              <option value="25">Mostrar 25</option>
              <option value="50">Mostrar 50</option>
              <option value="100">Mostrar 100</option>
              <option value="2147483647">Mostrar todos</option>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary" type="submit">Procurar</button>
          </div>
        </div>
      </form>
    </div>
    <table id="ctickets" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Apelido</th>
          <th>E-Mail</th>
          <th>Assunto</th>
          <th>Problema</th>
          <th>Descrição</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php //echo($teste) 
				$continuar = false;
				if(isset($_GET['tickets'])){
					include ("PHP/conexao.php");
					
					$procurar = $_GET['search'];
					$operacao = $_GET['operation'];
					$restricao = $_GET['restrict'];
					$exibir = $_GET['show'];
					
					if($procurar == "all"){
						$query = "SELECT id, apelido, email, assunto, problema, descricao, status FROM ticket LIMIT $exibir";
					} else {
						$query = "SELECT id, apelido, email, assunto, problema, descricao, status FROM ticket WHERE $procurar $operacao '$restricao' LIMIT $exibir";
					}
					
					if($dados = mysqli_query($link, $query) or die(mysqli_error($link))){
						$continuar = true;
						/*$teste = $query;
						echo($teste);*/
					}
					
					while($mostrar = mysqli_fetch_array($dados, MYSQL_ASSOC)){
					printf('<tr>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>Responder/Deletar</td>
							</tr>', $mostrar['id'], $mostrar['apelido'], $mostrar['email'], $mostrar['assunto'], $mostrar['problema'], $mostrar['descricao'], $mostrar['status']);
					}
				}
		  ?>
      </tbody>
    </table>
  </div>
</div>
<footer class="panel-footer">
  <?php include("PHP/rodape.php");?>
</footer>
</div>
<script>
$(document).ready(function() {
    $('#cadastro').DataTable();
	$('#cvideos').DataTable();
	$('#ctickets').DataTable();
} );
</script>
</body>
</html>