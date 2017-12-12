		<section class="col-md-offset-1 col-md-10 footer">
		 <h6>  Copyright &copy;	All Rights Reserved Genos Studios</h6>	
		</section>
			<script src="<?php echo $js;?>bootstrap.min.js"></script>
			<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="killercarousel.js"></script>
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
            

$(window).ready(function() {
	
	setInterval(function(){
			if ($(".kc-wrap").children().length > 1) { // Or just `if (element.childNodes.length)`
    // It has at least one
			$(".kc-wrap").children("div:last").remove();
}
		
		},1   );


});
        </script>
		</body>
	</html>