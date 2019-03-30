<div class="col-md-3 col-sm-12">
		
	<div class="perfil">
			<!--Avatar-->
			<div class="fundo-avatar p-3">				
				<center> <img src="/img/icon.png" alt="avatar" class="avatar"></center>
			</div>
			
			<!--fim avatar -->
			
			<!--nome -->
			<div class="row mt-2 mb-2 p-2">
				<div class="col mb-2">
					<span class="perfilPainelNome"><?=$_SESSION['nome']?></span>
				</div>
			</div>
			<!--fim nome -->
			<!--Parte inferior-->
				<div class="row mb-2 p-2">
					<div class="col">
						<span class="perfilPainelItem">Tweets</span><br />
						<span class="perfilPainelItemValor"><?=$QtdeTweets?></span>
					</div>
					<div class="col">
						<span class="perfilPainelItem"> <a class="quemSeguirTxt" href="/app/seguindo">Seguindo</a></span><br />
						<span class="perfilPainelItemValor"><?=$qtdeSeguindo?></span>
					</div>
					<div class="col">
						<span class="perfilPainelItem"><a class="quemSeguirTxt" href="/app/seguidores">Seguidores</a></span><br/>
						<span class="perfilPainelItemValor"><?=$qtdeSeguidores?></span>
					</div>
				</div>
			<!--Fim Parte inferior-->
	</div>
</div>