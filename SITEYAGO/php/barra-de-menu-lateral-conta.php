<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-Lateral" aria-controls="navbar-Lateral" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

	<div class="collapse navbar-collapse" id="navbar-Lateral">
		<div>
			<ul class="nav flex-column">
				<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#collapseDados" aria-expanded="false" aria-controls="collapseDados">Dados Pessoais</a></li>
				<div class="collapse" id="collapseDados">
					<div class="card card-body">
						<li class="nav-item" id="dadosCadastro"><a href="javascript:void(0)" onClick="carregarAjax(0);">Dados cadastrais</a></li>
						<li class="nav-item" id="dadosEntrega"><a href="javascript:void(0)" onClick="carregarAjax(1);">Dados de entrega</a></li>
					</div>
				</div>
				
				<li class="nav-item"><a class="nav-link" data-toggle="collapse" href="#collapsePedidos" aria-expanded="false" aria-controls="collapsePedidos">Pedidos</a></li>
				<div class="collapse" id="collapsePedidos">
					<div class="card card-body">
						<li class="nav-item"><a href="javascript:void(0)" onClick="carregarAjax(2);">Pedidos feitos</a></li>
						<li class="nav-item"><a href="javascript:void(0)" onClick="carregarAjax(3);">Listas de desejo</a></li>
						<li class="nav-item"><a href="javascript:void(0)" onClick="carregarAjax(4);">Trocas devoluções</a></li>
					</div>
				</div>
			</ul>
		</div>
	</div>
</nav>


<style>
</style>