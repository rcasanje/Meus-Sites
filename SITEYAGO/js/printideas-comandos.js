var qntd = 0;
var confirmaSenha = false;
var confirmaEmail = false;

function verificarQuantidade(num){
	document.getElementById('carrinhoQntd').innerHTML = qntd;
}


function adicionarCarrinho(id, path){
	aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	
	qntd = aqntd+1;
	jQuery.ajax({
		type: "POST",
		url: path + "php/carrinho-adicionar.php",
		data: {qntd:qntd, id:id},
		success: function( data )
		{
			alert(data);
		}
	});

	document.getElementById('carrinhoQntd').innerHTML = qntd;
}

function removerCarrinho(id){
	var aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	
	qntd = aqntd-1;
	
	jQuery.ajax({
		type: "POST",
		url: "php/carrinho-adicionar.php",
		data: {qntd:qntd, id:id},
		success: function( data )
		{
			alert(data);
			window.location.reload();
		}
	});
	
	document.getElementById('carrinhoQntd').innerHTML = qntd - 1;
}

function habilitarEnvio(){
	var btnEnviar = document.getElementById('enviarRegistro');
	
	if(confirmaSenha == true && confirmaEmail == true){
		btnEnviar.removeAttribute('disabled');
	} else{
		btnEnviar.setAttribute('disabled', true);
	}
}

function verificarSenha(){
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