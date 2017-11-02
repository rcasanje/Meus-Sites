<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/contato.css">
<script src="Js/jquery.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<title>Contato :: Design Autoral</title>
</head>

<body>
	<?php include("PHP/barra_de_menu.php"); ?>
	<div class="container well">
		<div id="form_ticket">
			<form action="" method="post">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">E-mail</span>
					<input type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1" required>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Assunto</span>
					<input type="text" class="form-control" placeholder="Assunto" aria-describedby="basic-addon1" required>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Motivo do contado</span>
					<select class="form-control" required>
						<option>Selecione</option>
						<option>Dúvida</option>
						<option>Feedback</option>
						<option>Geral</option>
						<option>Reclamação</option>
					</select>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Conteúdo</span>
					<textarea rows="3" required></textarea>
				</div>
			</form>
		</div>
		<div style="width: 49%; float: right">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et iaculis magna, non sagittis urna. Mauris in malesuada lorem, quis ultricies dui. Nam erat turpis, mollis eu cursus sit amet, posuere id erat. Cras ac consequat ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Cras commodo tincidunt posuere. Nunc eu condimentum enim. Maecenas interdum bibendum odio. Maecenas posuere aliquam sollicitudin. Integer in blandit augue. Pellentesque pharetra, lectus at ultrices gravida, libero eros efficitur tellus, vel pretium sem urna quis eros. Integer neque dui, mattis in tellus eu, scelerisque dapibus ligula. Donec et interdum velit.</p>
		</div>
	</div>
	<?php include("PHP/rodape.php"); ?>
</body>
</html>