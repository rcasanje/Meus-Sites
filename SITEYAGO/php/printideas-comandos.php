<?php
function montarVisualizacaoProduto($caminhoImagem, $nome, $tamanho, $prazo, $qntd = 100, $preco){
	$produto = "";
	
	/*$produto .= '
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><img src="'. $caminhoImagem.'"></span>
			<div class="info-box-content">
				<span class="info-box-text">Nome: '. $nome.'</span>
				<span class="info-box-text">Tamanho: '. $tamanho.'</span>
				<span class="info-box-text">Prazo: '. $prazo.' dia</span>
				<span class="info-box-text">Tipo de impressão: '. $tipoImpresso.'</span>
				<span class="info-box-text">Preço: <b>R$ '. $preco.'</b></span>
			</div>
			<hr style="margin-top: 1%; margin-bottom: 1%;">
			<button class="btn btn-success" style="width: 49%">Comprar</button> <button class="btn btn-info" style="width: 49%">Detalhes</button>
		</div>
	</div>';*/
	
	$produto .='
	<div class="col-sm-6 col-md-2">
		<div class="thumbnail">
			<img src="images/Produtos/default.png" alt="...">
			<div class="caption">
				<h4>'. $nome.'</h4>
				<span class="info-box-text wrap">Tamanho: '. $tamanho.'</span>
				<span class="info-box-text">Prazo: '. $prazo.' dia</span>
				<span class="info-box-text">Qntd: '. $qntd.'</span>
				<span class="info-box-text">Preço: <b>R$ '. $preco.'</b></span>
				<p><a href="#" class="btn btn-success" role="button">Comprar</a> <a href="#" class="btn btn-primary" role="button">Detalhes</a></p>
			</div>
		</div>
	</div>
	';
	
	return $produto;
}


?>