<!doctype html>
<html>
<head>
<?php
include("php/verificar.php");
if(!isset($_SESSION)) session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Montagem :: Sala de Exercícios</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php include("php/barra_de_menu.php"); ?>
<div class="container">
  <form action="" method="post">
    <div class="row" style="margin-bottom:10px;">
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Matéria</span>
          <select class="form-control" name="materia" required>
            <option value="">Selecione</option>
            <option value="portugues">Português</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon" id="basic-addon3">Objetiva</span>
          <div style="border:1px solid;">
            <input type="radio" name="objetiva" required aria-label="Sim" value="1" style="margin:9px;">
            Sim
            </input>
            <input type="radio" name="objetiva" required aria-label="Não" value="0" style="margin-left:10px;">
            Não
            </input>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Qntd. questões</span>
          <select class="form-control" name="quantidade" required>
            <option value="">Selecione</option>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
            <option value="35">35</option>
            <option value="40">40</option>
            <option value="45">45</option>
            <option value="50">50</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="input-group"> <span class="input-group-addon" id="basic-addon1">Tag</span>
          <input class="form-control" type="text" name="tag">
        </div>
      </div>
    </div>
    <button class="btn btn-warning" type="submit" name="montar">Enviar</button>
    <button class="btn btn-warning" type="reset" name="reset" >Limpar</button>
  </form>
  <div class="row" style="margin-top:10px;">
    <div class="col-sm-6">
      <?php
		include("php/conexao_publicacoes.php");
		
		if(isset($_POST['montar'])){
			$materia = $_POST['materia'];
			$objetiva = $_POST['objetiva'];
			$qntd = $_POST['quantidade'];
			$tag = $_POST['tag'];
			
			/*echo($materia);
			echo("<br>".$objetiva);
			echo("<br>".$qntd);
			echo("<br>".$tag);*/
			
			if($_POST['tag'] == ""){
				$montarq = "SELECT id, questao, gabarito FROM exercicios WHERE materia='$materia' AND objetiva='$objetiva' ORDER BY RAND() LIMIT 0, $qntd";
			} else{
				$montarq = "SELECT id, questao, gabarito FROM exercicios WHERE materia='$materia' AND objetiva='$objetiva' AND tags='$tag' LIMIT 0, $qntd";
			}
			
			$array_id = array();
			$array_gabarito = array();
			
			printf('<div class="well">');
			if($montagem = mysqli_query($conn, $montarq)){
				while($pmontagem = mysqli_fetch_array($montagem, MYSQL_ASSOC)){
					$questao = nl2br($pmontagem['questao']);
					printf('
							<div style="margin-bottom:10px;">
								<p>%s</p>
							</div>', $questao);
					array_push($array_id, $pmontagem['id']);
					array_push($array_gabarito, $pmontagem['gabarito']);
				}
				//var_dump($array_id);
				//var_dump($array_gabarito);
			}
			printf('</div>');
		} else{
			printf('<div class="alert alert-info" role="alert">Use os filtros acima para montar uma prova ou uma folha de exercícios.</div>');
		}
?>
    </div>
    <div class="col-sm-6">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
		
		if(isset($_POST['montar'])){
			for($i=0; $i<$qntd; $i++){
				printf('
				<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading%s">
				  <h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse%s" aria-expanded="false" aria-controls="collapse%s">
					  Gabarito questão %s
					</a>
				  </h4>
				</div>
				<div id="collapse%s" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				  <div class="panel-body">%s</div>
				</div>
			  </div>', $array_id[$i], $array_id[$i], $array_id[$i], $i+1, $array_id[$i], $array_gabarito[$i]);
			}
		}
	?>
      </div>
    </div>
  </div>
</div>
</div>
<?php include("php/rodape.php"); ?>
</body>
</html>