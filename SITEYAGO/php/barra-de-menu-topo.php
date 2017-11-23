<?php
if(!isset($_SESSION)) session_start();

$abspath = $_SERVER['REQUEST_URI'];

if(strpos($abspath, "produtos") > -1 || strpos($abspath, "conta") > -1){
	$abspath = "../";
} else{
	$abspath = "";
}

include($abspath."/php/conexoes/user-access.php");

if(isset($_SESSION['Cliente']) && $_SESSION['Cliente']['nomeusuario'] != null){
	$nomeusuario = $_SESSION['Cliente']['nomeusuario'];
} else{
	$_SESSION['Cliente']['nomeusuario'] = null;
	
	$nomeusuario = "Faça login";
}

if(isset($_SESSION['Produtos'])){
	$quantidade = $_SESSION['Produtos']['quantidade'];
	$produtos = $_SESSION['Produtos']['idprodutos'];
	$qntdprodut = array();
	$idprodut = array();
} else{
	$_SESSION['Produtos']['idprodutos'] = "";
	$_SESSION['Produtos']['quantidade'] = 0;
	$qntdprodut = array();
	$quantidade = "0";
	$produtos = "";
}
?>

<header class="main-header">
	<a href="index.php" class="logo"><span class="logo-mini"><b>P</b> I</span><span class="logo-lg"><b>Print</b> Ideas</span></a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php
					if($nomeusuario == "Faça login"){
						printf('<li>
									<a href="%s">Registrar / Log In</a>
								</li>', $abspath."acesso.php");
					}
				?>
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cart-plus"></i> Carrinho&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-success" style="font-size: 17px;" id="carrinhoQntd"><?php echo $quantidade;?></span></a>
					<ul class="dropdown-menu" style="width: 450%;">
						<li class="header">Itens no carrinho: <?php echo $quantidade;?></li>
						<li>
							<ul class="menu">
								<?php
								$idQuery = "";
								$index = 1;
								$posPast = 0;
								$posSearch = 0;
								
								$saveProduct = $produtos;
								//printf("Produtos Salvos: %s<br>", $saveProduct);
																
								while($saveProduct != ""){
									$posSearch = strpos($saveProduct, ",");
									$getID = substr($saveProduct, 0, $posSearch);
									$setID = substr($getID, 0, -3);
									$setQntd = substr($getID, strlen($getID)-2, -1);
									
									if($idQuery == ""){
										$idQuery .= "'".$setID."'";
									} else {
										$idQuery .= ", '".$setID."'";
									}
									
									$idprodut[$index] = $setID;
									$qntdprodut[$index] = $setQntd;
									
									//printf("Edição: %s<br>", $saveProduct);
									$saveProduct = substr($saveProduct, $posSearch+1, strlen($saveProduct));
									
									$index++;
								}
								
								if($idQuery != ""){
									$dados = "SELECT * FROM produtos WHERE codigo_prod IN ($idQuery)";
									//printf("Dados: %s<br>", $dados);

									if($query = mysqli_query($conn, $dados)){
										$index = 1;
										while($prod = mysqli_fetch_array($query)){
											printf('<li>
												<a href="#"><img src="../images/Produtos/default.png" width="25" height="25"> %s || Qntd: %s</a>
											</li>', $prod['nome_prod'], $qntdprodut[$index]);
											$index++;
										}
									} else{
										echo mysqli_error($conn);
									}
								}
								?>
								<!-- <li>
									<a href="#"><img src="images/Produtos/default.png" width="25" height="25"> Nome do produto gigante para um caraca R$ 9999.99</a>
								</li> -->
							</ul>
						</li>						
						<li class="footer"><a href="<?php echo($abspath."carrinho.php"); ?>">Visualizar tudo</a><a href="#">Fechar carinho</a></li>
					</ul>
				</li>
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?php echo $nomeusuario ?></span></a>
					<ul class="dropdown-menu">
						<li class="user-header"> 
							<img src="<?php echo($abspath."images/Produtos/default.png"); ?>" class="img-circle" alt="User Image">
							<p><?php echo $nomeusuario ?></p>
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