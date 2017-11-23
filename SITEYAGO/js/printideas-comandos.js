var qntd = 0;
var confirmaSenha = false;
var confirmaEmail = false;

function verificarQuantidade(num){
	document.getElementById('carrinhoQntd').innerHTML = qntd;
}


function adicionarCarrinho(id){
	aqntd = parseInt(document.getElementById('carrinhoQntd').innerHTML);
	
	qntd = aqntd+1;
	jQuery.ajax({
		type: "POST",
		url: "../php/adicionar-carrinho.php",
		data: {qntd:qntd, id:id},
		success: function( data )
		{
			alert(data);
		}
	});

	document.getElementById('carrinhoQntd').innerHTML = qntd;
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
	var cemail = document.getElementById('cemail')
	
	if(email.value != cemail.value){
		email.style.borderColor = "red";
		cemail.style.borderColor = "red";
		confirmaEmail = false
	} else{
		email.style.borderColor = "green";
		cemail.style.borderColor = "green";
		confirmaEmail = true;
	}
	
	habilitarEnvio();
}