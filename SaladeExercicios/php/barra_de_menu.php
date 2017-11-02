<?php 
if(!isset($_SESSION)){
	session_start();
	$permission = 0;
} else{
	$permission = $_SESSION['User']['permissao'];
}

$server = $_SERVER['SERVER_NAME'];
$endurl = $_SERVER ['REQUEST_URI'];

$active = substr($endurl, 4);

$menu01 = "";
$menu02 = "";
$menu03 = "";
$menu04 = "";
$menu05 = "";

if($active == "index.php"){
	$menu01 = "active";
} else if ($active == "Publicacoes.php"){
	$menu02 = "active";
} else if ($active == "Painel.php" or $active == "Acesso.php"){
	$menu03 = "active";
} else if ($active == "Postagens.php"){
	$menu04 = "active";
} else if ($active == "Montagem.php"){
	$menu05 = "active";
}

if($permission == 0){
	printf('
	  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Sala de Exercícios</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="index.php">Início</a></li>
				<li class="nav-item"><a class="nav-link" href="publicacoes.php">Publicações</a></li>
				<li class="nav-item"><a class="nav-link" href="painel.php">Painel</a></li>
			</ul>
		</div>
		</nav>', $menu01, $menu02, $menu03);
} else if($permission >= 6 && $permission < 10){
	printf('
	  <div style="margin-bottom:40px;">
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao" aria-expanded="false"> <span class="sr-only">Mostrar/Ocultar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a href="index.php" class="navbar-brand">Sala de Exercícios </a> </div>
		  <div class="collapse navbar-collapse" id="navegacao">
			<ul class="nav navbar-nav">
			  <li class="%s"><a href="index.php">Inicio</a></li>
			  <li class="%s"><a href="Publicacoes.php">Publicações</a></li>
			  <li class="%s"><a href="Painel.php">Painel</a></li>
			  <li class="%s"><a href="Montagem.php">Montagem</a></li>
			</ul>
			<form action="" class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				<div class="btn-group">
				  <a class="btn btn-warning" href="Painel.php" style="text-decoration:none; color:#FFFFFF;">Conta</a>
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">User</span> </button>
				  <ul class="dropdown-menu">
					<li class="%s"><a href="Postagens.php">Postar</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="PHP/sair_conta.php">Sair</a></li>
				  </ul>
				</div>
				<input type="text" class="form-control" placeholder="Buscar">
				<button type="submit" class="btn btn-warning" ><span class="glyphicon glyphicon-search"></span></button>
			  </div>
			</form>
		  </div>
		</div>
	  </nav>
	  </div>', $menu01, $menu02, $menu03, $menu05, $menu04);
} else if($permission == 10){
	printf('
	  <div style="margin-bottom:40px;">
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao" aria-expanded="false"> <span class="sr-only">Mostrar/Ocultar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a href="index.php" class="navbar-brand">Sala de Exercícios </a> </div>
		  <div class="collapse navbar-collapse" id="navegacao">
			<ul class="nav navbar-nav">
			  <li class="%s"><a href="index.php">Inicio</a></li>
			  <li class="%s"><a href="Publicacoes.php">Publicações</a></li>
			  <li class="%s"><a href="Painel.php">Painel</a></li>
			  <li class="%s"><a href="Montagem.php">Montagem</a></li>
			  <li><a href="Teste.php">Página de Teste</a></li>
			</ul>
			<form action="" class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				<div class="btn-group">
				  <a class="btn btn-warning" href="Painel.php" style="text-decoration:none; color:#FFFFFF;">Conta</a>
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">User</span> </button>
				  <ul class="dropdown-menu">
					<li class="%s"><a href="Postagens.php">Postar</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="PHP/sair_conta.php">Sair</a></li>
				  </ul>
				</div>
				<input type="text" class="form-control" placeholder="Buscar">
				<button type="submit" class="btn btn-warning" ><span class="glyphicon glyphicon-search"></span></button>
			  </div>
			</form>
		  </div>
		</div>
	  </nav>
	  </div>', $menu01, $menu02, $menu03, $menu05, $menu04);
}
  ?>