<?php
if(!isset($_SESSION)) session_start();

$server = $_SERVER['SERVER_NAME'];
$endurl = $_SERVER ['REQUEST_URI'];

//echo $endurl;

$active = substr($endurl, 10);
//$active = substr($endurl, 1);

//echo $_SESSION['Staff']['Level'];

$links = ["index-admin.php", "painel-admin.php", "#", "#", "zAdministrativa/agenda.php", "zAdministrativa/resumo.php","zAdministrativa/estatisticas-totais.php", "zAdministrativa/estatisticas-coordenadores.php", "zAdministrativa/usuarios-funcionarios.php", "zAdministrativa/usuarios-cliente.php", "zAdministrativa/usuarios-triagem.php", "zAdministrativa/midia-foto.php", "zAdministrativa/midia-video.php", "zAdministrativa/midia-texto.php", "#", "#", "#", "#"];

$count = count($links);

if(strcmp($active, "zAdministratisva") == 1){
	for($i=0;$i < $count; $i++){
		$links[$i] = "../".$links[$i];
	}
}

if($permissao > 0 and $permissao <= 9){
	printf('
	<div class="navbar nav_title" style="border: 0;">
		<a href="%s" class="site_title"><i class="fa fa-tasks"></i><span> Administrativo</span></a>
	</div>
	<div class="clearfix"></div>
	<div class="profile clearfix">
		<!-- <div class="profile_pic">
			<img src="images/img.jpg" alt="..." class="img-circle profile_img">
		</div> -->
		<div class="profile_info">
			<span>Bem vindo,</span>
			<h2>%s</h2>
		</div>
	</div>
	<br><div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<h3>General</h3>
			<ul class="nav side-menu">
				<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Início</a></li>
						<li><a href="%s">Agenda</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-edit"></i> Usuários <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Clientes</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-wrench"></i> Suporte <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Tickets de Coordenadores</a></li>
						<li><a href="%s">Tickets de Clientes</a></li>
						<li><a href="%s">Tickets de Administradores</a></li>
						<li><a href="%s">Tickets de webmaster</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="sidebar-footer hidden-small">
		<a href="painel-admin.php" data-toggle="tooltip" data-placement="top" title="Perfil">
			<span class="fa fa-eye" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Configurações">
			<span class="fa fa-cog" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Ajuda">
			<span class="fa fa-life-ring" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Sair" href="login.html">
			<span class="fa fa-power-off" aria-hidden="true"></span>
		</a>
	</div>
	<!-- /menu footer buttons -->', $links[0], $nome_user, $links[0], $links[5], $links[9], $links[14], $links[15], $links[16], $links[17]);
} else if($permissao = 10){
	printf('
	<div class="navbar nav_title" style="border: 0;">
		<a href="%s" class="site_title"><i class="fa fa-tasks"></i><span> Administrativo</span></a>
	</div>
	<div class="clearfix"></div>
	<div class="profile clearfix">
		<!-- <div class="profile_pic">
			<img src="images/img.jpg" alt="..." class="img-circle profile_img">
		</div> -->
		<div class="profile_info">
			<span>Bem vindo,</span>
			<h2>%s</h2>
		</div>
	</div>
	<br><div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<h3>General</h3>
			<ul class="nav side-menu">
				<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Início</a></li>
						<li><a href="%s">Agenda</a></li>
						<li><a href="%s">Resumo do mês</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-list-ol"></i> Estatísticas <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Estatísticas totais</a></li>
						<li><a href="%s">Estatísticas por colaborador</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-edit"></i> Usuários <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Coordenadores</a></li>
						<li><a href="%s">Clientes</a></li>
						<li><a href="%s">Triagem</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-file-image-o"></i>Mídia<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Fotos</a></li>
						<li><a href="%s">Vídeos</a></li>
						<li><a href="%s">Texto</a></li>
					</ul>
				</li>
				<li><a><i class="fa fa-wrench"></i> Suporte <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="%s">Tickets de colaboradores</a></li>
						<li><a href="%s">Tickets de sub-colaboradores</a></li>
						<li><a href="%s">Tickets de administradores</a></li>
						<li><a href="%s">Tickets de webmaster</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="sidebar-footer hidden-small">
		<a href="painel-admin.php" data-toggle="tooltip" data-placement="top" title="Perfil">
			<span class="fa fa-eye" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Configurações">
			<span class="fa fa-cog" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Ajuda">
			<span class="fa fa-life-ring" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Sair" href="login.html">
			<span class="fa fa-power-off" aria-hidden="true"></span>
		</a>
	</div>
	<!-- /menu footer buttons -->', $links[0], $nome_user, $links[0], $links[4], $links[5], $links[6], $links[7], $links[8], $links[9], $links[10], $links[11], $links[12], $links[13], $links[14], $links[15], $links[16], $links[17]);
}

session_write_close();

?>