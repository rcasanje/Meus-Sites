<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		if(!isset($_SESSION)) session_start();
		if(!isset($_SESSION['Admin'])){
			header("Location: administrador-acesso.php");
		} else if($_SESSION['Admin']['Level'] == 0){
			$_SESSION['Admin']['Erro'] = 10;
			header("Location: errorpage-admin.php");
		} else{
			$nome_user = $_SESSION['Admin']['Nome'];
			//$nome_user = "Casanje";
		}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gentelella Alela! | </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<?php include("php/barra-de-menu-ADMIN.php"); ?>
				</div>
			</div>
			<div class="top_nav">
				<?php include("php/barra-de-menu-top-ADMIN.php"); ?>
			</div>
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<div class="pull-right">
					<?php include("php/rodape-ADMIN.php"); ?>
				</div>
				<div class="clearfix"></div>
			</footer>
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/fastclick.js"></script>
	<script src="js/nprogress.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script> -->
	<script src="js/custom.min.js"></script>
</body>

</html>