<?php
include("../php/conexoes/user-access.php");

if(!isset($_SESSION)) session_start();

$apelido = $_SESSION['User']['ID'];

$dadosCad = [];

$dados = "SELECT apelido_con, email_con, cpf_con, telefone_con, celular_con, dataNasc_con, newsletter_con, promocoes_con, dataReg_con FROM contas WHERE apelido_con='$apelido'";

if($query = mysqli_query($conn, $dados)){
	$info = mysqli_fetch_array($query, MYSQL_ASSOC);
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
				<div><label>Nome de login: <?php echo($info['apelido_con']); ?></label></div>
				<div><label>Email: <?php echo($info['email_con']); ?></label></div>
				<div><label>Senha: <a href="#">Trocar senha</a></label></div>
			</div>
			<div class="col-md-3">
				<div><label>RG: Criptografado</label></div>
				<div><label>CPF: <?php echo($info['cpf_con']); ?></label></div>
				<div><label>Telefone: <?php echo($info['telefone_con']); ?></label></div>
				<div><label>Celular: <?php echo($info['celular_con']); ?></label></div>
			</div>
			<div class="col-md-3">
				<div><label>Newsletter: <?php echo($info['newsletter_con']); ?></label></div>
				<div><label>Promocoes: <?php echo($info['promocoes_con']); ?></label></div>
			</div>
			<div class="col-md-3">
				<div><label>Data de Nascimento: <?php echo($info['dataNasc_con']); ?></label></div>
				<div><label>Ingressado: <?php echo($info['dataReg_con']); ?></label></div>
				<div><label>Último login: Unknown</label></div>
			</div>
			<br><br>
			<div class="col-md-12">
				<div>
					<a href="#" class="btn btn-info">Solicitar mudança de documentos</a>
				</div>
				<div>
					<button class="btn btn-deafult" data-toggle="modal" data-target="#editarInfo">Editar informações</button>
				</div>
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
							<input class="form-control" id="email" type="email" name="email" placeholder="<?php echo($info['email_con']); ?>" maxlength="64">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label>Senha</label>
							<input class="form-control btn btn-primary" type="button" value="Solicitar mudança de senha">
							<small id="emailHelp" class="form-text text-muted"></small>
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