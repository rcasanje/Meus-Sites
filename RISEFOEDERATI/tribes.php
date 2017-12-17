<?php
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Home</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/fa-solid.css">
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
				<div id="tribe">
					<div id="tribe-header" align="center">
						<img src="images/tribes/Visigoths.png" width="100" height="100">
					</div>
					<div id="tribe-body" align="center">
						<h4>Visigoths</h4>
						<p>The Goths of the West</p>
					</div>
					<div id="tribe-footer" align="center">
						<a class="btn btn-outline-warning btn-block" href="?tribe=Visigoths">View Units</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div id="tribe">
					<div id="tribe-header" align="center">
						<img src="images/tribes/Basques.png" width="100" height="100">
					</div>
					<div id="tribe-body" align="center">
						<h4>Basques</h4>
						<p>The Unconquerables</p>
					</div>
					<div id="tribe-footer" align="center">
						<a class="btn btn-outline-warning btn-block" href="?tribe=Basques">View Units</a>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
		</div>
		<?php 
			} else{
				if($_GET['tribe'] == 'Visigoths'){
		?>
		
		<h5><a href="tribes.php"><i class="fas fa-1x fa-angle-left"></i> Back</a></h4>
		<div id="scroll">
			<h1><img src="images/tribes/Visigoths.png" width="100" height="100"></h1>
			<h1>The Visigoths</h1>
			<h4>Leader: King Theoderic II</h4>
			<h4>Capital: Burdigala</h4>
			<p>The Visigoths are one of the two tribes featured in Rise of the Foederati's free-to-play demo. It compromises the Foederati tribe settled in the province of Gallia Aquitania, with their capital set in Burdigala (modern city of Bordeaux).</p>
			<p>Considered one of the most successful and proeminent allies (and enemies, whenever suitable) of the Western Roman Empire during the Migration Period, the Visigoths migrated from Scandinavia, possibly from Gotland, and not only defeated the Romans in battle, but also sacked rome in 410, under the leadership of the former king Alaric I. Due to their successful adaptation of warfare tactics, and a good mix between Germanic and Roman tactics, it is no wonder that their military prowess was one of the key factors in archieving relative stability in the region they've settled.</p>
			<h2>History</h2>
			<p>The term "Visigoths" refers to the branch of nomadic tribes referred collectively as "Goths". The prefix "Vesi" appeared when the Gothic king Alaric I amassed a federate army (foederati) in the eastern Balkans, with warriors of different origins. More ancient Gothic tribes, such as the Tervingi, the Gretheungi and even other non-gothic warriors joined the great Gothic War in 376 through this army confederation. "Vesi" means 'Visigoth' in Latin, and ever since stayed as the official nomenclature for the tribe. Since that year, the Visigoths ran multiple successful military campaigns and raids, managing to sack Athens in 395 and even Rome itself in 410, and brought raids in the regions between both Eastern and Western Roman Empire. The Romans managed to make relative peace with the Visigoths by handing them territories in the region, which in turn would later on be occupied by the Ostrogoths. With the riches from plundering the largest, richest city of the world, the Visigoths had everything they ever needed to settle.</p>
			<p>The actual settlement in southwestern modern France started when the Western Roman Empire enlisted the help of king Alaric I to drive away the Suebi, Alans and Vandals from Hispania. In exchange for driving them away, in 418 the Western Roman Emperor, Honorius, promised them the region of Gallia Aquitania. Their campaign was a military success, but the tribes were not eliminated; the Suebi were driven further away to modern Portugal, the Alans were partially subjulgated and most of them escaped with the Vandals to northern Africa (the ones that stayed remained as foederati of the Roman Empire), but a betrayal and a further massacre of Visigoths under Roman command led to the Sack of Rome. After the settling begun, the great Battle of the Chalóns showed the military importance of the Visigoths; their alliance with the Roman Empire, though frail and most of times more of a pact of mutual help because of the Empire's need of foederati troops for military purposes, proved to be crucial to the hollow, phyrric victory against the Huns led by Attila. With their capital in Burdigala, the Visigoths now aim to solidify their presence in the region, by attempting to quell the Basques, who occupy northern Hispania, and have dominated the region for millenia.</p>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<h2>Map</h2>
				<img src="images/tribes/VisigothsMap.png" width="100%">
			</div>
			<div class="col-xs-12 col-md-6">
				<h2>Video history</h2>
				<iframe width="100%" height="70%" src="https://www.youtube.com/embed/Pu8kFerpJx8" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
		<h2>Warfare</h2>
		<p>Visigoths are great medium infantry warriors, and are balanced in most aspects of war, except when it comes to deploying true specialists. This means a Visigoth light infantryman, for instance, is a poor skirmisher, and brings less to the table than he should in his position, but at the same time holds the line more efficiently. They also lack true Heavy cavalry units; shock duty is given to the Medium alternatives, which means they are good in a pinch, but are crushed by other specialists. Although they have different foot range units, none of them have discerning or great advantages over a standard range unit, so they're at their best mediocre in their roles. The best way a Visigoth warrior has to beat their enemy is to use their balance to their side; they are the one of the only tribes in western Europe to boast horse archers, for instance (if only mediocre in this aspect).</p>
		<p>A Visigoth warband leader is most efficient as a backup fighter, and a warfare organizer; though they are well-versed in battle, their best contribution to their group is to protect the backline and command their troops from there, engaging only when strictly necessary.</p>
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<div id="infantary">
					<div class="row" id="infantary-header">
						<div class="col-6">
							<img src="images/tribes/chars/Visigothchar2.png" alt="Card image cap" height="165">
						</div>
						<div class="col-6 align-self-center">
							<label>Hundafaths<br>Captain<br>Visigoths<br><br><img src="images/tribes/Visigoths.png" width="50" height="50"></label>
						</div>
					</div>
					<div id="infantary-body">
						<hr>
						<p>Main Weapon: Long Blade<br>
							Offhand: Medium Shield<br>
							Head Armor: Medium<br>
							Body Armor: Medium<br>
							Unit Class: Medium Infantry<br>
							Unit Type: Authority</p>
						<hr>
						<p>The Hundafathai of the Visigoths, similar in status to a Roman centurion, were given their title (meaning captain) after the Battle of Chalons. A Visigoth captain was not only a veteran soldier, but also often a man who had proved himself in the most important battle of the time. Contrary to the Veterans, Captains earned official status as leaders through the Visigoth royalty and the Westerm Roman Empire.</p>
					</div>
					<div id="infantary-footer">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div id="infantary">
					<div class="row" id="infantary-header">
						<div class="col-6">
							<img src="images/tribes/chars/Visigothchar1.png" alt="Card image cap" height="165">
						</div>
						<div class="col-6 align-self-center">
							<label>Bogandrauhts<br>Bowman<br>Visigoths<br><br><img src="images/tribes/Visigoths.png" width="50" height="50"></label>
						</div>
					</div>
					<div id="infantary-body">
						<hr>
						<p>Main Weapon: Short Bow<br>
							Secondary Weapon: Dagger<br>
							Head Armor: None<br>
							Body Armor: Light<br>
							Unit Class: Ranged Infantry<br>
							Unit Type: Ordinary</p>
						<hr>
						<p>Visigoths recognized the worth of bows in warfare increasingly after contact with other cultures. The Bogandrauhtai were the Visigoth bowmen, usually either younger warriors who had yet to master melee combat, or prisoners of war given the chance to prove heir worth in battle to earn their freedom. Most bowmen were not professional archers, instead relying on basic skills to provide ranged support for Visigoth warbands.</p>
					</div>
					<div id="infantary-footer">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div id="infantary">
					<div class="row" id="infantary-header">
						<div class="col-6">
							<img src="images/tribes/chars/Visigothchar4.png" alt="Card image cap" height="165">
						</div>
						<div class="col-6 align-self-center">
							<label>Bogandrauhts<br>Bowman<br>Visigoths<br><br><img src="images/tribes/Visigoths.png" width="50" height="50"></label>
						</div>
					</div>
					<div id="infantary-body">
						<hr>
						<p>Main Weapon: Spear<br>
							Offhand: Medium Shield<br>
							Head Armor: Medium<br>
							Body Armor: Light<br>
							Unit Class: Light Infantry<br>
							Unit Type: Ordinary</p>
						<hr>
						<p>Visigoth Faragumans were equipped with simple helmets, spears, and shields. Given the nature of the culture and the times, very few Faragumans were unblooded before their first battle. Their (usually) humble origins, however, meant they only had enough wealth for the most basic equipment.<br><br><br><br></p>
					</div>
					<div id="infantary-footer">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div id="infantary">
					<div class="row" id="infantary-header">
						<div class="col-6">
							<img src="images/tribes/chars/Visigothchar3.png" alt="Card image cap" height="165">
						</div>
						<div class="col-6 align-self-center">
							<label>Bogandrauhts<br>Bowman<br>Visigoths<br><br><img src="images/tribes/Visigoths.png" width="50" height="50"></label>
						</div>
					</div>
					<div id="infantary-body">
						<hr>
						<p>Main Weapon: Light Spear<br>
							Head Armor: Medium<br>
							Body Armor: Light<br>
							Unit Class: Light Cavalry<br>
							Unit Type: Ordinary</p>
						<hr>
						<p>All Visigothic Aihwudrahtai, or horsemen, were trained for their supportive capability; whether that be harassing weak formations, charging vulnerable targets, chasing routing foes or joining armored cavalry. Their ability to perform adequately in nearly any role is their biggest asset, becoming quickly disseminated in warbands as a solid choice for mounted warriors.</p>
					</div>
					<div id="infantary-footer">
					</div>
				</div>
			</div>
		</div>
		<?php
				}
			}
		?>
	</div>
</body>
</html>