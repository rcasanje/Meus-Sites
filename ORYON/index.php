<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/default.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<?php include("php/barra-de-menu.php") ?>
	</header>
	<div class="container" id="container">
		<div class="row">
			<div class="col-xs-9">
				<div id="slide">
					<div class="jumbotron">
						<h1>Slide de notícias</h1>
						<p>Descrição de noticia</p>
						<p><a class="btn btn-primary btn-lg" href="#" role="button">Sobre a noticia</a>
						</p>
					</div>
				</div>
				<div id="campeonatosativos">
					<table>
						<tr>
							<th>Nome do campeonato</th>
							<th>Descrição</th>
						</tr>
						<tr>
							<td>Campeonato Bronze</td>
							<td>Descrição 1</td>
						</tr>
						<tr>
							<td>Campeonato Prata</td>
							<td>Descrição 2</td>
						</tr>
						<tr>
							<td>Campeonato Ouro</td>
							<td>Descrição 3</td>
						</tr>
						<tr>
							<td>Campeonato Platina</td>
							<td>Descrição 4</td>
						</tr>
						<tr>
							<td>Campeonato Diamante</td>
							<td>Descrição 5</td>
						</tr>
					</table>
				</div>
				<div id="resto">
					<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dictum sit amet tortor in sodales. Donec blandit sem at tristique feugiat. Aliquam ullamcorper tincidunt diam, id fringilla est tempus feugiat. Cras varius blandit fermentum. Nulla facilisi. Sed magna diam, tempor vel tincidunt ut, venenatis vel eros. Cras egestas lorem tortor, eu pellentesque orci auctor ut. Nulla dignissim, nunc id tincidunt gravida, ex quam congue justo, id tristique eros augue ut mi. Sed ac molestie lorem, id condimentum sapien. Sed id sapien eget sapien vestibulum auctor vel ut ex.</p>
					<p align="justify">Nunc vel fermentum augue. Quisque dapibus dapibus nisi. Maecenas tortor ipsum, tristique ac sagittis eu, suscipit vel orci. Sed faucibus urna non mattis sodales. Aenean eget nulla at mi vestibulum luctus. Maecenas finibus non ligula id molestie. Vestibulum ultrices erat nec condimentum rutrum. Fusce efficitur felis non varius aliquam. Suspendisse ac nisi tincidunt, elementum nunc sit amet, venenatis leo. Quisque semper turpis a erat dignissim pharetra. Curabitur tellus quam, tempus eget sodales nec, ultrices non libero. Aenean quis erat mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In vestibulum massa faucibus neque sodales semper. Pellentesque imperdiet dictum turpis quis lobortis.</p>
					<p align="justify">Integer feugiat dictum nulla semper vulputate. Maecenas vitae ante eget massa sodales placerat. Maecenas ultricies odio non felis ullamcorper ultrices. Integer scelerisque aliquet faucibus. Ut sit amet mattis sapien, nec pharetra odio. Nunc scelerisque vel ex vitae gravida. Aenean lacus metus, scelerisque ac bibendum ac, malesuada id nulla. Aenean metus sem, malesuada ut urna a, tristique porta lorem.</p>
				</div>
			</div>
			<div class="col-xs-3">
				<div id="rankplayer">
					<table>
						<tr>
							<th>Nome do invocador</th>
							<th>Elo</th>
						</tr>
						<tr>
							<td>Player 1</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Player 2</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Player 3</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Player 4</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Player 5</td>
							<td>Unranked</td>
						</tr>
					</table>
				</div>
				<div id="ranktime">
					<table>
						<tr>
							<th>Nome do time</th>
							<th>Elo</th>
						</tr>
						<tr>
							<td>Time 1</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Time 2</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Time 3</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Time 4</td>
							<td>Unranked</td>
						</tr>
						<tr>
							<td>Time 5</td>
							<td>Unranked</td>
						</tr>
					</table>
				</div>
				<div id="patrocinadores">
					<h4>Patrocinadores</h4>
					<div class="divider divider-orange"></div>
					<img src="images/little kitty.jpg" class="autosizeimagem">
				</div>
			</div>
		</div>
	</div>
	<div id="rodape"><?php include("php/barra-de-rodape.php"); ?></div>
</body>

</html>