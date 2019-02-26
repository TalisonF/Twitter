<?php
/**
 * routes para APLICACAO WEB
 */
$app->group('', function(){

    $this->get('/', ['\App\Controller\System\IndexController', 'index'])->setName('home');

});


/**
 *
 * routes para API REST
 */
$app->group('/api', function () {
    $this->group('/v1', function () {

        $this->group('/rota/de/exemplo/para/api', function () {

            $this->get('[/{hash}]', ['\Controller', 'get']);
            $this->post('', ['\Controller', 'post']);
            $this->put('/{hash}', ['\Controller', 'put']);
            $this->delete('/{hash}', ['\Controller', 'delete']);

        });

    });
});

