<?php
/**
 * routes para APLICACAO WEB
 */
$app->group('', function(){

    $this->get('/', ['\App\Controller\System\IndexController', 'index'])->setName('home');
    $this->get('/inscreverse', ['\App\Controller\System\IndexController', 'inscreverse'])->setName('inscreverse');
    $this->post('/inscreverse', ['\App\Controller\System\UserController', 'cadastrar'])->setName('cadastrar');
    $this->post('/autenticar', ['\App\Controller\System\UserController', 'autenticar'])->setName('autenticar');
    
});

$app->group('/app', function(){
    $this->get('/timeline',['\App\Controller\System\AppController', 'timeline'])->setName('timeline');
    $this->get('/sair',['\App\Controller\System\UserController', 'sair']);

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

