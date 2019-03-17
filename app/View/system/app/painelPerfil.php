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
							<span class="perfilPainelItem"> <a class="quemSeguirTxt" href="/app/seguindo">Seguindo</a></span><br />
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