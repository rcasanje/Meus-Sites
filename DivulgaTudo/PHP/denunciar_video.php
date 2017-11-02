<html>
<head>
<script src="../Js/jquery.min.js"></script>
<script src="../Js/bootstrap.js"></script>
<script type="text/javascript" src="../Js/jquery.min_formoid.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/formoid-default-skyblue.css">
<?php
if(!isset($_SESSION)) session_start();
$id = $_GET['id'];
$link = $_GET['link'];
if(isset($_SESSION['User']['apelido'])){
	$nick = $_SESSION['User']['apelido'];
} else{
	$nick = "Faça login para fazer uma denuncia";
}
//printf("Id: %s<br> Link: %s", $id, $link);
?>
</head>
<body style=" background-color:#FFFFFF;">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <center>
        Denunciar vídeo
      </center>
    </h3>
  </div>
  <form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
    <div class="title">
      <h2></h2>
    </div>
    <div class="element-input">
      <label class="title">Nome<span class="required">*</span></label>
      <input class="large" type="text" name="input" required="required" value="<?php echo($nick);?>" readonly/>
    </div>
    <div class="element-input">
      <label class="title">Link<span class="required">*</span></label>
      <input class="large" type="text" name="input1" required="required" value="<?php echo("http://youtube.com/watch?v=".$link);?>" readonly/>
    </div>
    <div class="element-select">
      <label class="title">Motivo<span class="required">*</span></label>
      <div class="large"><span>
        <select name="select" required>
          <option value="Conteúdo Sexual">Conteúdo Sexual</option>
          <option value="Conteúdo violento ou repulsivo">Conteúdo violento ou repulsivo</option>
          <option value="Atos perigosos">Atos perigosos</option>
          <option value="Abuso infantil">Abuso infantil</option>
          <option value="Spam ou enganoso">Spam ou enganoso</option>
        </select>
        <i></i></span></div>
    </div>
    <div class="element-textarea">
      <label class="title">Motivo</label>
      <textarea class="medium" name="textarea" cols="20" rows="5" ></textarea>
    </div>
    <div class="element-input">
      <label class="title"><?php include ("captcha.php");?><span class="required">*</span></label>
      <input class="large" type="text" name="input2" required="required"/>
    </div>
    <div class="submit">
      <input type="submit" value="Enviar"/>
      <input type="reset" value="Resetar"/>
    </div>
  </form>
</div>
</body>
</html>