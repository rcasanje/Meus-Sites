<?php
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Home</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body id="tribes">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container" id="conteudo">
		<?php
			if(!isset($_GET['tribe'])){
		?>
		<div class="row">
			<div class="col-md-3">
				<div id="tribe-header" align="center">
					<img src="images/tribes/Visigoths.png" width="100" height="100">
				</div>
				<div id="tribe-body" align="center">
					<h4>Visigoths</h4>
					<p>The Goths of the West</p>
				</div>
				<div id="tribe-footer" align="center">
					<button class="btn btn-outline-warning btn-block">View Units</button>
				</div>
			</div>
			<div class="col-md-3">
				<div id="tribe-header" align="center">
					<img src="images/tribes/Basques.png" width="100" height="100">
				</div>
				<div id="tribe-body" align="center">
					<h4>Basques</h4>
					<p>The Unconquerables</p>
				</div>
				<div id="tribe-footer" align="center">
					<button class="btn btn-outline-warning btn-block">View Units</button>
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
		</div>
		<?php 
			} else{
				if($_GET['tribe'] == 'Visigoths'){
		?>
		<h1 align="center"><img src="images/tribes/Visigoths.png" width="100" height="100"></h1>
		<h1 align="center">The Visigoths</h1>
		<h4 align="center">Leader: King Theoderic II</h4>
		<h4 align="center">Capital: Burdigala</h4>
		<?php
				}
			}
		?>
	</div>
</body>
</html>