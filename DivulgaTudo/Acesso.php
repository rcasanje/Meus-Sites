<?php
	if (!isset($_SESSION)) session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Painel :: Divulgatube</title>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/formoid-solid-red.css" >
<link rel="stylesheet" type="text/css" href="CSS/formoid-default-red.css" >
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
</head>
<body id="site">
<header>
  <?php include("PHP/barra_de_menu.php");?>
</header>
<div class="container" style="margin-top:60px;">
  <div class="row">
    <div class="col-sm-6">
      <form action="PHP/receber_contas.php" class="formoid-solid-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
        <div class="title">
          <h2>Login</h2>
        </div>
        <?php 
	  	if($_SESSION['User']['erro'] == 5){
			printf('<div class="alert alert-danger" role="alert">Apelido ou senha errados</div>');
		}
		?>
        <div class="element-input">
          <label class="title"><span class="required">*</span></label>
          <div class="item-cont">
            <input class="large" type="text" name="apelidol" value="" required="required" placeholder="Apelido"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-password">
          <label class="title"><span class="required">*</span></label>
          <div class="item-cont">
            <input class="large" type="password" value="" required="required" placeholder="Senha" name="lsenha"/>
            <span class="icon-place"></span></div>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-default" style="margin-top:10px;">
              <input type="checkbox" autocomplete="off" checked>
              Permacener logado ? </label>
          </div>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#recsenha" style="margin-top:15px; margin-left:69%;"> Recuperar senha </button>
        </div>
        <div class="submit">
          <input type="submit" value="Enviar"/>
        </div>
      </form>
    </div>
    <div class="col-sm-6" id="registro">
      <form action="PHP/enviar_contas.php" class="formoid-solid-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
        <div class="title">
          <h2>Registro</h2>
        </div>
        <?php
			if($_SESSION['User']['erro'] == 10){
				printf('<div class="alert alert-danger" role="alert">O campo "DIA" não pode ser maior que 31</div>');
			} else if($_SESSION['User']['erro'] == 11){
				printf('<div class="alert alert-danger" role="alert">O campo "MÊS" não pode ser maior que 12</div>');
			} else if($_SESSION['User']['erro'] == 12){
				printf('<div class="alert alert-danger" role="alert">O campo "DIA" do mês de FEVEREIRO não pode ser maior que 28</div>');
			} else if($_SESSION['User']['erro'] == 13){
				printf('<div class="alert alert-danger" role="alert">O campo "ANO" não pode ser maior que o ano atual</div>');
			}
		?>
        <div class="element-name">
          <label class="title"><span class="required">*Nome completo</span></label>
          <span class="nameFirst">
          <input placeholder=" Nome" type="text" size="8" pattern="[A-Za-z]{1,}" name="name[first]" required="required"/>
          <span class="icon-place"></span></span><span class="nameLast">
          <input placeholder=" Sobrenome" type="text" size="14" pattern="[A-Za-z]{1,}" name="name[last]" required="required"/>
          <span class="icon-place"></span></span></div>
        <div class="element-input">
          <label class="title"><span class="required">*Apelido</span></label>
          <div class="item-cont">
            <input class="large" type="text" name="apelido" pattern="[A-Za-z0-9]{4,}" required="required" placeholder="Apelido"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-email">
          <label class="title"><span class="required">*Email</span></label>
          <div class="item-cont">
            <input class="large" type="email" name="email" value="" required="required" placeholder="example@domain.com"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-password">
          <label class="title"><span class="required">*Senha</span></label>
          <div class="item-cont">
            <input class="large" type="password" name="senha" pattern=".{6,}" required="required" placeholder="Senha"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="element-separator">
          <hr>
          <h3 class="section-break-title">Data de Aniversário</h3>
        </div>
        <table id="ajeitar">
          
            <td><div class="element-number">
                <label class="title"><span class="required">*Dia</span></label>
                <div class="item-cont" id="fdia">
                  <input class="small" type="text" min="1" max="31" name="ddia" required="required" placeholder="Dia" value=""/>
                  <span class="icon-place"></span></div>
              </div></td>
            <td><div class="element-number">
                <label class="title"><span class="required">*Mês</span></label>
                <div class="item-cont" id="fmes">
                  <input class="small" type="text" min="1" max="12" name="dmes" required="required" placeholder="Mês" value=""/>
                  <span class="icon-place"></span></div>
              </div></td>
            <td><div class="element-number">
                <label class="title"><span class="required">*Ano</span></label>
                <div class="item-cont" id="fano">
                  <input class="small" type="text" min="1900" max="2016" name="dano" required="required" placeholder="Ano" value=""/>
                  <span class="icon-place"></span></div>
              </div></td>
        </table>
        <div class="element-separator">
          <hr>
          <h3 class="section-break-title">Sexo</h3>
        </div>
        <div class="element-radio">
          <label class="title"><span class="required"></span></label>
          <div class="column column2">
            <label>
              <input type="radio" name="sexo" value="Masculino" required="required"/>
              <span>Masculino</span></label>
          </div>
          <span class="clearfix"></span>
          <div class="column column2">
            <label>
              <input type="radio" name="sexo" value="Feminino" required="required"/>
              <span>Feminino</span></label>
          </div>
          <span class="clearfix"></span> </div>
        <div class="element-separator">
          <hr>
          <h3 class="section-break-title">Canal do Youtube</h3>
        </div>
        <div class="element-url">
          <label class="title"></label>
          <div class="item-cont">
            <input class="large" type="url" name="linkch"  placeholder="https://youtube.com/user/pewdiepie"/>
            <span class="icon-place"></span></div>
        </div>
        <div class="submit">
          <input type="submit" value="Submit"/>
        </div>
      </form>
    </div>
  </div>
  <div class="modal fade" id="recsenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Recuperar senha</h4>
        </div>
        <div class="modal-body">
          <form class="formoid-default-red" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
            <div class="element-input">
              <label class="title">Apelido<span class="required">*</span></label>
              <input class="large" type="text" name="input" required="required"/>
            </div>
            <div class="element-email">
              <label class="title">Email<span class="required">*</span></label>
              <input class="large" type="email" name="email" value="" required="required"/>
            </div>
            <div class="submit">
              <input type="submit" value="Enviar"/>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<?php
	session_write_close();
?>