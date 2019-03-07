<?php include __DIR__ . "/../../base/headerApp.php"; print_r($_SESSION) ?>

<div class="container mt-2">
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
				<div class="col tweetBox">
					<form method="post" action="/app/tweetar">
						<textarea placeholder="O que está acontecendo?" name="tweet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						
						<div class="col mt-2 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Tweetar</button>
						</div>

					</form>
				</div>
			</div>
						
			<?php foreach ($tweets as $tweet) { ?>
				<div class="row tweet">
					<div class="col">
						<p><strong><?=$tweet['name']?></strong> <small> <span class="text text-muted">- <?=$tweet['data']?> </span></small> </p>
						<p><?=$tweet['tweet']?></p>

						<br/>
						<?php  if(($tweet['user_id'] == $_SESSION['id']) ) {?>
						<div class="col d-flex justify-content-end">
								<a href="/app/remover_tweet/<?=$tweet['hash']?>"><button  class="btn btn-danger"><small>Remover</small></button></a>
							</div>
						
						<?php } ?>
					</div>
				</div>
			<?php } ?>

		</div>
		<div class="col-md-3 d-none d-md-block">
			<div class="quemSeguir">
				<span class="quemSeguirTitulo">Quem seguir</span><br />
				<hr />
				<a href="/app/quemSeguir" class="quemSeguirTxt">Procurar por pessoas conhecidas</a>
			</div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header corNav ">
        <h5 class="modal-title " id="exampleModalLabel">Excluir Tweet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-primary" >
      <div class="row">
          <div class="col-2">
            <img src="/img/twitter_logo.png" />
          </div>
          <div class="col-10">
			<?php if(isset($_GET['Excluir']) && $_GET['Excluir'] == 'true') {?>
            	Tweet excluido com sucesso!
			<?php } else {?>
				Falha ao exluir o Tweet!
			<?php }?>
			 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>



<?php include __DIR__ . "/../../base/footer.php"; ?>

<script>
  <?php if(isset($_GET['Excluir'])) {?>
  $('#ModalDelete').modal('show');
  <?php }?>
</script>