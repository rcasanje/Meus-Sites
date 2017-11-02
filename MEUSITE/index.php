<html>
<head>
<meta charset="utf-8">
<title>Casanje portfólio :: Início</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/morris.css" rel="stylesheet">
<link href="css/custom.min.css" rel="stylesheet">
</head>
<body>
 	<div class="jumbotron" id="inicio">
 		<div class="container">
			<h1>RAFAEL CASANJE</h1>
			<p>Web Developer</p>
		</div>
	</div>
	<header id="menufixed">
		<?php //include("php/barra-de-menu.php"); ?>
	</header>
	<div class="container">
		<div id="sobre" align="center">
			<div id="c_sobre">
				<h3>SOBRE MIM</h3>
				<p>RAFAEL CASANJE – WEB DEVELOPER & DESKTOP DEVELOPER</p>
				<p>Estudante de informática, que gosta de aprender tudo sobre a área de atuação e ser programador pleno em Java, C# e PHP para oferecer diversos tipos de ferramentas para os usuários de várias áreas de trabalho</p>
				<h3>"Desejo expandir meus conhecimentos diariamente para conquistar clarividencia das minha habilidades"</h3>
				<a href="upload/archives/Curriculo - Full.docx" class="btn btn-default btn-lg">Ver currículo completo</a>
			</div>
		</div>
		<div id="habilidades" align="center" style="width: 100%">
			<h3>HABILIDADES</h3>
			<h4>Eu sou muito bom nessas necessidades técnicas</h4>
			<div class="row" id="c_habilidades">
				<div class="col-xs-6 col-md-2">
					<a href="#">HTML5 + CSS (LESS/SCSS)</a>
					<div id="html" style="width: 100%;"></div>
				</div>
				<div class="col-xs-6 col-md-2">
					<a href="#">PHP</a>
					<div id="PHP" style="width: 100%;"></div>
				</div>
				<div class="col-xs-6 col-md-2">
					<a href="#">MySQL</a>
					<div id="MySQL" style="width: 100%;"></div>
				</div>
				<div class="col-xs-6 col-md-2">
					<a href="#">Javascript/jQuery</a>
					<div id="JavaWeb" style="width: 100%;"></div>
				</div>
				<div class="col-xs-6 col-md-2">
					<a href="#">Java</a>
					<div id="Java" style="width: 100%;"></div>
				</div>
				<div class="col-xs-6 col-md-2">
					<a href="#">VB .Net</a>
					<div id="VB" style="width: 100%;"></div>
				</div>
			</div>
		</div>
		<div id="educacao" align="center">
			<h3>EDUCAÇÃO</h3>
			<div class="row">
				<div class="col-md-6">
					<h4>Formação</h4>
					<p><b>Escola Técnica do Rio de Janeiro</b><br>jan/2015 - dez/2017<br>Cursando informática</p>
					<p><b>Sistema Elite de Ensino</b><br>jan/2010 - dez/2014<br>Ensino Fundamental II
				</div>
				<div class="col-md-6">
					<h4>Profissional</h4>
					<p><b>Q-Cursos online</b><br>ago/2014 - jan/2016<br>PHP<br>Java<br>HTML5<br>Action Script</p>
					<p><b>SEVEN (Red Zero)</b><br>set/2013 - jan/2015<br>Photoshop CC<br>Flash CC<br>Maya 2014</p>
					<p><b>Cursos24Horas</b><br>jun/2012<br>Webmaster<br>Flash</p>
				</div>
			</div>
		</div>
		<div id="portfolio" align="center">
			<h3>PORTFÓLIO</h3>
			<h4>Mostruário dos meus últimos trabalhos</h4>
			<div class="row" id="c_portfolio">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
					<img src="images/sala-de-exercicios.jpg" alt="...">
					<div class="caption">
						<h3>Sala de exercícios</h3>
						<p>Um site que reúne exercícios em geral <br><font size="-1">Tecnologias utilzadas: HTML, PHP, javascript, jQuery</font></p>
						<p><a href="http://saladeexercicios.com.br" class="btn btn-primary" role="button" target="_blank">Acessar site</a>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div id="contatos" align="center">
			<div id="c_contatos">
				<h3>CONTATO</h3>
				<p><span class="glyphicon glyphicon-envelope"></span> rafael.casanje@gmail.com<br></p>
				<p><span class="glyphicon glyphicon-user"></span> (21) 99327-2992</p>
				<p><span class="glyphicon glyphicon-home"></span> Estrada Professor Daltro Santos, 445 - Campo Grande, Rio de Janeiro</p>
			</div>
		</div>
	</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/raphael.min.js"></script>
<script>
	new Morris.Donut({
	  element: 'html',
	  data: [
		{ label: 'Aprendido', value: 73 },
		{ label: 'Para aprender', value: 27 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	
	new Morris.Donut({
	  element: 'PHP',
	  data: [
		{ label: 'Aprendido', value: 53 },
		{ label: 'Para aprender', value: 47 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	
	new Morris.Donut({
	  element: 'MySQL',
	  data: [
		{ label: 'Aprendido', value: 40 },
		{ label: 'Para aprender', value: 60 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	
	new Morris.Donut({
	  element: 'JavaWeb',
	  data: [
		{ label: 'Aprendido', value: 20 },
		{ label: 'Para aprender', value: 80 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	
	new Morris.Donut({
	  element: 'Java',
	  data: [
		{ label: 'Aprendido', value: 10 },
		{ label: 'Para aprender', value: 90 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	
	new Morris.Donut({
	  element: 'VB',
	  data: [
		{ label: 'Aprendido', value: 30 },
		{ label: 'Para aprender', value: 70 }
	  ],
	  xkey: 'year',
	  ykeys: ['value'],
	  labels: ['Value']
	});
	var offset = $('#menufixed').offset().top;
	var $meuMenu = $('#menufixed'); // guardar o elemento na memoria para melhorar performance
	$(document).on('scroll', function () {
		if (offset <= $(window).scrollTop()) {
			$meuMenu.addClass('fixar');
		} else {
			$meuMenu.removeClass('fixar');
		}
	});
	
	 
</script>
</html>
