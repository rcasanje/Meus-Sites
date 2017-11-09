<?php
include("../php/conexoes/user-access.php");

if(!isset($_SESSION)) session_start();

$nome = $_SESSION['User']['Nome'];
$apelido = $_SESSION['User']['Login'];
$dadosCad = [];
$i = 0;
$dados = "SELECT cep_user, endereco_user, cidade_user FROM usuarios WHERE nome_user='$nome' and login_user='$apelido'";
if($query = mysqli_query($conn, $dados)){
	$info = mysqli_fetch_row($query);
} else{
	printf("Houve algum erro. Erro com a descrição: %s", mysqli_error($conn));
}

session_write_close();
//mysqli_free_result($query);
mysqli_close($conn);
?>

<div class="card">
	<div class="card-header">
		<h4 class="card-title">Dados para entrega</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div><label>CEP: <?php echo($info[0]); ?></label></div>
				<div><label>Endereço: <?php echo($info[1]); ?></label></div>
				<div><label>Cidade: <?php echo($info[2]); ?></label></div>
				<div>	
					<a href="#" class="btn btn-info">Solicitar mudança de endereço</a>
					<small id="solicitalHelp" class="form-text text-muted">Somente para Endereço e Cidade</small>
				</div>
			</div>
		</div>
		<button class="btn btn-deafult"  data-toggle="modal" data-target="#editarEndereco">Editar informações</button>
	</div>
	</div>
	<div class="modal fade" id="editarEndereco" tabindex="-1" role="dialog" aria-labelledby="editarEnderecoLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar endereço</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form id="formEditarInfo">
						<div><p>Deixe vazio os campos que não queira mudar</p></div>
						<div class="form-group">
							<label>Senha</label>
							<a href="#" class="btn btn-primary">Enviar mudança de senha por email</a>
						</div>
						<div><p>Para não quiser receber mais email de newsletter <a href="#">clique aqui</a></p></div>
						<div><p>Para não quiser receber mais email de promoções <a href="#">clique aqui</a></p></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onClick("salvarInformacoes();")>Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>