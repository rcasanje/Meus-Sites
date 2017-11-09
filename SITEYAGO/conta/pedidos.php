<?php
include("../php/conexoes/user-access.php");

if(!isset($_SESSION)) session_start();

$nome = $_SESSION['User']['Nome'];
$apelido = $_SESSION['User']['Login'];
$dadosCad = [];
$i = 0;
$dados = "SELECT * FROM pedidos WHERE nome_ped='$nome' and login_ped='$apelido'";
if($query = mysqli_query($conn, $dados)){
	
} else{
	printf("Houe algum erro. Erro com a descrição: %s", mysqli_error($conn));
}

session_write_close();
//mysqli_free_result($query);
mysqli_close($conn);
?>

<div class="card">
	<div class="card-header">
		<h4 class="card-title">Pedidos</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<table id="tablePedidos" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th># Pedido</th>
							<th>Nome</th>
							<th>Data de abertura</th>
							<th>Data de pagamento</th>
							<th>Informações extras</th>
							<th>Protocolo</th>
						</tr>
					</thead>
					<tbody>
						<?php
							printf('%s<br>%s', $nome, $apelido);
							while ($row = mysqli_fetch_array($query, MYSQLI_NUM)){
								printf('<tr>
									<td>%s</td>
									<td><a href="#" onclick="window.open(%s);">%s</a></td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
								</tr>', $row[0], "'detalhe-pedido.php?id=$row[0]&nome=$row[1]', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=10, LEFT=10, WIDTH=600, HEIGHT=800'", $row[1], $row[3], $row[4], $row[5], $row[6]);
							}
							
						?>
					</tbody>
				</table>
			</div>
		</div>
		<button class="btn btn-deafult">Editar informações</button>
	</div>
</div>