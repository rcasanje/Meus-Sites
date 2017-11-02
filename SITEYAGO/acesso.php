<html>

<head>
	<?php
		if(!isset($_SESSION)) session_start();
		include("php/informacoes.php");
	?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/smart_wizard.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/smartWizard.js"></script>
	<title>Acesso :: ATUAL MK</title>
</head>

<body class="gradiente-lightblue">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container">
		<div class="row" style="padding: 10px">
			<div class="card" style="width: 87%">
				<h4 class="card-header">Login</h4>
				<div class="card-body">
					<form method="post" action="php/user-login.php" class="content-white">
						<div class="alert alert-danger" role="alert">
							<?php 
								if(isset($_SESSION['Erro']['Login'])){
									$num = $_SESSION['Erro']['Login'];
									printf("%s", errosLogin($num));
								}
							?>
						</div>
						<div class="form-group">
							<label>Nome de login</label>
							<input class="form-control" type="text" name="login" placeholder="Nome de login">
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input class="form-control" type="password" name="senha" placeholder="Senha">
						</div>
						<button class="btn btn-info" type="submit">Fazer login</button>
					</form>
				</div>
			</div>
			</div>
			<div>
				<div>
					<?php //printf('%s', Teste($_SESSION['Erro']['Registro'])); ?>
				</div>
				<h3>Registro</h3>
				<form id="formRegistro" method="post" name="formRegistro">
				<div id="wizard" class="swMain">
					<ul>
						<li><a href="#step-1"><label class="stepNumber">1</label><span class="stepDesc">Acesso<br><small>Informações de acesso</small></span></a></li>
						<li><a href="#step-2"><label class="stepNumber">2</label><span class="stepDesc">Dados<br><small>Informações pessoais</small></span></a></li>
						<li><a href="#step-3"><label class="stepNumber">3</label><span class="stepDesc">Endereço<br><small>Informações de entrega</small></span></a></li>
						<li><a href="#step-4"><label class="stepNumber">4</label><span class="stepDesc">Termos<br><small>Termos do website</small></span></a></li>
					</ul>
					<div id="step-1" style="height: 410px">
						<h2 class="StepTitle">Dados de acesso</h2>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Email*</label>
							<input class="form-control" id="email" type="email" name="email" placeholder="example@provider.com" maxlength="64" required>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Confirme Email*</label>
							<input class="form-control" id="cemail" type="cemail" name="cemail" placeholder="example@provider.com" autocomplete="off" required>
							<small id="cemailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Senha*</label>
							<input class="form-control" id="password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" min="6" maxlength="64" placeholder="Senha" required>
							<small id="passwordHelp" class="form-text text-muted">Deve conter de 6 a 64 caracteres, 1 número e 1 letra maiúscula e minúscula </small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Confirme Senha*</label>
							<input class="form-control" id="cpassword" type="password" name="cpassword" min="6" maxlength="64" placeholder="Senha" autocomplete="off" required>
							<small id="cpasswordHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Nome de login*</label>
							<input class="form-control" id="login" type="text" name="login" pattern="[a-zA-Z]{4,64}" min="4" maxlength="64" placeholder="example" required>
							<small id="loginHelp" class="form-text text-muted">Deve conter pelo de 4 a 64 caracteres</small>
						</div>
					</div>
					<div id="step-2" style="height: 410px">
						<h2 class="StepTitle">Dados pessoais</h2>
						<div class="form-group alinhar-esquerda" style="width: 97%">
							<label>Nome e sobrenome*</label>
							<input class="form-control" type="text" name="nomecomp" placeholder="Ex: Rafel Casanje" pattern="[a-z][A-Z]{6,}" min="6" maxlength="64" required>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>RG*</label>
							<input class="form-control" type="tex" name="rg" placeholder="xx.xxx.xxx-x" pattern="[0-9]{9}" maxlength="9" required>
							<small id="rgHelp" class="form-text text-muted">Preencher sem a pontuação</small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>CPF*</label>
							<input class="form-control" type="tex" name="cpf" placeholder="xxx.xxx.xxx-xx" pattern="[0-9]{11}" maxlength="11" required>
							<small id="cpfHelp" class="form-text text-muted">Preencher sem a pontuação</small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Telefone/Celular princpal*</label>
							<input class="form-control" type="tel" name="telefone" placeholder="xx xxxxxxxx" pattern="[0-9]{8, 15}" maxlength="15" required>
							<small id="telefoneHelp" class="form-text text-muted">Preencher sem a pontuação</small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 47%">
							<label>Telefone/Celular secundário</label>
							<input class="form-control" type="tel" name="celular" placeholder="xx xxxxxxxxx" pattern="[0-9]{9, 15}" maxlength="15">
							<small id="celularHelp" class="form-text text-muted">Preencher sem a pontuação</small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 97%">
							<label>Data de nascimento*</label>
							<input class="form-control" type="date" name="dataNasc" placeholder="dd/mm/aaaa" required>
						</div>
					</div>
					<div id="step-3" style="height: 410px">
						<h2 class="StepTitle">Endereço</h2>
						<div class="form-group alinhar-esquerda" style="width: 30%">
							<label>CEP*</label>
							<input class="form-control" type="text" name="cep" placeholder="Ex: xxxxx-xx" pattern="[0-9]{7,9}" maxlength="9" required>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 65%">
							<label>Endereço*</label>
							<input class="form-control" type="text" name="endereco" placeholder="Ex: Avenida Paulista" maxlength="64" required>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 20%">
							<label>Número*</label>
							<input class="form-control" type="number" name="numero" placeholder="Ex: 2346" pattern="[0-9]{10}" maxlength="10" required>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 75%">
							<label>Complemento</label>
							<input class="form-control" type="text" name="compl" placeholder="Ex: Bloco 2 Apto 201" maxlength="64">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 31.2%">
							<label>Bairro*</label>
							<input class="form-control" type="text" name="bairro" placeholder="Ex: Bela Vista" maxlength="64" required>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 31.2%">
							<label>Cidade/Estado*</label>
							<input class="form-control" type="text" name="municipio" placeholder="Ex: São Paulo" maxlength="64" required>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group alinhar-esquerda" style="width: 31.2%">
							<label>UF*</label>
							<input class="form-control" type="text" name="estado" placeholder="Ex: SP" maxlength="2" required>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
					</div>
					<div id="step-4" style="height: 410px">
						<h2 class="StepTitle">Termos e condições</h2>
						<div class="form-check">
							<label class="form-check-label"><input type="checkbox" class="form-check-input" name="termos" required>Eu li e aceito os <a href="terms_of_use.php">Termos de Uso </a> e a <a href="privacy_policy.php"> Política de Privacidade</a></label>
						</div>
						<div class="form-check">
							<label class="form-check-label"><input type="checkbox" class="form-check-input" name="newsletter">Aceito receber newsletter e outras informações de Atual MK</label>
						</div>
						<div class="form-check">
							<label class="form-check-label"><input type="checkbox" class="form-check-input" name="promocao">Aceito receber promoções e ofertas de Atual MK</label>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
</body>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$( document ).ready( function () {
		// Smart Wizard 	
		$( '#wizard' ).smartWizard({
			labelNext:'Próximo', // label for Next button
			labelPrevious:'Anterior', // label for Previous button
			labelFinish:'Registrar',
			onFinish: onFinishCallback,
		});
		
		function leaveAStepCallback(obj){
			var step_num= obj.attr('rel');
			return validateSteps(step_num);
      	}
      
		function onFinishCallback(){
			if(validateAllSteps()){
				$.ajax({
					type: "POST",
					url: "php/user-register.php",
					data: $('#formRegistro').serialize(),
					success: function(data, result) {
						if (data.substring(0,7) == 'Sucesso') {
							alert("Registrado com sucessso");
							window.open("painel.php");
						} else {
							alert("Ocorreu algum erro:\n" + data);
						}
					}
				});
		   	}
		}
		
		function validateAllSteps(){
			var isStepValid = true;

			if(validateStep1() == false){
			isStepValid = false;
				$('#wizard').smartWizard('setError',{stepnum:1,iserror:true});         
				}else{
				$('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
			}

			if(!isStepValid){
				$('#wizard').smartWizard('showMessage','Por favor concerte os erros na etapa para continuar');
			}

			return isStepValid;
		} 	


		function validateSteps(step){
			var isStepValid = true;
			// validate step 1
			if(step == 1){
				if(validateStep1() == false ){
				  isStepValid = false; 
				  $('#wizard').smartWizard('showMessage','Por favor concerte os erros no passo '+step+ ' e clique em prõximo.');
				  $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});         
				}else{
				  $('#wizard').smartWizard('hideMessage');
				  $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
				}
			}

			return isStepValid;
		}

		function validateStep1(){ /* CONFIRMAÇÃO DO PRIMEIRO PASSO */
			var isValid = true; 
			
			var email = $('#email').val();
			if(email && email.length > 0){
				if(!isValidEmailAddress(email)){
					isValid = false;
					$('#emailHelp').html('Email é inválido').show();           
				} else{
					$('#emailHelp').html('').hide();
				}
			} else{
				isValid = false;
				$('#email').html('Por favor, informe um email').show();
			}  
			
			var un = $('#login').val();
			if(!un && un.length <= 0){
				isValid = false;
				$('#loginHelp').html('Por favor, preencha esse campo').show();
			}else{
				$('#loginHelp').html('').hide();
			}

			var pw = $('#password').val();
			if(!pw && pw.length <= 0){
				isValid = false;
				$('#passwordHelp').html('Por favor, preencha esse campo').show();         
			}else{
				$('#passwordHelp').html('').hide();
			}

			// validate confirm password
			var cpw = $('#cpassword').val();
			if(!cpw && cpw.length <= 0){
			isValid = false;
				$('#cpasswordHelp').html('Por favor, preencha esse campo').show();         
			}else{
				$('#cpasswordHelp').html('').hide();
			}  

			// validate password match
			if(pw && pw.length > 0 && cpw && cpw.length > 0){
				if(pw != cpw){
			   		isValid = false;
			   		$('#cpasswordHelp').html('Senhas não conferem').show();            
			 	}else{
			   		$('#cpasswordHelp').html('').hide();
			 	}
			}
			return isValid;
		}
		
		function isValidEmailAddress(emailAddress) {
			var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			return pattern.test(emailAddress);
		} /* FIM DO PRIMEIRO PASSO */
		
	});
</script>

</html>