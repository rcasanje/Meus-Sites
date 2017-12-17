var qntd = 0;
var confirmaSenha = false;
var confirmaEmail = false;

function verificarQuantidade(num){
	'use strict';
	document.getElementById('carrinhoQntd').innerHTML = qntd;
}


function adicionarCarrinho(id, path){
	'use strict';
	var aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	
	qntd = aqntd+1;
	jQuery.ajax({
		type: "POST",
		url: path + "php/carrinho-adicionar.php",
		data: {qntd:qntd, id:id},
		success: function( data )
		{
			//alert(data);
		}
	});

	document.getElementById('carrinhoQntd').innerHTML = qntd;
}

function removerCarrinho(id, qntd){	
	'use strict';
	var aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	jQuery.ajax({
		type: "POST",
		url: "php/carrinho-remover.php",
		data: {id:id, qntd:qntd},
		success: function( data )
		{
			//alert(data);
			document.getElementById('carrinhoQntd').innerHTML = aqntd - qntd;
			window.location.reload();
		}
	});
}

function habilitarEnvio(){
	'use strict';
	var btnEnviar = document.getElementById('enviarRegistro');
	
	if(confirmaSenha == true && confirmaEmail == true){
		btnEnviar.removeAttribute('disabled');
	} else{
		btnEnviar.setAttribute('disabled', true);
	}
}

function verificarSenha(){
	'use strict';
	var senha = document.getElementById('senha');
	var csenha = document.getElementById('csenha');
	
	if(senha.value != csenha.value){
		senha.style.borderColor = "red";
		csenha.style.borderColor = "red";
		confirmaSenha = false;
	} else{
		senha.style.borderColor = "green";
		csenha.style.borderColor = "green";
		confirmaSenha = true;
	}
	
	habilitarEnvio();
}

function verificarEmail(){
	'use strict';
	var email = document.getElementById('email');
	var cemail = document.getElementById('cemail');
	
	if(email.value != cemail.value){
		email.style.borderColor = "red";
		cemail.style.borderColor = "red";
		confirmaEmail = false;
	} else{
		email.style.borderColor = "green";
		cemail.style.borderColor = "green";
		confirmaEmail = true;
	}
	
	habilitarEnvio();
}