var qntd = 0;

function verificarQuantidade(num){
	document.getElementById('carrinhoQntd').innerHTML = qntd;
}


function adicionarCarrinho(){
	aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	
	qntd = aqntd+1;
	jQuery.ajax({
		type: "POST",
		url: "../php/adicionar-carrinho.php",
		data: {qntd:qntd},
		success: function( data )
		{
			//alert(data);
		}
	});

	document.getElementById('carrinhoQntd').innerHTML = qntd;
}