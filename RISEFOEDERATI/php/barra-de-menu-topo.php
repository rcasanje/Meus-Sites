<?php
$item1 = "";
$item2 = "";
$item3 = "";
$item4 = "";
$item5 = "";
$item6 = "";

$apage = $_SERVER['REQUEST_URI'];

if(strpos($apage, "index.php")){
	$item1 = "active";
} else if (strpos($apage, "tribes.php")){
	$item2 = "active";
} else if (strpos($apage, "gallery.php")){
	$item3 = "active";
} else if (strpos($apage, "download.php")){
	$item4 = "active";
} else if (strpos($apage, "history.php")){
	$item5 = "active";
}
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark ">
	<div class="container">
		<a class="navbar-brand" href="#">Rise of the Foederati</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?=$item1; ?>">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item <?=$item2; ?>">
					<a class="nav-link" href="tribes.php">Tribes</a>
				</li>
				<li class="nav-item <?=$item3; ?>">
					<a class="nav-link" href="gallery.php">Gallery</a>
				</li>
				<li class="nav-item <?=$item4; ?>">
					<a class="nav-link" href="download.php">Download</a>
				</li>
				<li class="nav-item <?=$item5; ?>">
					<a class="nav-link" href="history.php">History</a>
				</li>
				<li class="nav-item <?=$item6; ?>">
					<a class="nav-link" href="https://riseofthefoederati.proboards.com/">Forum</a>
				</li>
				<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li> -->
			</ul>
		</div>
	</div>
</nav>

<style>
	.active{
		background-color: goldenrod;
	}
	.nav-item a:hover{
		background-color: goldenrod;
	}
</style>