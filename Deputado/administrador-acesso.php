<!DOCTYPE html>
<html lang="en">
<head>
<?php
	if(!isset($_SESSION)) session_start();
	include("php/funcoes.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrador acesso</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/nprogress.css" rel="stylesheet">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
				<form method="post" action="php/login-admin.php">
					<h1>Login</h1>
					<?php
						if(isset($_SESSION['Admin'])){
							printf('<div class="alert alert-danger" role="alert">%s</div>', erroLoginAdmin($_SESSION['Admin']['Erro']));
						}
					?>
					<div>
						<input type="text" class="form-control" placeholder="Username" name="apelido" required />
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Password" name="senha" required />
					</div>
					<div> <button class="btn btn-default" type="submit">Log in</button></div>
					<div class="clearfix"></div>
					<div class="separator">
						<p class="change_link">Perdeu a senha? <a href="#signup" class="to_register"> Recuperar senha </a> </p>
						<div class="clearfix"></div>
						<br />
						<div>
							<p>©2017 All Rights Reserved to Rafael Casanje. Privacy and Terms</p>
						</div>
					</div>
				</form>
			</section>
		</div>
		<div id="register" class="animate form registration_form">
			<section class="login_content">
				<form method="post" action="php/recuperarSenha-administrativo.php">
					<h1>Recuperar senha</h1>
					<div>
						<input type="text" class="form-control" placeholder="Username" required="" />
					</div>
					<div>
						<input type="email" class="form-control" placeholder="Email" required="" />
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Password" required="" />
					</div>
					<div> <a class="btn btn-default submit" href="index.html">Submit</a> </div>
					<div class="clearfix"></div>
					<div class="separator">
						<p class="change_link">Lembrou da senha ? <a href="#signin" class="to_register"> Faça log in </a> </p>
						<div class="clearfix"></div>
						<br />
						<div>
							<p>©2017 All Rights Reserved to Rafael Casanje. Privacy and Terms</p>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>
</body>
</html>
