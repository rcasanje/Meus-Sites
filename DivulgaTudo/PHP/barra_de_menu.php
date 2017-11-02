<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<?php
$permissao = $_SESSION['User']['permissao'];

$server = $_SERVER['SERVER_NAME'];
$endurl = $_SERVER ['REQUEST_URI'];

$active = substr($endurl, 4);

$menu01 = "";
$menu02 = "";
$menu03 = "";
$menu04 = "";
$menu05 = "";
$menu06 = "";

if($active == "Index.php"){
	$menu01 = "active";
} else if ($active == "Videos.php"){
	$menu02 = "active";
} else if ($active == "Sobre.php"){
	$menu03 = "active";
} else if ($active == "Contato.php"){
	$menu04 = "active";
} else if ($active == "Musicas.php" or $active == "Programas.php"){
	$menu05 = "active";
} else if ($active == "Painel.php" or $active == "Acesso.php" or $active == "Perfil.php"  or $active == "Administracao.php"){
	$menu06 = "active";
}

if($permissao < 10){
	printf('
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao" aria-expanded="false"> <span class="sr-only">Mostrar/Ocultar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a href="Index.php" class="navbar-brand">Divulga Tudo v1.0</a> </div>
		  <div class="collapse navbar-collapse" id="navegacao">
			<ul class="nav navbar-nav">
			  <li class="%s"><a href="Index.php">Inicio</a></li>
			  <li class="dropdown">
			  <li class="%s"><a href="Videos.php" >Vídeos</a></li>
			  <li class="%s"><a href="Sobre.php">Sobre</a></li>
			  <li class="%s"><a href="Contato.php">Contato</a></li>
			  <li class="%s"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Ferrementas<span class="glyphicon glyphicon-menu-down"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="Musicas.php">Músicas</a></li>
				  <li><a href="Imagens.php">Imagens</a></li>
				  <li><a href="Programas.php">Programas</a></li>
				  <li><a href="Aprendizado.php">Aprendizado</a></li>
				</ul>
			  </li>
			  <li class="%s"><a href="Painel.php">Painel</a></li>
			  <li><a href="#">Idioma</a></li>
			  </li>
			</ul>
			<form action="" class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				<div class="btn-group">
				  <button type="button" class="btn btn-danger"><a href="Painel.php" style="text-decoration:none; color:#FFFFFF;">Conta</a></button>
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
	  </nav>', $menu01, $menu02, $menu03, $menu04, $menu05, $menu06);
} else if($permissao == 10){
	printf('
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao" aria-expanded="false"> <span class="sr-only">Mostrar/Ocultar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a href="Index.php" class="navbar-brand">Divulga Tudo v1.0</a> </div>
		  <div class="collapse navbar-collapse" id="navegacao">
			<ul class="nav navbar-nav">
			  <li class="%s"><a href="Index.php">Inicio</a></li>
			  <li class="dropdown">
			  <li class="%s"><a href="Videos.php" >Vídeos</a></li>
			  <li class="%s"><a href="Sobre.php">Sobre</a></li>
			  <li class="%s"><a href="Contato.php">Contato</a></li>
			  <li class="%s"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Ferrementas<span class="glyphicon glyphicon-menu-down"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="Musicas.php">Músicas</a></li>
				  <li><a href="Imagens.php">Imagens</a></li>
				  <li><a href="Programas.php">Programas</a></li>
				  <li><a href="Aprendizado.php">Aprendizado</a></li>
				</ul>
			  </li>
			  <li class="%s"><a href="Painel.php">Painel</a></li>
			  <li><a href="#">Idioma</a></li>
			  </li>
			</ul>
			<form action="" class="navbar-form navbar-right" role="search">
			  <div class="form-group">
				<div class="btn-group">
				  <button type="button" class="btn btn-danger"><a href="Painel.php" style="text-decoration:none; color:#FFFFFF;">Conta</a></button>
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span> <span class="sr-only">User</span> </button>
				  <ul class="dropdown-menu">
				  	<li><a href="Administracao.php">Administrativo</a></li>
					<li><a href="PHP/sair_conta.php">Sair</a></li>
				  </ul>
				</div>
				<input type="text" class="form-control" placeholder="Buscar">
				<button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-search"></span></button>
			  </div>
			</form>
		  </div>
		</div>
	  </nav>', $menu01, $menu02, $menu03, $menu04, $menu05, $menu06);
}
?>
</body>
</html>