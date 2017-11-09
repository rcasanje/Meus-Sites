<?php
include("../php/conexoes/user-access.php");

if(!isset($_SESSION)) session_start();

$nome = $_SESSION['User']['Nome'];
$apelido = $_SESSION['User']['Login'];
$dadosCad = [];
$i = 0;
$dados = "SELECT login_user, email_user, rg_user, cpf_user, telefone_user, celular_user, dataNasc_user, newsletter_user, promocao_user, ingressado_user FROM usuarios WHERE nome_user='$nome' and login_user='$apelido'";
if($query = mysqli_query($conn, $dados)){
	$info = mysqli_fetch_row($query);
} else{
	printf("Houe algum erro. Erro com a descrição: %s", mysqli_error($conn));
}

session_write_close();
//mysqli_free_result($query);
mysqli_close($conn);
?>

<div class="card">
	<div class="card-header">
		<h4 class="card-title">Dados cadastrais</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<div><label>Nome de login: <?php echo($info[0]); ?></label></div>
				<div><label>Email: <?php echo($info[1]); ?></label></div>
				<div><label><a href="#">Trocar senha</a></label></div>
			</div>
			<div class="col-md-3">
				<div><label>RG: <?php echo($info[2]); ?></label></div>
				<div><label>CPF: <?php echo($info[3]); ?></label></div>
				<div><label>Telefone: <?php echo($info[4]); ?></label></div>
				<div><label>Celular: <?php echo($info[5]); ?></label></div>
			</div>
			<div class="col-md-3">
				<div><label>Newsletter: <?php echo($info[7]); ?></label></div>
				<div><label>Promoções: <?php echo($info[8]); ?></label></div>
			</div>
			<div class="col-md-3">
				<div><label>Data de Nascimento: <?php echo($info[6]); ?></label></div>
				<div><label>Ingressado: <?php echo($info[9]); ?></label></div>
				<div><label>Último login</label></div>
			</div>
			<div>
				<a href="#" class="btn btn-info">Solicitar mudança de documentos</a>
				<small id="soliciatlHelp" class="form-text text-muted">Somente para documento de RG, CPF e Data de Nascimento</small>
				<button class="btn btn-deafult" data-toggle="modal" data-target="#editarInfo">Editar informações</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editarInfo" tabindex="-1" role="dialog" aria-labelledby="editarInfo" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar dados</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form id="formEditarInfo">
						<div><p>Deixe vazio os campos que não queira mudar</p></div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" id="email" type="email" name="email" placeholder="<?php echo($info[1]); ?>" maxlength="64">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
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

<script type="text/javascript">
	function salvarInformacoes(){
		//salva informações digitadas
	}
</script>