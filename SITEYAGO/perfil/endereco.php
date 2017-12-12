<?php
include("../php/conexoes/user-access.php");

if(!isset($_SESSION)) session_start();

$apelido = $_SESSION['User']['ID'];
$dadosCad = [];

$dados = "SELECT cep_con, logradouro_con, estado_con, municipio_con, UF_con, bairro_con, numcasa_con, complemento_con, referencia_con FROM contas WHERE apelido_con='$apelido'";
if($query = mysqli_query($conn, $dados)){
	$info = mysqli_fetch_array($query, MYSQLI_ASSOC);
} else{
	printf("Houve algum erro! Erro: %s", mysqli_error($conn));
}

session_write_close();
//mysqli_free_result($query);
mysqli_close($conn);
?>

<div class="card">
	<div class="card-header">
		<h4 class="card-title"><b>Dados para entrega</b></h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div><h4>Endereço primário</h4></div>
				<div><label>CEP: <?php echo($info['cep_con']); ?></label></div>
				<div><label>Endereço: <?php echo($info['logradouro_con'].", ".$info['numcasa_con']); ?></label></div>
				<div><label>Estado: <?php echo($info['estado_con']); ?></label></div>
				<div><label>Municipio: <?php echo($info['municipio_con']); ?></label></div>
				<div><label>UF: <?php echo($info['UF_con']); ?></label></div>
				<div><label>Bairro: <?php echo($info['bairro_con']); ?></label></div>
			</div>
			<div class="col-md-6">
				<div><h4>Endereço secundário</h4></div>
				<div><label>CEP: </label></div>
				<div><label>Endereço: </label></div>
				<div><label>Estado: </label></div>
				<div><label>Municipio: </label></div>
				<div><label>UF: </label></div>
				<div><label>Bairro: </label></div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-deafult"  data-toggle="modal" data-target="#editarEndereco">Editar informações</button>
				<button class="btn btn-primary"  data-toggle="modal" data-target="#adicionarEndereco">Adicionar endereço secundário</button>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="adicionarEndereco" tabindex="-1" role="dialog" aria-labelledby="adicionarEnderecoLabel" aria-hidden="true">
	<form>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Adicionar endereco</b></h4>

				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Adicionar enfereço</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>

<div class="modal fade" id="editarEndereco" tabindex="-1" role="dialog" aria-labelledby="editarEnderecoLabel" aria-hidden="true">
	<form>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Editar endereco</b></h4>

				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Salvar alterações</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>