<?php
if(isset($_SESSION['User']['ID'])){
	$nomeConta = $_SESSION['User']['ID'];	
} else{
	$nomeConta = "Cliente";
}
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="images/Produtos/default.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$nomeConta;?></p>
			</div>
			<br>
			<br>
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn"><button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
				</div>
			</form>
		</div>
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">PRINT IDEAS</li>
			<li><a href="<?=$abspath;?>index.php"><i class="fa fa-home"></i><span>Inicio</span><span class="pull-right-container"</span></a></li>
			<li><a href="<?=$abspath;?>about.php"><i class="fa fa-info"></i><span>Quem somos</span><span class="pull-right-container"</span></a></li>
			<li><a href="<?=$abspath;?>contact.php"><i class="fa fa-comments"></i><span>Contatos</span><span class="pull-right-container"</span></a></li>
			<li class="header">CONTA</li>
			<li><a href="javascript:void(0)" onClick="carregarAjax(0);"><i class="fa fa-home"></i><span>Dados</span><span class="pull-right-container"</span></a></li>
			<li><a href="javascript:void(0)" onClick="carregarAjax(1);"><i class="fa fa-info"></i><span>Endereço</span><span class="pull-right-container"</span></a></li>
			<li><a href="javascript:void(0)" onClick="carregarAjax(2);"><i class="fa fa-briefcase"></i><span>Devolução</span><span class="pull-right-container"</span></a></li>
			<li><a href="javascript:void(0)" onClick="carregarAjax(3);"><i class="fa fa-comments"></i><span>Lista de Desejo</span><span class="pull-right-container"</span></a></li>
			<!-- <li class="treeview">
				<a href="#"><i class="fa fa-files-o"></i><span>Layout Options</span><span class="pull-right-container"><span class="label label-primary pull-right">4</span></span></a>
				<ul class="treeview-menu">
					<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
					<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
					<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
					<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
				</ul>
			</li> -->
		</ul>
	</section>
</aside>