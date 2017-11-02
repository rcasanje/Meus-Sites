<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION['Staff'])) {
		header( "Location: ../administrador-acesso.php" );
	} else if ($_SESSION['Staff']['Level'] <= 0 ) {
		$_SESSION['User']['Erro'] = 10;
		header( "Location: ../errorpage-admin.php" );
	} else {
		$nome_user = $_SESSION['Staff']['Nome'];
		$codigoU = $_SESSION['Staff']['CodigoA'];
		$permissao = $_SESSION['Staff']['Level'];
	}
	
	include("../php/funcoes.php");
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/custom.min.css" rel="stylesheet">
	<link href="../css/fullcalendar.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<?php include("../php/barra-de-menu-ADMIN.php"); ?>
				</div>
			</div>
			<div class="top_nav">
				<?php include("../php/barra-de-menu-top-ADMIN.php"); ?>
			</div>
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Agenda</h3>
						</div>
					</div>
							<br><br><br>
					<div id="calendar"></div>
				</div>
			</div>
			<footer>
				<div class="pull-right">
					<?php include("../php/rodape-ADMIN.php"); ?>
				</div>
				<div class="clearfix"></div>
			</footer>
		</div>
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/custom.min.js"></script>
	<script src="../js/moment.min.js"></script>
	<script src="../js/fullcalendar.min.js"></script>
	<script src="../js/locale-all.js"></script>
	<script>
		$('#calendar').fullCalendar({
        	locale: 'br',
			dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
			monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			dayClick: function(date, hour) {
				//date.format() = retorna AAAA-MM-DD
				//$(this).css('background-color', 'red');
    		},
			eventClick: function(calEvent, jsEvent, view) {
				//calEvent.title = nome do evento
				//$(this).css('border-color', 'red');
			},
			events: [
				{
					id:0,
					title: 'All Day Event',
					start: '2017-07-26',
					description: 'Teste',
					end: '',
					url: '',
					editable: true,
					startEditable: true,
					
				}
			],
			eventRender: function(event, element) {
				element.tooltip({
					content: event.description
				});
			}
    	});
	</script>
</body>
</html>