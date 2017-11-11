<header class="main-header">
	<a href="index.html" class="logo"><span class="logo-mini"><b>P</b> I</span><span class="logo-lg"><b>Print</b> Ideas</span></a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-plus"></i> Carrinho&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-success" style="font-size: 17px;" id="carrinhoQntd"><?php echo $quantidade;?></span></a>
					<ul class="dropdown-menu">
						<li class="header">Itens no carrinho: <?php echo $quantidade;?></li>
						<li>
							<ul class="menu">
								<li>
									<a href="#"><img src="images/Produtos/default.png" width="25" height="25"> Nome do produto gigante para um caraca R$ 9999.99</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">Visualizar tudo</a><a href="#">Fechar carinho</a></li>
					</ul>
				</li>
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs">Faça login</span></a>
					<ul class="dropdown-menu">
						<li class="user-header"> 
							<img src="images/Produtos/default.png" class="img-circle" alt="User Image">
							<p>Faça login</p>
						</li>
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center"><a href="#">Perfil</a></div>
								<div class="col-xs-4 text-center"><a href="#">Pedidos</a></div>
								<div class="col-xs-4 text-center"><a href="#">Atendimento</a></div>
							</div>
						</li>
						<li class="user-footer">
							<div class="pull-left"><a href="#" class="btn btn-default btn-flat">Lista de desejos</a></div>
							<div class="pull-right"><a href="#" class="btn btn-default btn-flat">Sair</a></div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>