<?php
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Rise of the Foederati :: Gallery</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/fa-solid.css">
	<link rel="stylesheet" href="css/gridder.min.css">
	<link rel="stylesheet" href="css/risefoederati.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/gridder.min.js"></script>
</head>

<body id="gallery">
	<header>
		<?php include("php/barra-de-menu-topo.php"); ?>
	</header>
	<div class="container-fluid">
		<div style="margin: 20px;">
			<ul class="gridder">
				<li class="gridder-list" data-griddercontent="#content1">
					<img src="images/gallery (1).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content2">
					<img src="images/gallery (2).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content3">
					<img src="images/gallery (3).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content4">
					<img src="images/gallery (4).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content5">
					<img src="images/gallery (5).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content6">
					<img src="images/gallery (6).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content7">
					<img src="images/gallery (7).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content8">
					<img src="images/gallery (8).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content9">
					<img src="images/gallery (9).png" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content10">
					<img src="https://img.youtube.com/vi/3xuYVckMpSI/hqdefault.jpg" width="100%" height="200">
				</li>
				<li class="gridder-list" data-griddercontent="#content11">
					<img src="https://img.youtube.com/vi/ivj2K-e4FkA/hqdefault.jpg" width="100%" height="200">
				</li>

				<!-- You can also load html/ajax pages by replacing the #ID with a URL
				<li class="gridder-list" data-griddercontent="https://www.youtube.com/watch?v=3xuYVckMpSI">
					<img src="images/image4.png" width="100%" height="100">
				</li> -->
			</ul>

			<!-- Gridder content -->
			<div id="content1" class="gridder-content"> <img src="images/gallery (1).png" /> </div>
			<div id="content2" class="gridder-content"> <img src="images/gallery (2).png" /> </div>
			<div id="content3" class="gridder-content"> <img src="images/gallery (3).png" /> </div>
			<div id="content4" class="gridder-content"> <img src="images/gallery (4).png" /> </div>
			<div id="content5" class="gridder-content"> <img src="images/gallery (5).png" /> </div>
			<div id="content6" class="gridder-content"> <img src="images/gallery (6).png" /> </div>
			<div id="content7" class="gridder-content"> <img src="images/gallery (7).png" /> </div>
			<div id="content8" class="gridder-content"> <img src="images/gallery (8).png" /> </div>
			<div id="content9" class="gridder-content"> <img src="images/gallery (9).png" /> </div>
			<div id="content10" class="gridder-content">
				<div align="center">
				<iframe width="70%" height="70%" src="https://www.youtube.com/embed/3xuYVckMpSI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>	
			</div>
			<div id="content11" class="gridder-content">
				<div align="center">
				<iframe width="70%" height="70%" src="https://www.youtube.com/embed/ivj2K-e4FkA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>

<script>
$(function() {

    // Call Gridder
    $('.gridder').gridderExpander({
        scroll: true,
        scrollOffset: 30,
        scrollTo: "panel",                  // panel or listitem
        animationSpeed: 400,
        animationEasing: "easeInOutExpo",
        showNav: true,                      // Show Navigation
        nextText: '<i class="fas fa-angle-right"></i>',
        prevText: '<i class="fas fa-angle-left"></i>',
        closeText: '<i class="fas fa-times"></i>',
        onStart: function(){
            //Gridder Inititialized
        },
        onContent: function(){
            //Gridder Content Loaded
        },
        onClosed: function(){
            //Gridder Closed
        }
    });

});
</script>