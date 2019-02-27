
<?php include __DIR__ . "/../../base/header.php"; ?>

		<div class="container-fluid h-100">
	<div class="row">
    
    <div class="banner col-md-6 d-none d-md-block ">
    	<div class="row h-100 justify-content-center align-items-center">
    		<div>
				<div class="communicationItem">
					<i class="fas fa-search fa-2x mr-3"></i>
					Siga o que lhe interessa.
				</div>
				<div class="communicationItem">
					<i class="fas fa-user-friends fa-2x mr-3"></i>
					Saiba sobre o que as pessoas estão falando.
				</div>
				<div class="communicationItem">
					<i class="far fa-comment fa-2x mr-3"></i>
					Participe da conversa.
				</div>
			</div>
		</div>
    </div>

    <div class="col-md-6 pt-4 pl-5 pr-5">
		<form method="post"  action="/autenticar">
			<div class="row">
				<div class="col-lg-5 col-sm-6 pt-2 pl-2 pr-2 ">
					<input type="text" name="email" class="form-control" placeholder="E-mail">
				</div>
				<div class="col-lg-5 col-sm-6 pt-2 pl-2 pr-2">
					<input type="password" name="senha" class="form-control" placeholder="Senha">
				</div>
				<div class="col-lg-2 col-md-12 col-sm-6 pt-2 pl-2 pr-2">
					<button type="submit" class="btn btn-primary col-md-12 mb-2">Entrar</button>
				</div>
				<?php if(isset($_GET['erroLogin']) && $_GET['erroLogin'] == true ) {?>
					<small class="text-danger">*Email ou senha inseridos incorretamente!</small>
				<?php } ?>	
			</div>
		
				</form>
		<div class="row pt-5 pl-2 pr-2">
			<div class="col ">
				<img src="/img/twitter_logo.png" />
				<h1 class="title">Veja o que está acontecendo no mundo agora</h1>

				<h2 class="mt-5 subtitle">Participe hoje do Twitter.</h2>
				<a href="/inscreverse" class="btn btn-primary btn-block mb-2">Inscrever-se</a>
			</div>	
		</div>


    </div>

  </div>
</div>	


<?php include __DIR__ . "/../../base/footer.php"; ?>