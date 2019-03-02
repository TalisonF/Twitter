
<?php include __DIR__ . "/../../base/header.php";?>

<div class="container">
  <div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 36rem;">
      <div class="card-body">

        <div class="d-flex justify-content-center">
          <img src="/img/twitter_logo.png" />
        </div>

        <div class="row">
          <div class="col">
            <h2>Crie sua conta</h2>
          </div>
        </div>

        <div class="row">
          <div class="col">
            
            <form action="/inscreverse" method="post">
              <div class="form-group">
                <input name="nome" value="" type="text" class="form-control" placeholder="Nome">
              </div>
              
              <div class="form-group">
                <input type="text" value="" name="email" class="form-control" placeholder="E-mail">
              </div>

              <div class="form-group">
                <input type="password" value="" name="senha" class="form-control" placeholder="Senha">
              </div>
              
              <div class="mt-4 mb-4">
                <small class="form-text">
                  Ao inscrever-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade, incluindo o Uso de Cookies. Outras pessoas poderão encontrar você pelo e-mail ou número de telefone fornecido · Opções de Privacidade
                </small>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Inscrever-se</button>

              <?php if( isset($success) && !$success) { ?>
                <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique 
                se os campos foram preenchidos corretamentes. </small>
              <?php } ?>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header corNav ">
        <h5 class="modal-title " id="exampleModalLabel">Sucesso!</h5>
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
            Usuario cadastrado com sucesso! <br> Basta fazer login para twittar!
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cadastrar outro usuario</button>
        <a href="/"><button type="button" class="btn btn-primary">Login</button></a>
      </div>
    </div>
  </div>
</div>


<?php include __DIR__ . "/../../base/footer.php"; ?>

<script>
  <?php if(isset($success) && $success) {?>
  $('#ModalSuccess').modal('show');
  <?php }?>
</script>


    
  