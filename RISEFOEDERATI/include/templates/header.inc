<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="<?php echo $css;?>bootstrap.min.css">
			
			<link rel="stylesheet" href="<?php echo $css;?>bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo $css;?>style.css">
	  <link href="killercarousel.css" type="text/css" rel="stylesheet" />
        	<link rel="stylesheet" href="<?php echo $css;?>style.css">

        <!-- Include KillerCarousel JavaScript -->
        <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="foederati,game,gaming,historical game">
                <!-- Various page styles. -->
       <title>Rise of the Foederati</title>

        <!-- Styles for the Carousel -->
        <style type = "text/css">

            /* CSS for images inside item wrapper */
            .kc-item img {
                position:absolute;
                pointer-events: none;   /* Make images non-selectable. */
                width:100%;             /* Make images expand to wrapper size (used in 2d modes). */
            }

        </style>
<link rel="shortcut icon" href=".\favicon.ico">

        <script type = "text/javascript">
            // Create the carousel.
            $(function() {
                $('.kc-wrap').KillerCarousel({
                    // Default natural width of carousel.
                    width: 800,
                    // Item spacing in 3d (has CSS3 3d) mode.
                    spacing3d: 120,
                    // Item spacing in 2d (no CSS3 3d) mode. 
                    spacing2d: 120,
                    showShadow: true,
                    showReflection: true,
                    // Looping mode.
                    infiniteLoop: true,
                    // Scale at 75% of parent element.
                    autoScale: 75
                });
            });
            
        
        </script>
        <style>

/* Smoke container */

#smoke {
	position:relative;
	
	margin-top:35%;
	margin-left:38%;
	z-index:3;
	

}

/* smoke balls */

#smoke span { 
  display: block;
	position: absolute;
	bottom: -35px; left: 50%; margin-left:-20px;
	left: -14px; opacity: 0;
	transform: scale(0.2);
}

/* Smoke animation */

@keyframes smokeL {
	0%   { transform: scale(0.2) translate(0, 0) }
	10%  { opacity: 1; transform: scale(0.2) translate(0, -5px) }
	100% { opacity: 0; transform: scale(0.8) translate(-20px, -130px) }
}

@keyframes smokeR {
	0%   { transform: scale(0.2) translate(0, 0) }
	10%  { opacity: 1; transform: scale(0.2) translate(0, -5px) }
	100% { opacity: 0; transform: scale(0.8) translate(20px, -130px) }
}

#smoke .s0 { animation: smokeL 10s 0s infinite }
#smoke .s1 { animation: smokeR 10s 1s infinite }
#smoke .s2 { animation: smokeL 10s 2s infinite }
#smoke .s3 { animation: smokeR 10s 3s infinite }
#smoke .s4 { animation: smokeL 10s 4s infinite }
#smoke .s5 { animation: smokeR 10s 5s infinite }
#smoke .s6 { animation: smokeL 10s 6s infinite }
#smoke .s7 { animation: smokeR 10s 7s infinite }
#smoke .s8 { animation: smokeL 10s 8s infinite }
#smoke .s9 { animation: smokeR 10s 9s infinite }
		</style>
		</head>
		<body>
			<div class="se-pre-con text-center">
              
				<div class="loading"> <h2> Loading</h2></div>
			  
			</div>
				
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
				<script src="<?php echo $js;?>jquery-1.11.3.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>


<script>	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>	
