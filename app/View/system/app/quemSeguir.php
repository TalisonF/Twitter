<?php include __DIR__ . "/../../base/headerApp.php"; ?>


<div class="container mt-5">
	<div class="row pt-2">
		
		<div class="col-md-3">

			<div class="perfil">
				<div class="perfilTopo">

				</div>

				<div class="perfilPainel">
					
					<div class="row mt-2 mb-2">
						<div class="col mb-2">
							<span class="perfilPainelNome"><?=$_SESSION['nome']?></span>
						</div>
					</div>

					<div class="row mb-2">

						<div class="col">
							<span class="perfilPainelItem">Tweets</span><br />
							<span class="perfilPainelItemValor"><?=$QtdeTweets?></span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguindo</span><br />
							<span class="perfilPainelItemValor"><?=$qtdeSeguindo?></span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguidores</span><br />
							<span class="perfilPainelItemValor"><?=$qtdeSeguidores?></span>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="col-md-6">
			
			<div class="row mb-2">
				<div class="col">
					<div class="card">
						<div class="card-body">
							
								<div class="input-group mb-3">
									<input type="text" id="pequisarPor" class="form-control" placeholder="Quem você está procurando?">
									<div class="input-group-append">
										<button class="btn btn-primary" onclick="enviar()">Procurar</button>
									</div>
								</div>
							
						</div>
					</div>
				</div>
			</div>
			<script>
				function enviar(){
					pesquisarPor = document.getElementById("pequisarPor").value;
					window.location.href = "/app/quemSeguir/" + pesquisarPor ;
				}
			</script>
			<?php  foreach ($usuarios as $usuario) { ?>
			<div class="row mb-2">
				<div class="col">
				
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<?=$usuario['name']?>
								</div>							
								<div class="col-md-6 d-flex justify-content-end">
									<div>
										<?php if($usuario['seguindo_sn'] == 0){?>
										<a href="/app/seguir/<?=$usuario['hash']?>" class="btn btn-success">Seguir</a>
										<?php }else {?>
										<a href="/app/deixarDeSeguir/<?=$usuario['hash']?>" class="btn btn-danger">Deixar de seguir</a>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					
					</div>
					
				</div>
			</div>
			<?php } ?>	
		</div>
	</div>
</div>

<?php include __DIR__ . "/../../base/footer.php"; ?>