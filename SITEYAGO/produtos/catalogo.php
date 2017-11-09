<?php
	include("../php/conexoes/user-access.php");
	$pagina = $_GET['page'];

	$dados = "SELECT * FROM produtos WHERE tipo_prod='$pagina'";

	printf('<div>Página selecionada: %s<br> Dados: %s</div>', $pagina, $dados);
	if($query = mysqli_query($conn, $dados)){
		while($info = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			if($info['codigo_prod'] != ""){
				printf('<div class="col-md-3"
					<div class="card" style="width: 20rem;">
						<img class="card-img-top" src="images/Produtos/%s" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">%s</h4>
							<p class="card-text">Tamanho: %s<br>Prazo: %s<br>Preço: %s</p>
							<a href="zProdutos/detalhes.php?codigo=%s" class="btn btn-primary">Detalhes</a>
							<a href="javascript:void(0)" class="btn btn-success">Adicionar ao carrinho</a>
						</div>
					</div>
				</div>', $info['imagem_prod'], $info['nome_prod'], $info['tamanho_prod'], $info['prazo_prod'], $info['preco_prod'], $info['codigo_prod']);			
			}
		}
	}
?>