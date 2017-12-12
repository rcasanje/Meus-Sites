<?php
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=$abspath;?>images/Produtos/default.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$nomeCliente;?></p>
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
			<li class="header">PERSONALIZADOS</li>
			<li><a href="<?=$abspath;?>personalizado/para-empresa.php"><i class="fa fa-briefcase"></i><span>Para empresas</span><span class="pull-right-container"</span></a></li>
			<li><a href="<?=$abspath;?>personalizado/para-festa.php#"><i class="fa fa-magic"></i><span>Para festas</span><span class="pull-right-container"></span></a></li>
			<li><a href="<?=$abspath;?>personalizado/para-casa.php#"><i class="fa fa-home"></i><span>Para sua casa</span><span class="pull-right-container"></span></a></li>
			<li><a href="<?=$abspath;?>personalizado/para-design.php#"><i class="fa fa-cubes"></i><span>Cenários 3D</span><span class="pull-right-container"></span></a></li>
			<li class="header">PRODUTOS</li>
			<!-- <li class="treeview">
				<a href="#"><i class="fa fa-files-o"></i><span>Layout Options</span><span class="pull-right-container"><span class="label label-primary pull-right">4</span></span></a>
				<ul class="treeview-menu">
					<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
					<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
					<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
					<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
				</ul>
			</li> -->
			<?php
				foreach(txtToArray($abspath."prefabs/barra-de-menu-lateral.txt") as $item){
					if($item != ""){
						printf('
								<li><a href="#"><i class="fa fa-circle-o"></i><span>%s</span><span class="pull-right-container"</span></a></li>
					', $item);
					}
				}
			?>
		</ul>
	</section>
</aside>