<?php
return [

    /**
     * DEPENDENCY VIEW
     *
     * DEPENDENCIA DO PLUGIN DA VIEW
     * AQUI ELE JOGA EM TODAS AS TELAS A VARIAVEL 'route' PARA QUE POSSA SER USADO EM QUALQUER LUGAR
     */
    \Slim\Views\PhpRenderer::class => DI\factory(function (\Interop\Container\ContainerInterface $container) {
        return new \Slim\Views\PhpRenderer(
            __DIR__ . "/../app/View/",
            ['route' => $container->get('router')]
        );
    }),


];