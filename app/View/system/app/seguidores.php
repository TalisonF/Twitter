<?php include __DIR__ . "/../../base/headerApp.php"; ?>


<div class="container mt-5">
    <div class="row pt-2">

        <?php include __DIR__ . "/painelPerfil.php"; ?>

        <div class="col-md-6">

            <div class="row mb-2">
                <div class="col">
                    <h3 class="text-primary">Usuarios que estão te seguindo</h3>
                </div>
            </div>
            <?php foreach ($usuarios as $usuario) { ?>
            <div class="row mb-2">
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $usuario['name'] ?>
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