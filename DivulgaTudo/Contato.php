<?php
	if(!isset($_SESSION)) session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contato :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/Contato.css">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="CSS/formoid-default-red.css"/>
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body class="site">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container">
  <div class="row" style="margin-top:60px;">
    <div class="col-sm-6">
      <form action="PHP/enviar_ticket.php" class="formoid-default-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:500px;min-width:150px" method="post">
        <div class="title">
          <h2>Contato</h2>
        </div>
        <div>
          <?php 
			if($_SESSION['User']['erro'] == -1){
				printf('<div class="alert alert-danger" role="alert">Serviço temporáriamente fora do ar. </div>');	
			} else if($_SESSION['User']['erro'] == 1){
				printf('<div class="alert alert-sucess" role="alert">Ticket enviado com sucesso. </div>');
			}
			$_SESSION['User']['erro'] = 0;
		  ?>
        </div>
        <div class="element-input">
          <label class="title">Seu Email<span class="required">*</span></label>
          <input class="large" type="text" name="email" required="required"/>
        </div>
        <div class="element-input">
          <label class="title">Assunto<span class="required">*</span></label>
          <input class="large" type="text" name="assunto" required="required autocomplete="off""/>
        </div>
        <div class="element-select">
          <label class="title">Problema/Dúvida</label>
          <div class="large"><span>
            <select name="problema" >
              <option value="Selecione">Selecione</option>
              <option value="Bug">Bug</option>
              <option value="Geral">Geral</option>
              <option value="Dúvida">Dúvida</option>
              <option value="Feedback">Feedback</option>
              <option value="Recuperar Conta">Recuperar Conta</option>
              <option value="Problema Técnico">Problema Técnico</option>
            </select>
            <i></i></span> </div>
        </div>
        <div class="element-textarea">
          <label class="title">Descrição<span class="required">*</span></label>
          <textarea class="medium" name="descricao" cols="20" rows="5" required></textarea>
        </div>
        <div>
          <input class="form-control" type="text" placeholder="<?php include("PHP/captcha.php"); $captcha;?>" readonly>
          <input class="large" type="text" name="vcaptcha" autocomplete="off">
          <input class="hidden" type="text" value="<?php $captcha; ?>" name="verifycp">
        </div>
        <div class="submit">
          <input type="submit" value="Enviar"/>
        </div>
      </form>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Contato</h3>
        </div>
        <div class="panel-body">
          <p>Nesta página você pode entrar em contato conosco e tirar qualquer tipo de dúvida sobre o nosso site. Não excite em nos mandar um e-mail com sua dúvida, feedback ou qualquer coisa relacionada a suporte técnico tanto do site ou sobre sua conta, estaremos felizes em responder e saber que seu problema está resolvido.</p>
          <p>Nosso e-mail: exemplo@dominio.com || Respondemos entre 8h até 18h.</p>
          <p>Podemos demorar até 24h para responder seu ticket/email.</p>
        </div>
      </div>
    </div>
  </div>
  <footer class="panel-footer">
    <?php include("PHP/rodape.php");?>
  </footer>
</div>
</body>
</html>
<b