<?php include __DIR__ . "/../../base/header.php"; ?>

<nav class="navbar navbar-expand-lg menu">
	<div class="container">
	  <div class="navbar-nav">
	  	<a class="menuItem" href="/app/timeline">Home</a>
	  	<a class="menuItem" href="/app/sair">Sair</a>
			<img src="/img/twitter_logo.png" class="menuIco"/>
	  </div>
	</div>
</nav>

<div class="container mt-5">
	<div class="row pt-2">
		
		<div class="col-md-3">

			<div class="perfil d-none d-md-block">
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
							<span class="perfilPainelItemValor">0</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguindo</span><br />
							<span class="perfilPainelItemValor">0</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguidores</span><br />
							<span class="perfilPainelItemValor">0</span>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="col-md-6">
			<div class="row mb-2">
				<div class="col tweetBox">
					<form method="post" action="/app/tweetar">
						<textarea placeholder="O que está acontecendo?" name="tweet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						
						<div class="col mt-2 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Tweetar</button>
						</div>

					</form>
				</div>
			</div>
						
			<?php 
				
			foreach ($tweets as $tweet) { ?>
				<div class="row tweet">
					<div class="col">
						<p><strong><?=$tweet->getUser()->getName()?></strong> <small> <span class="text text-muted">- <?=$tweet->getCreatedAt()->format('d/m/Y h:s')?> </span></small> </p>
						<p><?=$tweet->getTweet()?></p>

						<br/>
						<?php  if(!($tweet->getUser()->getId() != $_SESSION['id']) ) {?>
						<div class="col d-flex justify-content-end">
								<a href="/remover_tweet?id_tweet=<?=$tweet->getId()?>"><button  class="btn btn-danger"><small>Remover</small></button></a>
							</div>
						
						<?php } ?>
					</div>
				</div>
			<?php }  ?>	
			
		</div>


		<div class="col-md-3">
			<div class="quemSeguir">
				<span class="quemSeguirTitulo">Quem seguir</span><br />
				<hr />
				<a href="/quemSeguir" class="quemSeguirTxt">Procurar por pessoas conhecidas</a>
			</div>
		</div>

	</div>
</div>

<?php include __DIR__ . "/../../base/footer.php"; ?>