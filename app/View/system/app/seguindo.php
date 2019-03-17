<?php include __DIR__ . "/../../base/headerApp.php"; ?>


<div class="container mt-5">
    <div class="row pt-2">

        <?php include __DIR__ . "/painelPerfil.php"; ?>

        <div class="col-md-6">

            <div class="row mb-2">
                <div class="col">
                    <h3 class="text-primary">Usuarios que você segue</h3>
                </div>
            </div>
            <?php foreach ($usuarios as $usuario) {
                if ($usuario['seguindo_sn'] == 0) { continue; } ?>
            <div class="row mb-2">
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $usuario['name'] ?>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div>
                                        <a href="/app/deixarDeSeguir/<?= $usuario['hash']?>?de=seguindo " class="btn btn-danger">Deixar de seguir</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <?php 
        } ?>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../../base/footer.php"; ?> 