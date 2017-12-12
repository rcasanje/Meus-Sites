<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<section 	id="nav">
	<nav class="navbar navbar-default navbar-fixed-top centered col-md-offset-1 col-md-10">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Rise of the Foederati</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>		
        <li><a href="tribs.php">Tribes</a></li>
    
			  <li><a id="link" href="<?php if(isset($home)){ echo '#section2';} else { echo 'index.php'; } ?>">Gallery</a></li>
		  <li><a href="<?php   if(isset($home)){echo '#section5';} else { echo 'index.php'; } ?>">Download</a></li>
		 <li><a href="<?php if(isset($home)){echo '#section4';} else { echo 'index.php'; } ?>">The History</a></li>
		  <li><a href="<?php if(isset($home)){ echo '#section3' ; }else { echo 'index.php'; }  ?>">System</a></li>
        <li><a href="https://riseofthefoederati.proboards.com/">Forum</a></li>		
		
      </ul>
	  <ul class="nav navbar-nav navbar-right">
		 <li class="social" >
			<a href="http://www.facebook.com/riseofthefoederati"><img height="20" width="20" src="<?php echo $img ;?>social/facebook.png"</img></a>
			          	 </li>                                                                           
			 <li class="social" >	<a href="https://www.twitter.com/genos_studios"><img height="20" width="20" src="<?php echo $img ;?>social/twitter.png"</img></a>
			      	 </li>                                                                              
			 <li class="social" >	<a href="https://www.youtube.com/channel/UC4Ao-ECpPqIFiiIGHmpyGPg"><img height="20" width="20" src="<?php echo $img ;?>social/youtube.png"</img></a>
				 </li>  
			<li class="social" >	<a href="mailto:genosstudios@gmail.com"><img height="20" width="20" src="<?php echo $img ;?>social/gmail.png"</img></a>
				 </li>
		</ul>
     
    <!--  <ul class="nav navbar-nav navbar-right">
  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</section>