<?php include 'init.inc';
?>
<section id="tribes" class="centered col-md-offset-1 col-md-10">
	<div class="row">
		<div class="col-sm-4 text-center">
		<!-- start card -->
			<div class="card ">
			   	<div class="tribe-info ">
					
						<img src="<?php echo $img;?>tribes/Visigoths.png" width='50' height="50">
						<h3>Visigoths</h3>
						<h5>The Goths of the West</h5>
				</div>
				<div class="more"><a style="" href="Visigoths.php"> <h4>View Units</h4></a> </div>
			</div>
		 <!-- end card -->	
		</div>
		<div class="col-sm-4 text-center">
			<!-- start card -->
			<div class="card ">
			   	<div class="tribe-info ">
					
						<img src="<?php echo $img;?>tribes/Basques.png" width='50' height="50">
						<h3>Basques</h3>
							<h5>The Unconquerables</h5>
				</div>
				<div class="more"><a style="" href="Basque.php"> <h4>View Units</h4></a> </div>
			</div>
		 <!-- end card -->	
			
		</div>
		
		 <!-- end card -->	
			
		</div>
	</div>
</section>
<?php
include $tmp."footer.inc";
?>