<!doctype html>
<html>
<head>
<?php
include("php/verificar.php");
if(!isset($_SESSION)) session_start();
?>
<meta charset="utf-8">
<title>Acesso :: Sala de Exercícios</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/formoid-solid-orange.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<header>
  <?php include("php/barra_de_menu.php");?>
</header>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div id="login">
        <form action="php/receber_contas.php" class="formoid-solid-orange" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
          <div class="title">
            <h2>Login</h2>
          </div>
          <?php
          switch($_SESSION['Server']['erro']){
				case 10:
					printf('<div class="alert alert-danger" role="alert">Apelido ou senha errados</div>');
					break;
				case 503:
					printf('<div class="alert alert-warning" role="alert">Não foi possível verificar o login por conta de algum problema com o Banco de Dados</div>');
					break;
				default:
					break;
			}
          ?>
          <div class="element-input">
            <label class="title"><span class="required">*</span></label>
            <div class="item-cont">
              <input class="large" type="text" name="nickname" value="" required="required" placeholder="Apelido"/>
              <span class="icon-place"></span></div>
          </div>
          <div class="element-password">
            <label class="title"><span class="required">*</span></label>
            <div class="item-cont">
              <input class="large" type="password" name="password" value="" required="required" placeholder="Password"/>
              <span class="icon-place"></span></div>
          </div>
          <div class="element-checkbox">
            <label class="title"></label>
            <div class="column column1">
              <label>
                <input type="checkbox" name="conectado" value="permconn"/>
                <span>Permanecer conectado?</span></label>
            </div>
            <span class="clearfix"></span> </div>
          <div class="submit">
            <input type="submit" value="Submit"/>
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-6">
      <form class="formoid-solid-orange" action="php/enviar_contas.php" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
        <div class="title">
          <h2>Registro</h2>
        </div>
        <div id="erros">
          <?php
			switch($_SESSION['Server']['erro']){
				case 20:
					printf('<div class="alert alert-danger" role="alert">O campo de NOME possui mais que 50 caracteres</div>');
					break;
				case 21:
					printf('<div class="alert alert-danger" role="alert">O campo de APELIDO possui mais que 16 caracteres</div>');
					break;
				case 22:
					printf('<div class="alert alert-danger" role="alert">O campo de SENHA possui mais que 18 caracteres<div>');
					break;
				case 23:
					printf('<div class="alert alert-danger" role="alert">O APELIDO usado já está em uso</div>');
					break;
				case 24:
					printf('<div class="alert alert-danger" role="alert">O EMAIL usado já esta em uso</div>');
					break;
				case 25:
					printf('<div class="alert alert-danger" role="alert">Essa combinação e APELIDO e EMAIL já existe</div>');
					break;
				case 503:
					printf('<div class="alert alert-warning" role="alert">Não foi possível enviar o seu registro por conta de algum problema com o Banco de Dados</div>');
					break;
				default:
					break;
			}
		?>
        </div>
        <div class="element-input">
          <label class="title"><span class="required">Nome (max 50 chars)*</span></label>
          <div class="item-cont">
           <input class="large" type="text" min="5" maxlength="50" name="nome" required="required" placeholder="Name"/>
           <span class="icon-place"></span></div>
        </div>
        <div class="element-input">
          <label class="title"><span class="required">Apelido (4 - 16 chars)*</span></label>
          <div class="item-cont">
            <input class="large" type="text" min="4" maxlength="16" name="apelido" required="required" placeholder="Nickname"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-email">
          <label class="title"><span class="required">E-mail *</span></label>
          <div class="item-cont">
            <input class="large" type="email" name="email" maxlength="100" value="" required="required" placeholder="Email"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-password">
          <label class="title"><span class="required">Senha (max 18 chars)*</span></label>
          <div class="item-cont">
            <input class="large" type="password" maxlength="18" name="senha" value="" required="required" placeholder="Password"/>
            <span class="icon-place"></span></div>
        </div>
        <!-- <div class="element-input">
          <label class="title"><span class="required">*</span></label>
          <div class="item-cont">
            <input class="large" type="text" name="input1" required="required" placeholder="Captcha"/>
            <span class="icon-place"></span></div>
        </div> -->
        <div class="submit">
          <input type="submit" value="Submit"/>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>