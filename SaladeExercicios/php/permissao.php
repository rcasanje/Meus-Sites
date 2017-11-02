<?php 
	header("Location: google.com.br");
	$erro = false;
	
	if(!isset($_SESSION)){
		session_start();
		if($_SESSION['User']['permissao'] < 10){
			$erro = true;
		} else {
			header("Location ../Postagens.php");
		}
	} else {
		if($_SESSION['User']['permissao'] < 10){
			$erro = true;
		} else {
			header("Location ../Postagens.php");
		}
	}
	
	if($erro == true){
		printf('
		<div class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal title</h4>
			  </div>
			  <div class="modal-body">
				<p>One fine body&hellip;</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->');
	}
?>